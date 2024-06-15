<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersetujuanCuti extends Model
{
    use HasFactory;
    public $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
