<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateNilaiRequest;
use App\Models\Mapel;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $mapel = Mapel::all()
                            ->where('nama', 'like', "%" . $request->search . "%")
                            ->paginate();
        }else{
            $mapel = Mapel::all();
        }

        $siswa = Siswa::where('kelas_id', Auth::guard('web')->user()->kelas_id)->get();
        $kelas = Siswa::where('kelas_id', Auth::guard('web')->user()->kelas_id)->first();

        return view('wali_kelas.nilai.index', compact('siswa', 'kelas', 'mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    }

    public function create2($id)
    {
        return view('wali_kelas.nilai.create', [
            'siswa' => Siswa::where('kelas_id', Auth::guard('web')->user()->kelas_id)->get(),
            'mapel' => Mapel::where('id', $id)->first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mapel_id' => 'required',
            'siswa_id' => 'required',
            'tugas1' => 'nullable|numeric|between: 0,100',
            'tugas2' => 'nullable|numeric|between: 0,100',
            'harian1' => 'nullable|numeric|between: 0,100',
            'harian2' => 'nullable|numeric|between: 0,100',
            'uts' => 'nullable|numeric|between: 0,100',
            'uas' => 'nullable|numeric|between: 0,100'
        ]);

        Nilai::create($validatedData);

        return redirect()->route('nilai.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    public function show2($id)
    {
        $nilai = Nilai::where('mapel_id', $id)->get();
        $mapel = Mapel::where('id', $id)->first();

        return view('wali_kelas.nilai.show', compact('nilai', 'mapel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        return view('wali_kelas.nilai.edit', [
            'nilai' => $nilai,
            'mapel' => Mapel::all(),            
            'siswa' => Siswa::where('kelas_id', Auth::guard('web')->user()->kelas_id)->get(),
            // 'siswa' => Siswa::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'siswa_id' => 'required',
            'tugas1' => 'nullable|numeric|between: 0,100',
            'tugas2' => 'nullable|numeric|between: 0,100',
            'harian1' => 'nullable|numeric|between: 0,100',
            'harian2' => 'nullable|numeric|between: 0,100',
            'uts' => 'nullable|numeric|between: 0,100',
            'uas' => 'nullable|numeric|between: 0,100'
        ]);

        $nilai->update($request->all());

        return redirect()->route('nilai.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('nilai.index')->with('success', 'Data Berhasil Dihapus');
    }
}
