<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Relacion;

class Componentes extends Model
{
    protected $table = 'componentes';
    protected $fillable = ['nombre'];


public function relacion()
    {
        return $this->belongsToMany('App\Relacion');
    } 
}
