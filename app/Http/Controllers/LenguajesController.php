<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lenguajes;
use Illuminate\Support\Facades\DB;

class LenguajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lenguajes = Lenguajes::all();
        return view('admin.lenguajesc.index',compact('lenguajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.lenguajesc.crear');
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
            'nombre' => 'required|unique:lenguajes',
            'descripcion' => 'required'
        ]);        

        //Guardar esa información en la tabla
        $lenguajes = Lenguajes::create([
                'nombre' => $request->get('nombre'),
                'descripcion' => $request->get('descripcion')
        ]);
        $mensaje = $lenguajes?'Lenguaje creado correctamente!':'El lenguaje no ha sido creado!';
        return redirect()->route('lenguajes.index')->with('mensaje',$mensaje);
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
        $lenguajee = Lenguajes::find($id);
        return view('admin.lenguajesc.editar', compact('lenguajee'));
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
            'descripcion' => 'required'
        ]); 

        //Actualizar la informacion
        $lenguajee = Lenguajes::find($id);
        $lenguajee->nombre = $request->get("nombre");
        $lenguajee->descripcion= $request->get("descripcion");
        $lenguajee->save();

        $mensaje = $lenguajee?'Lenguaje Actualizado!':'No se ha podido actualizar el Lenguaje!';
        return redirect()->route('lenguajes.index')->with('mensaje',$mensaje);
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
            $lenguajee = Lenguajes::find($id);
            $lenguajee->delete();
    
            return redirect()->route('lenguajes.index');
       }catch (\Illuminate\Database\QueryException $e){
           return redirect()->route('lenguajes.index')->with('mensaje',$mensaje);
       }
    }
}
