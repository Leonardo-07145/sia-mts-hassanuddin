<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Nilai;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Presensi;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardSiswaController extends Controller
{
    public function getpembayaran()
    {
        $pembayaran = Pembayaran::where('siswa_id', Auth::guard('siswa')->user()->id)->get();
        // dd($pembayaran);

        return view('siswa.pembayaran.index', compact('pembayaran'), [
            "active" => "pembayaransiswa"
        ]);
    }

    public function getjadwal()
    {
        $jadwal = Jadwal::where('kelas_id', Auth::guard('siswa')->user()->kelas_id)->get();
        $siswa = Siswa::where('id', Auth::guard('siswa')->user()->id)->get();
        // dd($siswa);


        return view('siswa.jadwal.index', compact('jadwal', 'siswa'), [
            "active" => "jadwalsiswa"   
        ]);
    }

    public function getPresensi()
    {
        $presensi = Presensi::where('siswa_id', Auth::guard('siswa')->user()->id)->get();

        return view('siswa.presensi.index', compact('presensi'), [
            "active" => "presensisiswa"
        ]);
    }

    public function getNilai()
    {
        $nilai = Nilai::where('siswa_id', Auth::guard('siswa')->user()->id)->get();

        return view('siswa.nilai.index', compact('nilai'), [
            "active" => "nilaisiswa"
        ]);
    }
}
