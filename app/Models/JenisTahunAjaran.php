<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTahunAjaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pembayaran(){
        return $this->hasMany(Pembayaran::class);
    }
}
