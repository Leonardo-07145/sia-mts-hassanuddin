<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardWalikelasController extends Controller
{
    public function getpresensi()
    {
        return view('wali_kelas.presensi.index', [
            "active" => "presensisiswa"
        ]);
    }
}
