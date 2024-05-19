<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jenisCuti()
    {
        return $this->belongsTo(ComCode::class, 'cuti_tp');
    }
    public function status()
    {
        return $this->belongsTo(ComCode::class, 'status_st');
    }

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function persetujuan()
    {
        return $this->hasMany(PersetujuanCuti::class, 'cuti_id');
    }

    public function scopeCari($filter, $value)
    {
        if ($value) {
            return $this->where('nama', 'like', "%$value%");
        }
    }
}
