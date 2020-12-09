<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Blog;
use App\Referencias;
use App\Capitulos;
use App\Practicas;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogsc.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $capitulos = Capitulos::orderBy('nombre','asc')->pluck('nombre', 'id');
        $practicas = Practicas::orderBy('nombre','asc')->pluck('nombre', 'id');
        $referencias = Referencias::orderBy('nombre','asc')->pluck('nombre', 'id');
        return view('admin.blogsc.crear', compact('referencias','capitulos','practicas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar la información
        $this->validate($request, [
            'capitulos' => 'required|max:50',
            'practicas' => 'required',
            'referencias' => 'required',
            'titular' => 'required',
            'autor' => 'required',
            'fercha' => 'required',
        ]);        

        //Guardar esa información en la tabla
        $blogs = Blog::create([
                'idcapitulos' => $request->get('capitulos'),
                'idpractica' => $request->get('practicas'),
                'idreferencias' => $request->get('referencias'),
                'titular' => $request->get('titular'),
                'autor' => $request->get('autor'),
                'fercha' => $request->get('fercha'),
        ]);
        $mensaje = $blogs?'Blog creado correctamente!':'El Blog no ha sido creada!';
        return redirect()->route('blogs.index')->with('mensaje',$mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $capituloe = DB::table('capitulos')->pluck('nombre', 'id');
        $practicae = DB::table('practicas')->pluck('nombre', 'id');
        $referenciae = DB::table('referencias')->pluck('nombre', 'id');
        $bloge = Blog::find($id);
        return view('admin.blogsc.editar', compact('capituloe','practicae','referenciae','bloge'));
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
        //Validar la información
        $this->validate($request, [
            
            'idcapitulos' => 'required',
            'idpractica' => 'required',
            'idreferencias' => 'required',
            'titular' => 'required',
            'autor' => 'required',
            'fercha' => 'required'
        ]); 

        //Actualizar la informacion
        $bloge = Blog::find($id);
        $bloge->idcapitulos = $request->get("idcapitulos");
        $bloge->idpractica = $request->get("idpractica");
        $bloge->idreferencias = $request->get("idreferencias");
        $bloge->titular = $request->get("titular");
        $bloge->autor = $request->get("autor");
        $bloge->fercha = $request->get("fercha");
        $bloge->save();

        $mensaje = $bloge?'Blog actualizado correctamente!':'El Blog no ha sido actualizado!';
        return redirect()->route('blogs.index')->with('mensaje',$mensaje);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensaje = 'No se puede eliminar ya que este elemento esta relacionado con otros registros!';
         try {
            $bloge = Blog::find($id);
            $bloge->delete();

            return redirect()->route('blogs.index');
        }catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('blogs.index')->with('mensaje',$mensaje);
        }
    }
}
