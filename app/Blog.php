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
    protected $fillable = ['idcapitulos','titular','autor','fercha','idUser'];
    

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

public function practica() {
        return $this->hasOne('App\Practicas','idBlog' ,'id'); 
    }     

public function relacion()
    {
        return $this->belongsToMany('App\Relacion');
    } 

    public function lenguajes($blogs){
        foreach($blogs as $blog){
            $blog['lenguaje'] = @Capitulos::with('lenguajes')->find($blog['idcapitulos'])->lenguajes;
        }
        return $blogs;
    }     

}