<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class);
    }

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }
}
