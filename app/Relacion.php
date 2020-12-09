<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\blog;
use App\Componentes;

class Relacion extends Model
{
    protected $table = 'relacion';
    protected $fillable = ['idcomponente','idblog','valor'];

public function componentes()
    {
     return $this->belongsToMany('App\Componentes','idcomponente','id');
    }

public function blogs()
    {
     return $this->belongsToMany('App\blog','idblog','id');
    }
}
