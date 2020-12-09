@extends('masteradmin')
@section('Titulo','Crear Informacion')



 @section('contenidoadmin')
	<div class="container text-center" style="text-align:center;font-family:Sulphur Point;color:black;">
		<h1><b>Lista de Informacion</b></h1>
		<a class="btn btn-outline-warning"href="{{route('informaciones.create')}}">Crear Informacion</a>
		<hr>

		<table class="table table-striped table-bordered table-hover">
		    <thead>
		      <tr> 
		        <th><b>Nombre</b></th>
		         <th><b>Descripcion</b></th>
		         <th><b>Imagen</b></th>
		         <th><b>Mision</b></th>
		         <th><b>Vision</b></th>
		         <th><b>Frase</b></th>
		          <th><b>Editar</b></th>
		          <th><b>Eliminar</b></th>
		      </tr>
		    </thead>
		    <tbody>
		    	
			@foreach($informaciones as $informacion)
		      <tr>
		      	<td>{{$informacion->nombre}}</td>
		      	<td>{{$informacion->descripcion}}</td>
		      	<td><img class="img-responsive" src="{{ asset('archivos/'.$informacion->imagen) }}" title="informacion" width="150" ></td>
		      	<td>{{$informacion->mision}}</td>
		      	<td>{{$informacion->vision}}</td>
		      	<td>{{$informacion->frase}}</td>
		      	<td>
		        	<a class="btn btn-secondary" href="{{route('informaciones.edit',$informacion->id)}}">
		        		<i class="fa fa-pencil-square fa-2x"></i>
		        	</a>
		        	</td>
		       

		        <!-- borrar -->
		        <td>
		         {!! Form::open(['route' => ['informaciones.destroy', $informacion->id]]) !!}
                <input type="hidden" name="_method" value="DELETE">
                <button onClick="return confirm('Eliminar Menu?')" class="btn btn-secondary">
                  <i class="fa fa-trash-o fa-2x "></i>
                </button>
              {!! Form::close() !!}
                          	
		        </td>
		       
		      </tr>

			@endforeach
		    </tbody>
		</table>
		<hr>
	</div>
@endsection 