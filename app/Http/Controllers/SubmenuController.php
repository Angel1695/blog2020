<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submenu;
use App\Menu;
use Illuminate\Support\Facades\DB;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $submenus = Submenu::all();
        return view('admin.submenuc.index',compact('submenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::orderBy('nombre','asc')->pluck('nombre', 'id');
        return view('admin.submenuc.crear', compact('menus'));
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
        $submenus = Submenu::create([
                'nombre' => $request->get('nombre'),
                'idmenu' => $request->get('menu'),
        ]);
        $mensaje = $submenus?'SubMenu creada correctamente!':'La submenus no ha sido creada!';
        return redirect()->route('submenus.index')->with('mensaje',$mensaje);
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
        $submenus = Submenu::find($id);
        return view('admin.submenuc.editar', compact('menus','submenus'));
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
        $submenus = Submenu::find($id);
        $submenus->nombre = $request->get("nombre");
        $submenus->idmenu = $request->get("idmenu");
        $submenus->save();

        $mensaje = $submenus?'Submenu actualizada correctamente!':'El submenu no ha sido actualizada!';
        return redirect()->route('submenus.index')->with('mensaje',$mensaje);
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
            $submenus =Submenu::find($id);
            $submenus->delete();

            return redirect()->route('submenus.index');
        }catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('submenus.index')->with('mensaje',$mensaje);
        }
    }
}
