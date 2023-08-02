<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Siswa;

class DashboardKepalaSekolahController extends Controller
{
    public function getdataguru()
    {
        $guru = Guru::all();
        $siswa = Siswa::all();

        return view('kepala_sekolah.dataguru.index', compact('guru', 'siswa'), [
            "active" => "dataguru"
        ]);
    }

    public function showguru($id)
    {
        $guru = Guru::where('id', $id)->first();

        return view('kepala_sekolah.dataguru.show', compact('guru'), [
            "active" => "dataguru"
        ]);
    }

    public function getdatasiswa()
    {
        $guru = Guru::all();
        $siswa = Siswa::all();

        return view('kepala_sekolah.datasiswa.index', compact('guru', 'siswa'), [
            "active" => "datasiswa"
        ]);
    }

    public function showsiswa($id)
    {
        $siswa = Siswa::where('id', $id)->first();

        return view('kepala_sekolah.datasiswa.show', compact('siswa'), [
            "active" => "datasiswa"
        ]);
    }
}
