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
    protected $fillable = ['idreferencias','idcapitulos','idtabla','idpractica','titular','autor','fercha'];

public function referencias() {
        return $this->belongsTo('App\Referencias','idreferencias' ,'id'); 
    }

public function capitulo() {
        return $this->belongsTo('App\Capitulos','idcapitulos' ,'id'); 
    }
 public function tabla()
    {
        return $this->hasOne('App\Tablas');
    } 

public function practicas() {
        return $this->belongsTo('App\Practicas','idpractica' ,'id'); 
    }     

public function relacion()
    {
        return $this->belongsToMany('App\Relacion');
    }      

}
