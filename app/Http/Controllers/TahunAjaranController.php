<?php

namespace App\Http\Controllers;

use App\Models\JenisTahunAjaran;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahunajaran = JenisTahunAjaran::all();
        $allsiswa = Siswa::all();
        $allguru = Guru::all();

        return view('tu.tahunajaran.index', compact('tahunajaran', 'allsiswa', 'allguru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tu.tahunajaran.create');
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
            'nama' => 'required|max:255',
        ]);

        JenisTahunAjaran::create($validatedData);

        return redirect()->route('tahunajaran.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisTahunAjaran  $jenisTahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function show(JenisTahunAjaran $jenisTahunAjaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisTahunAjaran  $jenisTahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisTahunAjaran $jenisTahunAjaran)
    {
        return view('tu.tahunajaran.edit', [
            'tahunajaran' => JenisTahunAjaran::where('id', $jenisTahunAjaran),
        ]);
    }

    public function edit2($id)
    {
        $tahunajaran = JenisTahunAjaran::where('id', $id)->first();

        return view('tu.tahunajaran.edit', compact('tahunajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisTahunAjaran  $jenisTahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisTahunAjaran $jenisTahunAjaran)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $jenisTahunAjaran->update($request->all());

        return redirect()->route('tahunajaran.index')->with('success', 'Data Berhasil Diupdate');
    }

    public function update2(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        $tahunajaran = JenisTahunAjaran::findOrFail($id);
        $tahunajaran->nama = $request->nama;
        $tahunajaran->save();

        return redirect()->route('tahunajaran.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisTahunAjaran  $jenisTahunAjaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisTahunAjaran $jenisTahunAjaran)
    {
        $jenisTahunAjaran->delete();

        return redirect()->route('tahunajaran.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function delete2($id)
    {
        $tahunajaran = JenisTahunAjaran::findOrFail($id);
        $tahunajaran->delete();

        return redirect()->route('tahunajaran.index')->with('success', 'Data Berhasil Dihapus');
    }
}
