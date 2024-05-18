<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    use HasFactory;

    public $guarded = [];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function scopeCari($filter, $value)
    {
      if ($value) {
        return $this->where('nota', 'like', "%$value%");
      }

    }

}
