<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use App\Lenguajes;
use App\Blog;

class Capitulos extends Model
{
     protected $table = 'capitulos';
    protected $fillable = ['nombre','idlenguajes'];

// relacion 
    public function lenguajes() {
        return $this->belongsTo('App\Lenguajes','idlenguajes' ,'id'); 
    }

    public function blogs()
    {
        return $this->hasMany('App\Blog','idcapitulos','id');
    }
}
