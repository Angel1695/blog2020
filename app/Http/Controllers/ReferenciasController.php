<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Referencias;

class ReferenciasController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $referencias = Referencias::all();
        return view('admin.referenciasc.index',compact('referencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.referenciasc.crear');
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
        $referencias = Referencias::create([
                'nombre' => $request->get('nombre'),
        ]);
        $mensaje = $referencias?'Referencia creado correctamente!':'La Referencia no ha sido creada!';
        return redirect()->route('referencias.index')->with('mensaje',$mensaje);
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
        $referenciae = Referencias::find($id);
        return view('admin.referenciasc.editar', compact('referenciae'));
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
        $referenciae = Referencias::find($id);
        $referenciae->nombre = $request->get("nombre");
        $referenciae->save();

        $mensaje = $referenciae?'referencia Actualizada!':'No se ha podido actualizar la referencia!';
        return redirect()->route('referencias.index')->with('mensaje',$mensaje);
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
            $refrenciae = Referencias::find($id);
            $refrenciae->delete();
    
            return redirect()->route('referencias.index');
       }catch (\Illuminate\Database\QueryException $e){
           return redirect()->route('referencias.index')->with('mensaje',$mensaje);
       }
    }
}
