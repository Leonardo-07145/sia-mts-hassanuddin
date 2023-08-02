<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Mapel;
use App\Models\Hari;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        $siswa = Siswa::all();
        $kelas = Kelas::all();

        return view('kesiswaan.jadwal.index', compact('guru', 'siswa', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kesiswaan.jadwal.create', [
            'guru' => Guru::all(),
            'kelas' => Kelas::all(),
            'hari' => Hari::all(),
            'mapel' => Mapel::all()
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
        $request->validate([
            'guru_id' => 'required',
            'hari_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
            'jam_mulai' => 'required',
            'jam_berakhir' => 'required'
        ]);

        if (Jadwal::where([['jam_mulai', $request->jam_mulai], 
                    ['jam_berakhir', $request->jam_berakhir], 
                    ['kelas_id', $request->kelas_id],
                    ['hari_id', $request->hari_id]
                    ])->exists()){
            return redirect()->route('jadwal.index')->with('gagal', 'Sudah Ada Jadwal');
        }

        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal = Jadwal::where('kelas_id', $id)->get();
        $kelas = Kelas::where('id', $id)->get();;

        return view('kesiswaan.jadwal.show', compact('jadwal', 'kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        return view('kesiswaan.jadwal.edit', [
            'jadwal' => $jadwal,
            'guru' => Guru::all(),
            'kelas' => Kelas::all(),
            'hari' => Hari::all(),
            'mapel' => Mapel::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'guru_id' => 'required',
            'hari_id' => 'required',
            'mapel_id' => 'required',
            'jam_mulai' => 'required',
            'jam_berakhir' => 'required'
        ]);

        if (Jadwal::where([['jam_mulai', $request->jam_mulai], 
                    ['jam_berakhir', $request->jam_berakhir], 
                    ['kelas_id', $request->kelas_id],
                    ['hari_id', $request->hari_id]
                    ])->exists()){
            return redirect()->route('jadwal.index')->with('gagal', 'Sudah Ada Jadwal');
        }

        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Data Berhasil Dihapus');
    }
}
