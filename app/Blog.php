<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Capitulos;
use App\Tablas;
Use App\Blog;
use App\Relacion;
use App\Referencias;
use App\Practicas;


class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable = ['idcapitulos','idpractica','titular','autor','fercha','idUser'];
    

public function referencias() {
        return $this->belongsTo('App\Referencias','idreferencias' ,'id'); 
    }

public function capitulo() {
        return $this->belongsTo('App\Capitulos','idcapitulos' ,'id'); 
    }
 public function tablas()
    {
        return $this->hasMany('App\Tablas','idblog', 'id');
    } 

public function practicas() {
        return $this->belongsTo('App\Practicas','idpractica' ,'id'); 
    }     

public function relacion()
    {
        return $this->belongsToMany('App\Relacion');
    }      

}
