@extends('masteradmin')
@section('Titulo','Lista de Relaciones')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>lista de Relaciones</h1>
		<a class="btn btn-outline-warning"href="{{route('relaciones.create')}}">Crear Relaciones</a>
		<hr>

		<table class="table table-striped table-bordered table-hover">
		    <thead>
		      <tr> 
		        <th>Componente</th>
		         <th>Blog</th>
		         <th>valor</th>
		         <th>Editar</th>
		          <th>Eliminar</th>
		      </tr>
		    </thead>
		    <tbody>
		    	
			@foreach($relaciones as $relacion)
		      <tr>
		      	<td>{{$relacion->componentes['nombre']}}</td>
		      	<td>{{$relacion->blogs['titular']}}</td>
		      	<td>{{$relacion->fercha}}</td>
		      	<td>
		        	<a class="btn btn-secondary" href="{{route('relaciones.edit',$relacion->id)}}">
		        		<i class="fa fa-pencil-square fa-2x"></i>
		        	</a>
		        	</td>
		       

		        <!-- borrar -->
		        <td>
		         {!! Form::open(['route' => ['relaciones.destroy', $relacion->id]]) !!}
                <input type="hidden" name="_method" value="DELETE">
                <button onClick="return confirm('Eliminar Relaciones?')" class="btn btn-secondary">
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