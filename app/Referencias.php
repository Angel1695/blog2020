<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Blog;

class Referencias extends Model
{
    protected $table = 'referencias';
    protected $fillable = ['nombre'];

     public function blog()
    {
        return $this->hasMany('App\Blog');
    }
}
