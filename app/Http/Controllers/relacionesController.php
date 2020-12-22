<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Blog;
use App\Componentes;
use App\Relacion;
use App\Tablas;
use App\Practicas;
use App\Referencias;

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
        //return $componentes;
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
        //return $request;
        
        $blog = @session('blog');
        $componentes = @session('componentes');
        foreach($request->except('_token', 'referencias') as $key => $item){
            $id = explode("_", $key);
            $componente_id = $componentes[end($id)];
            //Guardar esa información en la tabla
            switch($componente_id){
                case 5:case 11:
                    $item = $request->file($key)->store('imagenes', 'public');
                break;
                case 13:
                    $tablas = $request->{$key};
                    foreach($tablas as $tabla){
                        $tabla['idblog'] = $blog->id;
                        Tablas::create($tabla);
                    }
                    $item = "tabla";
                break;
                case 14:
                    $practica = Practicas::create($request->{$key});
                    Blog::where('id', $blog->id)->update(['idpractica'=>$practica->id]);
                    $item = "practica";
                break;
            }
                $relaciones = Relacion::create([
                    'idblog' => $blog->id,
                    'idcomponente'=>$componente_id,
                    'valor' => @$item,
                    'orden' => end($id),
                ]);
            
        }
        foreach($request->referencias as $ref){
            $ref['idBlog'] = $blog->id;
            Referencias::create($ref);
        }
        session()->forget('componentes');
        session()->forget('blog');
        $mensaje = $relaciones?'Blog creado correctamente!':'el Blog no ha sido creado!';
        return redirect()->route('blogs.index')->with('mensaje',$mensaje);
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