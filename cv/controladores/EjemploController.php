<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listaejemplo;
use App\Menu;
use App\Ejemplo;
use Illuminate\Support\Facades\DB;

class EjemploController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ejemplos = Ejemplo::all();
        return view('admin.ejemploc.index',compact('ejemplos'));
    }

     public function vista()
    {
        $listaejemplos = Listaejemplo::all();
        return view('usuario.homeejemplos',compact('listaejemplos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::orderBy('nombre','asc')->pluck('nombre', 'id');
        $listaejemplos = Listaejemplo::orderBy('nombre','asc')->pluck('nombre', 'id');
        return view('admin.ejemploc.crear', compact('menus','listaejemplos'));
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
            'ejemplo' => 'required',
            'lista' => 'required',
            
        ]);        

        //Guardar esa información en la tabla
        $ejemplos = Ejemplo::create([
                'nombre' => $request->get('nombre'),
                'descripcion' => $request->get('descripcion'),
                'ejemplo' => $request->get('ejemplo'),
                'idlista' => $request->get('lista'),
        ]);
        $mensaje = $ejemplos?'Ejemplo creada correctamente!':'El Ejemplo no ha sido creado!';
        return redirect()->route('ejemplos.index')->with('mensaje',$mensaje);
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
        
        
        $listaejemplos = DB::table('listaejemplo')->pluck('nombre', 'id');
        $ejemploe = Ejemplo::find($id);
        return view('admin.ejemploc.editar', compact('listaejemplos','ejemploe'));
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
            'ejemplo' => 'required',
            'idlista' => 'required',
        ]); 

        //Actualizar la informacion
        $ejemploe = Ejemplo::find($id);
        $ejemploe->nombre = $request->get("nombre");
        $ejemploe->descripcion = $request->get("descripcion");
        $ejemploe->ejemplo = $request->get("ejemplo");
        $ejemploe->idlista = $request->get("idlista");
        $ejemploe->save();

        $mensaje = $ejemploe?'Ejemplo actualizada correctamente!':'El Ejemplo no ha sido actualizado!';
        return redirect()->route('ejemplos.index')->with('mensaje',$mensaje);
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
            $ejemploe =Ejemplo::find($id);
            $ejemploe->delete();

            return redirect()->route('ejemplos.index');
        }catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('ejemplos.index')->with('mensaje',$mensaje);
        }
    }
}
