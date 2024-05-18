<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComCode extends Model
{
    protected $guarded = [];

    protected $primaryKey = 'com_cd';
    // protected $primaryKey = 'com_cd';
    public $incrementing = false;
    protected $keyType = 'string';


}
