<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejemplo extends Model
{
     protected $table = "ejemplo";
    protected $fillable =['nombre','descripcion','ejemplo','idlista'];
    //Relacion
    public function menus()
    {
        return $this->belongsTo('App\Menu','idmenu' ,'id');
    }
    public function listaejemplo()
    {
        return $this->belongsTo('App\Listaejemplo','idlista' ,'id');
    }
}
