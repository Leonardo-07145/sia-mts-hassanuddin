<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function siswa(){
        return $this->hasMany(Siswa::class);
    }

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }
}
