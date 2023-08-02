<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;


class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = Hash::make($value);
    // }

    // public function scopeIsActive($query)
    // {
    //     return $query->where('is_active',1);
    // }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }
    
    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    
    public function pembayaran(){
        return $this->hasMany(Pembayaran::class);
    }

    public function presensi(){
        return $this->hasMany(Presensi::class);
    }

    public function nilai(){
        return $this->hasMany(Nilai::class);
    }
}
