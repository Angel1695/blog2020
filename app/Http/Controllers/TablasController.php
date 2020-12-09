<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tablas;
Use App\Blog;



class TablasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tablas = Tablas::all();
        return view('admin.tablasc.index',compact('tablas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $blogs = Blog::orderBy('titular','asc')->pluck('titular', 'id');
        return view('admin.tablasc.crear',compact('blogs'));
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
            'blogs' => 'required',
            'nombre' => 'required|max:50',
            'descripcion' => 'required',
            'codigo' => 'required',
            
            
        ]);        

        //Guardar esa información en la tabla
        $tablas = Tablas::create([
            'idblog' => $request->get('blogs'),
                'nombre' => $request->get('nombre'),
                'descripcion' => $request->get('descripcion'),
                'codigo' => $request->get('codigo'),
                
        ]);

        $mensaje = $tablas?'Tabla creada correctamente!':'La Tablas no ha sido creado!';
        return redirect()->route('tablas.index')->with('mensaje',$mensaje);
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
        $tablae = Tablas::find($id);
        return view('admin.tablasc.editar', compact('tablae','bloge'));
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
            'nombre' => 'required|max:50',
            'descripcion' => 'required',
            'codigo' => 'required',
            
        ]); 

        //Actualizar la informacion
        $tablae = Tablas::find($id);
        $tablae->idblog = $request->get("idblog");
        $tablae->nombre = $request->get("nombre");
        $tablae->descripcion = $request->get("descripcion");
        $tablae->codigo = $request->get("codigo");
        $tablae->save();

        $mensaje = $tablae?'Tabla actualizada correctamente!':'La Tabla no ha sido actualizado!';
        return redirect()->route('tablas.index')->with('mensaje',$mensaje);
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
            $tablae = Tablas::find($id);
            $tablae->delete();

            return redirect()->route('tablas.index');
        }catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('tablas.index')->with('mensaje',$mensaje);
        }
    }
}
