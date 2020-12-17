<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listaejemplo extends Model
{
     protected $table = "listaejemplo";
    protected $fillable =['nombre','idmenu'];
    //Relacion
    public function menus()
    {
        return $this->belongsTo('App\Menu','idmenu' ,'id');
    }
}
