<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Blog;

class Practicas extends Model
{
    protected $table = 'practicas';
    protected $fillable = ['nombre','descripcion','codigo'];

    public function blog()
    {
        return $this->hasOne('App\Blog');
    }
}
