<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    protected $table = 'perfiles';
    protected $fillable = ['nombre'];
}
