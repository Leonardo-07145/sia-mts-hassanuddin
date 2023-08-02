<?php

namespace App\Http\Controllers;

use App\Models\TanggalPresensi;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TanggalPresensiController extends Controller
{
    public function create()
    {   
        $walikelas_id = User::where('id', Auth::guard('web')->user()->id)->first();
        // $siswa = Siswa::where('kelas_id', Auth::guard('web')->user()->kelas_id)->get();
        // $kelas = Siswa::where('kelas_id', Auth::guard('web')->user()->kelas_id)->first();
        // $tgl_presensi = TanggalPresensi::where('walikelas_id', Auth::guard('web')->user()->id)->get();

        return view('wali_kelas.presensi.tambah_tgl_presensi', compact('walikelas_id'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'walikelas_id' => 'required',
            'tgl_presensi' => 'required'
        ]);

        TanggalPresensi::create($validatedData);

        return redirect()->route('presensi.index')->with('success', 'Data Berhasil Ditambah');
    }

    public function show($id, Request $request)
    {
        if($request->has('search')){
            $presensi = Presensi::where('tgl_presensi_id', $id)->with(['jenispresensi'])
                            ->orWhereHas('jenispresensi', function($query) use($request) {
                                $query->where('nama', 'like', "%" . $request->search . "%");
                            })
                            ->paginate();
        }else{
            $presensi = Presensi::where('tgl_presensi_id', $id)->paginate();
        }
         
        $tgl_presensi = TanggalPresensi::findOrFail($id);

        return view('wali_kelas.presensi.show', compact('presensi', 'tgl_presensi'));
    }
}
