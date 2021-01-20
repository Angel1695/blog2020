<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Relacion;
use App\Tablas;
use App\Practicas;
use App\Referencias;
use App\Lenguajes;
use DateTime;

class PlantillaController extends Controller
{
    public function index($id){
         
        $viewData['blog']=Blog::with(['practica', 'capitulo'])->where('id',$id)->first();
        $date = new DateTime($viewData['blog']['fercha']);
         $viewData['blog']['fercha'] = strftime('%d de %b de %Y', $date->getTimesTamp());
        $viewData['componentes']= Relacion::where('idblog', $id)->orderBy('orden', 'ASC')->get();
        $viewData['tablas'] = Tablas::where('idblog', $id)->get();
        $viewData['referencias'] = Referencias::where('idBlog', $id)->get();
        $viewData['lenguaje'] = Lenguajes::find(@$viewData['blog']['capitulo']['idlenguajes'])->clave;
        $viewData['lenguajes'] = Lenguajes::with('capitulos')->get();
         //return $viewData;
         if(auth()->user()->idperfil == 1 || auth()->user()->idperfil == 2){
            return view('plantillas.plantillaAdmin', $viewData);
         }else{
            return view('plantillas.plantilla', $viewData);
         }
    }
}
