<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
