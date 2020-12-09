<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Practicas;

class PracticasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $practicas = Practicas::all();
        return view('admin.practicasc.index',compact('practicas'));
    }

    //  public function vista()
    // {
    //     $listaejemplos = Listaejemplo::all();
    //     return view('usuario.homeejemplos',compact('listaejemplos'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.practicasc.crear');
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
            'nombre' => 'required|max:50',
            'descripcion' => 'required',
            'codigo' => 'required',
            
            
        ]);        

        //Guardar esa información en la tabla
        $practicas = Practicas::create([
                'nombre' => $request->get('nombre'),
                'descripcion' => $request->get('descripcion'),
                'codigo' => $request->get('codigo'),
                
        ]);
        $mensaje = $practicas?'practica creada correctamente!':'La parctica no ha sido creado!';
        return redirect()->route('practicas.index')->with('mensaje',$mensaje);
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
        
        
        $practicae = Practicas::find($id);
        return view('admin.practicasc.editar', compact('practicae'));
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
            'nombre' => 'required|max:50',
            'descripcion' => 'required',
            'codigo' => 'required',
            
        ]); 

        //Actualizar la informacion
        $practicae = Practicas::find($id);
        $practicae->nombre = $request->get("nombre");
        $practicae->descripcion = $request->get("descripcion");
        $practicae->codigo = $request->get("codigo");
        $practicae->save();

        $mensaje = $practicae?'Practica actualizada correctamente!':'La Practica no ha sido actualizado!';
        return redirect()->route('practicas.index')->with('mensaje',$mensaje);
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
            $practicae =Practicas::find($id);
            $practicae->delete();

            return redirect()->route('practicas.index');
        }catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('practicas.index')->with('mensaje',$mensaje);
        }
    }
}
