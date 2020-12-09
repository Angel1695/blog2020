<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Capitulos;
use App\Lenguajes;
use Illuminate\Support\Facades\DB;

class CapitulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $capitulos = Capitulos::all();
        return view('admin.capitulosc.index',compact('capitulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lenguajes = Lenguajes::orderBy('nombre','asc')->pluck('nombre', 'id');
        return view('admin.capitulosc.crear', compact('lenguajes'));
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
            'lenguaje' => 'required'
        ]);        

        //Guardar esa información en la tabla
        $capitulos = Capitulos::create([
                'nombre' => $request->get('nombre'),
                'idlenguajes' => $request->get('lenguaje'),
        ]);
        $mensaje = $capitulos?'Capitulo creado correctamente!':'El Capitulo no ha sido creada!';
        return redirect()->route('capitulos.index')->with('mensaje',$mensaje);
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
        $capituloe = Capitulos::find($id);
        return view('admin.capitulosc.editar', compact('lenguajee','capituloe'));
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
            'idlenguajes' => 'required'
        ]); 

        //Actualizar la informacion
        $capituloe = Capitulos::find($id);
        $capituloe->nombre = $request->get("nombre");
        $capituloe->idlenguajes = $request->get("idlenguajes");
        $capituloe->save();

        $mensaje = $capituloe?'Capitulo actualizad correctamente!':'El Capitulo no ha sido actualizado!';
        return redirect()->route('capitulos.index')->with('mensaje',$mensaje);
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
            $capituloe =Capitulos::find($id);
            $capituloe->delete();

            return redirect()->route('capitulos.index');
        }catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('capitulos.index')->with('mensaje',$mensaje);
        }
    }
}
