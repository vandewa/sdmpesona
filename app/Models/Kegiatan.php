<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }
    

    public function scopeCari($filter, $value)
    {
      if ($value) {
        return $this->where('nama', 'like', "%$value%")
                    ->orWhere('kendaraan_id', 'like', "%$value%")
                    ->orWhere('lokasi', 'like', "%$value%")
                    ->orWhere('anggaran', 'like', "%$value%")
                    ->orWhere('keterangan', 'like', "%$value%")
                    ;
      }
    }

}
