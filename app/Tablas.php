<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Blog;

class Tablas extends Model
{
    protected $table = 'tablas';
    protected $fillable = ['idblog','nombre','descripcion','codigo'];


public function blog() {
        return $this->belongsTo('App\Blog','idblog' ,'id'); 
    } 


}
