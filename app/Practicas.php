<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Blog;

class Practicas extends Model
{
    protected $table = 'practicas';
    protected $fillable = ['nombre','descripcion','codigo', 'idBlog'];

    public function blog()
    {
        return $this->belongsTo('App\Blog', 'idBlog', 'id');
    }

    
}
