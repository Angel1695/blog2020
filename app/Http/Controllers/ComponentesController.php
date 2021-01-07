<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Componentes;

class ComponentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $componentes = Componentes::all();
        return view('admin.componentesc.index',compact('componentes'));
    }
    public function vista()
    {     
        $componentes = Componentes::all();
        return view('admin.crearblog',compact('componentes'));
    
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.componentesc.crear');
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
        $componentes =Componentes::create([
                'nombre' => $request->get('nombre'),
        ]);
        $mensaje = $componentes?'Componente creado correctamente!':'El Componente no ha sido creada!';
        return redirect()->route('componentes.index')->with('mensaje',$mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $componentee = Componentes::find($id);
        return view('admin.componentesc.editar', compact('componentee'));
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
        $componentee = Componentes::find($id);
        $componentee->nombre = $request->get("nombre");
        $componentee->save();

        $mensaje = $componentee?'Componenete Actualizada!':'No se ha podido actualizar el Componenete!';
        return redirect()->route('componentes.index')->with('mensaje',$mensaje);
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
            $componentee = Componentes::find($id);
            $componentee->delete();
    
            return redirect()->route('componentes.index');
       }catch (\Illuminate\Database\QueryException $e){
           return redirect()->route('componentes.index')->with('mensaje',$mensaje);
       }
    }

    public function sesiones(Request $seciones){
        //session()->forget("componentes");
        //return "ok";
        //$seciones = ["id"=>1];
        if (session()->has('componentes')) {
        $componentes=session('componentes');

        $componentes[]=$seciones->id;
        session(['componentes'=>$componentes]);
        $nombre=[];
        for ($i=0; $i <count($componentes) ; $i++) { 
            $dato = Componentes::find($componentes[$i]);
            $nombre[]=$dato->nombre;
        }
            return response()->json($nombre);
     }else
        {
        session(['componentes'=>[$seciones['id']]]);
        $dato = Componentes::find($seciones['id']);
        $nombre[]=$dato->nombre;

        return response()->json($nombre);
    }
        

    }

    public function limpiarcampo(){

    session()->forget("componentes"); 
    return back()->withInput();
    }
}
