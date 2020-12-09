@extends('masteradmin')
@section('Titulo','Crear  Ejemplos')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>lista de Ejemplos</h1>
		<a class="btn btn-outline-warning"href="{{route('ejemplos.create')}}">Crear Ejemplo</a>
		<hr>

		<table class="table table-striped table-bordered table-hover">
		    <thead>
		      <tr> 
		        <th>Nombre</th>
		         <th>Descrpcion</th>
		          <th>Ejemplo</th>
		           <th>Lista Ejemplos</th>
		         <th>Editar</th>
		          <th>Eliminar</th>
		      </tr>
		    </thead>
		    <tbody>
		    	
			@foreach($ejemplos as $ejemplo)
		      <tr>
		      	<td>{{$ejemplo->nombre}}</td>
		      	<td>{{$ejemplo->descripcion}}</td>
		      	<td>{{$ejemplo->ejemplo}}</td>
		      	<td>{{$ejemplo->listaejemplo['nombre']}}</td>
		      	<td>
		        	<a class="btn btn-secondary" href="{{route('ejemplos.edit',$ejemplo->id)}}">
		        		<i class="fa fa-pencil-square fa-2x"></i>
		        	</a>
		        	</td>
		       

		        <!-- borrar -->
		        <td>
		         {!! Form::open(['route' => ['ejemplos.destroy', $ejemplo->id]]) !!}
                <input type="hidden" name="_method" value="DELETE">
                <button onClick="return confirm('Eliminar ejemplo?')" class="btn btn-secondary">
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