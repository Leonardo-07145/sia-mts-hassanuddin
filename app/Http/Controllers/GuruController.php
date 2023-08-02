<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use App\Models\Gender;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $guru = Guru::with(['pendidikan', 'gender'])
                            ->where('nama', 'like', "%" . $request->search . "%")
                            ->orWhere('nuptk', 'like', "%" . $request->search . "%")
                            ->orWhere('alamat', 'like', "%" . $request->search . "%")
                            ->orWhere('tgl_lahir', 'like', "%" . $request->search . "%")
                            ->orWhere('no_telp', 'like', "%" . $request->search . "%")
                            ->orWhereHas('pendidikan', function($query) use($request) {
                                $query->where('nama', 'like', "%" . $request->search . "%");
                            })
                            ->orWhereHas('gender', function($query) use($request) {
                                $query->where('nama', 'like', "%" . $request->search . "%");
                            })
                            ->paginate();
        }else{
            $guru = Guru::all();
        }

        $allsiswa = Siswa::all();
        $allguru = Guru::all();

        return view('tu.guru.index', compact('guru', 'allsiswa', 'allguru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tu.guru.create', [
            'gender' => Gender::all(),
            'pendidikan' => Pendidikan::all()
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
        $validatedData = $request->validate([
            'gender_id' => 'required',
            'pendidikan_id' => 'required',
            'nuptk' => 'required|numeric',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'tgl_lahir' => 'required',
            'no_telp' => 'required|numeric'
        ]);

        Guru::create($validatedData);

        return redirect()->route('guru.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        return view('tu.guru.index', [
            "guru" => $guru
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        return view('tu.guru.edit', [
            'guru' => $guru,
            'gender' => Gender::all(),
            'pendidikan' => Pendidikan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'gender_id' => 'required',
            'pendidikan_id' => 'required',
            'nuptk' => 'required|numeric',
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'no_telp' => 'required|numeric'
        ]);

        $guru->update($request->all());

        return redirect()->route('guru.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data Berhasil Dihapus');
    }

    // public function search(Request $request)
    // {
    //     // dd(request('search'));
    //     $keyword = $request->search;
    //     $siswa = Siswa::all();
    //     $guru = Guru::all();
    //     $gurus = Guru::where('nama', 'like', "%" . $keyword . "&")->paginate();
    //     return view('tu.guru.index', compact('guru', 'siswa'));
    // }
}
