<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Capitulos;

class Lenguajes extends Model
{
     protected $table = "lenguajes";
    protected $fillable =['nombre','descripcion', 'clave'];
// relacion
public function capitulos()
    {
        return $this->hasMany('App\Capitulos', 'idlenguajes','id' );
    }
}
