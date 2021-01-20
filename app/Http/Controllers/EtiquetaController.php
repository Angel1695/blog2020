<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tablas;
use App\Blog;
use App\Lenguajes;
use App\Practicas;

class EtiquetaController extends Controller
{
    public function __construct(){
        $this->section = "";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($section)
    {
        $this->section = $section;
        $viewData['lenguajes'] = (auth()->user()->idperfil != 1) ? Lenguajes::with('capitulos')->get() : [];
        $viewData['blogs'] = Blog::with(['capitulo', 'tablas','practica'])->orderBy('idcapitulos')->get();
        //$idblog = ($section == 'practicas') ? 'idBlog' : 'idblog';
        $viewData['lenguaje'] = 'none';
        $viewData['section'] = $section;
        //return $viewData;
        //return view('admin.tablasc.etiquetas',$viewData);
        if(auth()->user()->idperfil == 1 || auth()->user()->idperfil == 2){
            return view('admin.tablasc.etiquetasAdmin',$viewData);
         }else{
            return view('admin.tablasc.etiquetas',$viewData);
         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($section, $id)
    {
        $viewData['lenguajes'] = (auth()->user()->idperfil != 1) ? Lenguajes::with('capitulos')->get() : [];
         $viewData['etiqueta'] = ($section == 'practicas') ? Practicas::find($id) :Tablas::find($id);
         $idblog = ($section == 'practicas') ? 'idBlog' : 'idblog';
         $viewData['lenguaje'] = Lenguajes::find(Blog::find($viewData['etiqueta'][$idblog])->capitulo->idlenguajes)->clave;
         $viewData['blogs'] = Blog::with(['capitulo', 'tablas','practica'])->orderBy('idcapitulos')->get();
         $viewData['section'] =  $section;
         //return $viewData;
         if(auth()->user()->idperfil == 1 || auth()->user()->idperfil == 2){
            return view('admin.tablasc.etiquetasAdmin',$viewData);
         }else{
            return view('admin.tablasc.etiquetas',$viewData);
         }
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}