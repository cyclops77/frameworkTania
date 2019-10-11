<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snack extends Model
{
    protected $table = 'snack';
    protected $fillable = ['id','nama_snack','varian_snack','stock','harga'];
}
