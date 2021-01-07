<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Perfiles;

class PerfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfiles = Perfiles::All();
        return view('admin.perfilesc.index',compact('perfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.perfilesc.crear');
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
            'nombre' => 'required',
        ]);        

        //Guardar esa información en la tabla
        $perfiles = Perfiles::create([
                'nombre' => $request->get('nombre'),
        ]);
        $mensaje = $perfiles?'Perfil creado correctamente!':'El Perfil no ha sido creado!';
        return redirect()->route('perfiles.index')->with('mensaje',$mensaje);
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
        $perfilee = Perfiles::find($id);
        return view('admin.perfilesc.editar', compact('perfilee'));
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
            'nombre' => 'required',
        ]); 

        //Actualizar la informacion
        $perfilee = Perfiles::find($id);
        $perfilee->nombre = $request->get("nombre");
        $perfilee->save();

        $mensaje = $perfilee?'Perfil Actualizado!':'No se ha podido actualizar el Perfil!';
        return redirect()->route('perfiles.index')->with('mensaje',$mensaje);
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
            $perfilee = Perfiles::find($id);
            $perfilee->delete();
    
            return redirect()->route('perfiles.index');
       }catch (\Illuminate\Database\QueryException $e){
           return redirect()->route('perfiles.index')->with('mensaje',$mensaje);
       }
    }
}
