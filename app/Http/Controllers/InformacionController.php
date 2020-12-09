<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informacion;

class InformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informaciones = Informacion::All();
        return view('admin.informacionc.index',compact('informaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.informacionc.crear');
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
            'nombre' => 'required|unique:informacion',
            'descripcion' => 'required',
            'archivo' => 'required',
            'mision' => 'required',
            'vision' => 'required',
            'frase' => 'required',
        ]);        
        //cambiar nombre y guardar el archivo
        $now = new \DateTime();
        $fecha = $now->format('Ymd-His');
        $name = $request->get('nombre');
        $archivo = $request->file('archivo');
        $nombre = "";

        if ($archivo) {
            $extension = $archivo->getClientOriginalExtension();
            $nombre = "informacion-".$name."-".$fecha.".".$extension;
            \Storage::disk('local')->put($nombre, \File::get($archivo));

        }
        //Guardar esa información en la tabla
        $informaciones = Informacion::create([
                'nombre' => $request->get('nombre'),
                'descripcion'=> $request->get('descripcion'),
                'imagen' => $nombre,
                'mision'=> $request->get('mision'),
                'vision'=> $request->get('vision'),
                'frase'=> $request->get('frase'),
        ]);
        $mensaje = $informaciones?'informacion creado correctamente!':'La informacion no ha sido creado!';
        return redirect()->route('informaciones.index')->with('mensaje',$mensaje);
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
        $info = Informacion::find($id);
        return view('admin.informacionc.editar', compact('info'));
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
        //borrar imagen anterior antes de actualizar
        $info = Informacion::find($id);
        if(\File::exists(public_path('archivos/'.$info->imagen))){
            \File::delete(public_path('archivos/'.$info->imagen));
          }else{
            $mensaje = 'No existe imagen';
          }
      //Validar la información
      $this->validate($request, [
        'nombre' => 'required',
        'descripcion' => 'required',
        'archivo' => 'required',
        'mision' => 'required',
        'vision' => 'required',
        'frase' => 'required',
    ]);        
    //cambiar nombre y guardar el archivo
    $now = new \DateTime();
    $fecha = $now->format('Ymd-His');
    $name = $request->get('nombre');
    $archivo = $request->file('archivo');
    $nombre = "";

    if ($archivo) {
        $extension = $archivo->getClientOriginalExtension();
        $nombre = "informacion-".$name."-".$fecha.".".$extension;
        \Storage::disk('local')->put($nombre, \File::get($archivo));

    }
    //Guardar esa información en la tabla
    $info = Informacion::find($id);
    $info->nombre = $request->get("nombre");
    $info->descripcion = $request->get("descripcion");
    $info->imagen = $nombre;
    $info->mision = $request->get("mision");
    $info->vision = $request->get("vision");
    $info->frase = $request->get("frase");
    $info->save();
  
    $mensaje = $info?'Informacion actualizado correctamente!':'La Informacion no ha sido actualizado!';
    return redirect()->route('informaciones.index')->with('mensaje',$mensaje);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Informacion::find($id);
        $info->delete();
        if(\File::exists(public_path('archivos/'.$info->imagen))){
            \File::delete(public_path('archivos/'.$info->imagen));
          }else{
            dd('El archivo no existe.');
          }

        return redirect()->route('informaciones.index');
    }
}
