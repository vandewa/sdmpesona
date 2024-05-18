<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
  use HasFactory;

  public $guarded = [];

  protected $primaryKey = 'nopol';
  public $incrementing = false;
  protected $keyType = 'string';

  public function pemeliharaan()
  {
    return $this->hasMany(Pemeliharaan::class, 'kendaraan_id');
  }

  public function kegiatan()
  {
    return $this->hasMany(Kegiatan::class, 'kendaraan_id');
  }

  public function scopeCari($filter, $value)
  {
    if ($value) {
      return $this->where('nopol', 'like', "%$value%");
    }
  }


}
