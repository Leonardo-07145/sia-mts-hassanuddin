<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }

    public function jenispresensi(){
        return $this->belongsTo(JenisPresensi::class);
    }

    public function tgl_presensi(){
        return $this->belongsTo(TanggalPresensi::class);
    }
}
