<?php

namespace App\Http\Controllers;

use App\Models\JenisPresensi;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Presensi;
use App\Models\TanggalPresensi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $siswa = Siswa::where('kelas_id', Auth::guard('web')->user()->kelas_id)->get();
        // $kelas = Siswa::where('kelas_id', Auth::guard('web')->user()->kelas_id)->first();
        // $presensi = Presensi::where('walikelas_id', Auth::guard('web')->user()->id)->get();

        // return view('wali_kelas.presensi.index', compact('siswa', 'kelas', 'presensi'));

        if($request->has('search')){
            $tgl_presensi = TanggalPresensi::where('walikelas_id', Auth::guard('web')->user()->id)
                            ->where('tgl_presensi', 'like', "%" . $request->search . "%")
                            ->paginate();
        }else{
            $tgl_presensi = TanggalPresensi::where('walikelas_id', Auth::guard('web')->user()->id)->orderBy('created_at', 'desc')->get();
        }
        
        $siswa = Siswa::where('kelas_id', Auth::guard('web')->user()->kelas_id)->get();
        $kelas = Siswa::where('kelas_id', Auth::guard('web')->user()->kelas_id)->first();

        return view('wali_kelas.presensi.index', compact('tgl_presensi', 'siswa', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function create2($id)
    {
        // $walikelas_id = User::where('id', Auth::guard('web')->user()->id)->first();
        $siswa = Siswa::where('kelas_id', Auth::guard('web')->user()->kelas_id)->get();
        $jenispresensi = JenisPresensi::all();
        $tgl_presensi = TanggalPresensi::findOrFail($id);
        // dd($tgl_presensi);

        return view('wali_kelas.presensi.create', compact('siswa', 'jenispresensi', 'tgl_presensi'));
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
            'siswa_id' => 'required',
            'jenispresensi_id' => 'required',
            'tgl_presensi_id' => 'required'
        ]);

        Presensi::create($validatedData);

        return redirect()->route('presensi.index')->with('success', 'Data Berhasil Ditambah');

        // $nama = $request->nama;
        // $keterangan = $request->keterangan;

        // for($i = 0; $i < count($nama); $i++){
        //     $datas = new Presensi();
        //     $datas->nama = $nama[$i];
        //     $datas->keterangan = $keterangan[$i];
        //     $datas->save();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Presensi $presensi)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Presensi $presensi)
    {
        return view('wali_kelas.presensi.edit', [
            'presensi' => $presensi,
            // 'walikelas_id' => User::where('id', Auth::guard('web')->user()->id)->first(),
            // 'tgl_presensi' => TanggalPresensi::findOrFail($id),
            'siswa' => Siswa::where('kelas_id', Auth::guard('web')->user()->kelas_id)->get(),
            'jenispresensi' => JenisPresensi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presensi $presensi)
    {
        $request->validate([
            'siswa_id' => 'required',
            'jenispresensi_id' => 'required'
        ]);

        $presensi->update($request->all());

        return redirect()->route('presensi.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $presensi = Presensi::findOrFail($id);
        $presensi->delete();

        return redirect()->route('presensi.index')->with('success', 'Data Berhasil Dihapus');
    }
}
