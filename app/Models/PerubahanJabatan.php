<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerubahanJabatan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'user_id');

    }
    public function jabatan()
    {
        return $this->belongsTo(NamaJabatan::class, 'nama_jabatan_id');
    }

    public function tingkat()
    {
        return $this->belongsTo(TingkatPekerjaan::class, 'tingkat_pekerjaan_id');
    }

    public function scopeCari($filter, $value)
    {
        if ($value) {
            return $this->where('nama', 'like', "%$value%");
        }
    }

}
