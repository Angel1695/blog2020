<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $menus = Menu::all();
        return view('admin.menuc.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menuc.crear');
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
            'nombre' => 'required|unique:menu|max:50',
            'descripcion' => 'required|unique:menu|max:50'
        ]);        

        //Guardar esa información en la tabla
        $menus = Menu::create([
                'nombre' => $request->get('nombre'),
                'descripcion' => $request->get('descripcion')
        ]);
        $mensaje = $menus?'Menu creada correctamente!':'El menu no ha sido creada!';
        return redirect()->route('menus.index')->with('mensaje',$mensaje);
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
        $menu = Menu::find($id);
        return view('admin.menuc.editar', compact('menu'));
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
            'descripcion' => 'required|max:50'
        ]); 

        //Actualizar la informacion
        $menu = Menu::find($id);
        $menu->nombre = $request->get("nombre");
        $menu->descripcion= $request->get("descripcion");
        $menu->save();

        $mensaje = $menu?'Menu Actualizada!':'No se ha podido actualizar el Menu!';
        return redirect()->route('menus.index')->with('mensaje',$mensaje);

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
            $menu = Menu::find($id);
            $menu->delete();
    
            return redirect()->route('menus.index');
       }catch (\Illuminate\Database\QueryException $e){
           return redirect()->route('cmenus.index')->with('mensaje',$mensaje);
       }
    }
}
