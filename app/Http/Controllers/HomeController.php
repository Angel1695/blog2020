<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lenguajes;
use App\Capitulos;
use App\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #lenguajes padre
        $viewData['lenguajes'] = Lenguajes::with('capitulos')->get();
       // return $viewData;
        switch(auth()->user()->idperfil){
            case 1:case 2:
                return view('indexadmin');
            default:
                return view('index', $viewData);
        }
    }

    public function secciones($id, $capitulos_id = 0){
        $viewData['lenguajes'] = Lenguajes::with('capitulos')->get();
        $viewData['capitulos'] = Capitulos::with('blogs')->where('idlenguajes', $id)->get();
        $viewData['lenguaje']  = Lenguajes::find($id);
        $viewData['capitulos_id']    = $capitulos_id;
        //return $viewData;
        foreach($viewData['capitulos'] as $k => $cap){
            foreach($cap['blogs'] as $key => $blog){
                $viewData['capitulos'][$k]['blogs'][$key] = @Blog::with(['tablas', 'practicas', 'referencias'])->find($blog->id);
            }
        }
        

        //return $viewData;
        return view('usuario.verCapitulos', $viewData);
    }
}
