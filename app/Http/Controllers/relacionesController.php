<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Blog;
use App\Componentes;
use App\Relacion;

class relacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $componentes=session('componentes');  

          return view('admin.relacionesc.index',compact('componentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $blogs = Blog::orderBy('titular','asc')->pluck('titular', 'id');
        $componentes=session('componentes'); 
        return view('admin.formulariob', compact('componentes','blogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        //Validar la información
        $this->validate($request, [
            'blogs' => 'required',
            'valor' => 'required',
        ]);        

        //Guardar esa información en la tabla
        $relaciones = Relaciones::create([
            'idblog' => $request->get('blogs'),
                'valor' => $request->get('valor'),
                
        ]);
        $mensaje = $relaciones?'Relacion creado correctamente!':'La Relacion no ha sido creada!';
        return redirect()->route('relaciones.index')->with('mensaje',$mensaje);
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
        
        $bloge = DB::table('blog')->pluck('titular', 'id');
        $relacionee = Relacion::find($id);
        return view('admin.relacionesc.editar', compact('bloge','relacionee'));
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
            'idblog' => 'required',
            'valor' => 'required'
        ]); 

        //Actualizar la informacion
        $relacionee = Relacion::find($id);
        $relacionee->idblog = $request->get("idblog");
        $relacionee->valor = $request->get("valor");
        $relacionee->save();

        $mensaje = $relacionee?'Relacion actualizada correctamente!':'La Relacion  no ha sido actualizado!';
        return redirect()->route('relaciones.index')->with('mensaje',$mensaje);
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
            $relacionee =Relacion::find($id);
            $relacionee->delete();

            return redirect()->route('relaciones.index');
        }catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('relaciones.index')->with('mensaje',$mensaje);
        }
    }
}
