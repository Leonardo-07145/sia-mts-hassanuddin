<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $siswa = Siswa::with(['kelas', 'gender'])
                            ->where('nama', 'like', "%" . $request->search . "%")
                            ->orWhere('nisn', 'like', "%" . $request->search . "%")
                            ->orWhere('email', 'like', "%" . $request->search . "%")
                            ->orWhere('alamat', 'like', "%" . $request->search . "%")
                            ->orWhere('tgl_lahir', 'like', "%" . $request->search . "%")
                            ->orWhere('no_telp', 'like', "%" . $request->search . "%")
                            ->orWhereHas('kelas', function($query) use($request) {
                                $query->where('nama', 'like', "%" . $request->search . "%");
                            })
                            ->orWhereHas('gender', function($query) use($request) {
                                $query->where('nama', 'like', "%" . $request->search . "%");
                            })
                            ->paginate();
        }else{
            $siswa = Siswa::all();
        }

        $allsiswa = Siswa::all();
        $allguru = Guru::all();

        return view('tu.siswa.index', compact('siswa', 'allguru', 'allsiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tu.siswa.create', [
            'gender' => Gender::all(),
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $validatedData = $request->validate([
        //     'gender_id' => 'required',
        //     'kelas_id' => 'required',
        //     'nisn' => 'required|numeric',
        //     'nama' => 'required|max:255',
        //     'email' => 'required|max:255',
        //     'password' => Hash::make('required|max:255'),
        //     'alamat' => 'required|max:255',
        //     'tgl_lahir' => 'required',
        //     'no_telp' => 'required|numeric'
        // ]);
        
        $validatedData = [
            'gender_id' => $request->gender_id,
            'kelas_id' => $request->kelas_id,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->tgl_lahir),
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp
        ];

        Siswa::create($validatedData);

        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('tu.siswa.edit', [
            'siswa' => $siswa,
            'gender' => Gender::all(),
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'gender_id' => 'required',
            'kelas_id' => 'required',
            'nisn' => 'required|numeric',
            'email' => 'required|max:255',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'tgl_lahir' => 'required',
            'no_telp' => 'required|numeric'
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Dihapus');
    }
}
