<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Relacion;
use App\Tablas;
use App\Practicas;
use App\Referencias;

class PlantillaController extends Controller
{
    public function index($id){
        $viewData['blog']=Blog::with('practicas')->where('id',$id)->first();
        $viewData['componentes']= Relacion::where('idblog', $id)->orderBy('orden', 'ASC')->get();
        $viewData['tablas'] = Practicas::where('idblog', $id);
        $viewData['referencias'] = Referencias::where('idBlog', $id);
        $viewData['code'] = '<div class="col-md-2"></div>';
        //return $viewData;
        return view('plantillas.plantillaDefault', $viewData);
    }
}
