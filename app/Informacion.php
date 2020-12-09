<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
     protected $table = "informacion";
    protected $fillable =['nombre','descripcion','imagen','mision','vision','frase'];
}
