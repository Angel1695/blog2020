<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listaejemplo;
use App\Menu;
use Illuminate\Support\Facades\DB;

class ListaejemploController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listas = Listaejemplo::all();
        return view('admin.listaejemploc.index',compact('listas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listas = Menu::orderBy('nombre','asc')->pluck('nombre', 'id');
        return view('admin.listaejemploc.crear', compact('listas'));
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
            'menu' => 'required'
        ]);        

        //Guardar esa información en la tabla
        $listas = Listaejemplo::create([
                'nombre' => $request->get('nombre'),
                'idmenu' => $request->get('menu'),
        ]);
        $mensaje = $listas?' lisa ejemplo creada correctamente!':'La lista no ha sido creada!';
        return redirect()->route('listas.index')->with('mensaje',$mensaje);
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
        
        $menus = DB::table('menu')->pluck('nombre', 'id');
        $listae = Listaejemplo::find($id);
        return view('admin.listaejemploc.editar', compact('menus','listae'));
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
            'idmenu' => 'required'
        ]); 

        //Actualizar la informacion
        $listae = Listaejemplo::find($id);
        $listae->nombre = $request->get("nombre");
        $listae->idmenu = $request->get("idmenu");
        $listae->save();

        $mensaje = $listae?' la lista se a actualizada correctamente!':'la lista no ha sido actualizada!';
        return redirect()->route('listas.index')->with('mensaje',$mensaje);
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
            $listae =Listaejemplo::find($id);
            $listae->delete();

            return redirect()->route('listas.index');
        }catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('listas.index')->with('mensaje',$mensaje);
        }
    }
}
