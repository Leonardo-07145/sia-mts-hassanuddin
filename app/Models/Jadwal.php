<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function guru(){
        return $this->belongsTo(Guru::class);
    }

    public function hari(){
        return $this->belongsTo(Hari::class);
    }

    public function mapel(){
        return $this->belongsTo(Mapel::class);
    }
}
