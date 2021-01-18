<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Blog;
use App\Referencias;
use App\Capitulos;
use App\Practicas;
use App\Lenguajes;
use App\Tablas;
use App\Relacion;


class BlogController extends Controller
{
   
    public function __construct(){
        $this->model = new Blog;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
     
    public function index()
    {
        switch(auth()->user()->idperfil){
            case 1:
                $viewData['blogs'] = $this->model->lenguajes(Blog::all());
            break;
            case 2:case 3:
                $viewData['blogs'] = $this->model->lenguajes(Blog::where('idUser', auth()->user()->id)->get());
        }
        //return $viewData;
        return view('admin.blogsc.index',$viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $lenguajes = Lenguajes::orderBy('nombre','asc')->pluck('nombre', 'id');
        $capitulos = Capitulos::orderBy('nombre','asc')->pluck('nombre', 'id');
        return view('admin.blogsc.crear', compact('lenguajes','capitulos'));
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
            'lenguaje' => 'required',
            'capitulos' => 'required|max:50',
            'titular' => 'required',
            'autor' => 'required',
            'fercha' => 'required',
        ]);        

        //Guardar esa información en la tabla
        $blogs = Blog::create([
            'idlenguajes' => $request->get('lenguaje'),
                'idcapitulos' => $request->get('capitulos'),
                'titular' => $request->get('titular'),
                'autor' => $request->get('autor'),
                'fercha' => $request->get('fercha'),
                'idUser'=>auth()->user()->id,
        ]);
        session(['blog'=>$blogs]);
        $mensaje = $blogs?'Blog creado correctamente!':'El Blog no ha sido creado!';
        //return redirect()->route('blogs.index')->with('mensaje',$mensaje);
        return redirect('/ver');
        
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

        $viewData['blog']=Blog::with(['practica', 'capitulo'])->where('id',$id)->first();
        $viewData['capitulos'] = Capitulos::all();
        $viewData['componentes']= Relacion::where('idblog', $id)->orderBy('orden', 'ASC')->get();
        $viewData['tablas'] = Tablas::where('idblog', $id)->get();
        $viewData['referencias'] = Referencias::where('idBlog', $id);
        $viewData['lenguaje'] = Lenguajes::find(@$viewData['blog']['capitulo']['idlenguajes'])->clave;
        $viewData['lenguajes'] = Lenguajes::with('capitulos')->get();
        //return $viewData;

        $lenguajee = DB::table('lenguajes')->pluck('nombre', 'id');
        $capituloe = DB::table('capitulos')->pluck('nombre', 'id');
        $bloge = Blog::find($id);
        return view('admin.blogsc.editar', $viewData);
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
        //return $request;

        //ACTUALIZAR BLOG
        $bloge = Blog::find($id);
        foreach($request->blog as $k=>$v){
            $bloge->{$k} = $v;
        }
        $bloge->save();

        //ACTUALIZANDO PRACTICA
        $practica = Practicas::where('idBlog', $id*1)->first();
        foreach($request->practica as $k=>$v){
            $practica->{$k} = $v;
        }
        $practica->save();

        //ACTUALIZA INFORMACION DE TABLAS;
        foreach($request->table as $id=>$values){
            $tabla = Tablas::find($id);
            foreach($values as $k=>$v){
                $tabla->{$k} = $v;
            }
            $tabla->save();
        }

        //ACTUALIZANDO INFORMACION DE RELACIONES(ESTRUCTURA DEL BLOG)
        foreach($request->componente as $id=>$values){
            $componente = Relacion::find($id);
            switch($componente->idcomponente){
                case(5):
                    if(session()->has('imagenes')){
                        $session = session('imagenes');
                        $componente->valor = (array_key_exists('imagen_'.$id,$session)) ? $session['imagen_'.$id] : $values['valor'];
                        
                    }else{
                        $componente->valor = $values['valor'];    
                    }
                break;
                default:
                    $componente->valor = $values['valor'];
                break;
            }

            
            $componente->save();
        }
        if(session()->has('imagenes')){session()->forget('imagenes');}
        $mensaje = $bloge?'Blog actualizado correctamente!':'El Blog no ha sido actualizado!';
        return redirect()->route('blogs.index')->with('mensaje',$mensaje);
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
            $bloge = Blog::find($id);
            if(!empty($bloge)){
                //return $bloge;
                    //si el blog tiene una practica se elimina
                if($bloge->idpractica != null){Practicas::destroy($bloge->idPractica);}
                //si existe una tabla referente al blog lo elimina
                Tablas::where('idblog', $bloge->id)->delete();
                //si existen referencias pertenecientes al blog tambien las elimina
                Referencias::where('idBlog', $bloge->id)->delete();
                //relaciones
                Relacion::where('idblog', $bloge->id)->delete();
                //despues de eliminar todas las dependencias ya se puede eliminar el blog
                $bloge->delete();
                return redirect()->route('blogs.index');
            }else{
                return redirect()->route('blogs.index')->with('mensaje',"El blog que desea eliminar no exite");
            }
        }catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('blogs.index')->with('mensaje',$mensaje);
        }
    }

    public function getCapitulos($lenguajes_id){
        $capitulos = Capitulos::where('idlenguajes',$lenguajes_id)->orderBy('nombre','asc')->get();
        return $capitulos;
    }
}
