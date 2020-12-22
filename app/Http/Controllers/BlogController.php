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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch(auth()->user()->idperfil){
            case 1:
                $viewData['blogs'] = Blog::all();
            break;
            case 2:case 3:
                $viewData['blogs'] = Blog::where('idUser', auth()->user()->id)->get();
        }
        
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
        $lenguajee = DB::table('lenguajes')->pluck('nombre', 'id');
        $capituloe = DB::table('capitulos')->pluck('nombre', 'id');
        $bloge = Blog::find($id);
        return view('admin.blogsc.editar', compact('lenguajee','capituloe','bloge'));
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
            'idlenguajes' => 'required',
            'idcapitulos' => 'required',
            'titular' => 'required',
            'autor' => 'required',
            'fercha' => 'required'
        ]); 

        //Actualizar la informacion
        $bloge = Blog::find($id);
        $bloge->idlenguajes = $request->get("idlenguajes");
        $bloge->idcapitulos = $request->get("idcapitulos");
        $bloge->titular = $request->get("titular");
        $bloge->autor = $request->get("autor");
        $bloge->fercha = $request->get("fercha");
        $bloge->save();

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
}
