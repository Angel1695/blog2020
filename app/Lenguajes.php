<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Capitulos;

class Lenguajes extends Model
{
     protected $table = "lenguajes";
    protected $fillable =['nombre','descripcion'];
// relacion
public function capitulo()
    {
        return $this->hasMany('App\Capitulos');
    }
}
