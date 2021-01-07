<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Relacion;
use App\Tablas;
use App\Practicas;
use App\Referencias;
use App\Lenguajes;

class PlantillaController extends Controller
{
    public function index($id){
        $viewData['blog']=Blog::with(['practica', 'capitulo'])->where('id',$id)->first();
        $viewData['componentes']= Relacion::where('idblog', $id)->orderBy('orden', 'ASC')->get();
        $viewData['tablas'] = Tablas::where('idblog', $id)->get();
        $viewData['referencias'] = Referencias::where('idBlog', $id);
        $viewData['lenguaje'] = Lenguajes::find(@$viewData['blog']['capitulo']['idlenguajes'])->clave;
         //return $viewData;
        return view('plantillas.plantillaDefault', $viewData);
    }
}
