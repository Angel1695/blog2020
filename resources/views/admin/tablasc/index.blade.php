@extends('masteradmin')
@section('Titulo','Lista Tablas')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>lista de Tablas</h1>
		<a class="btn btn-outline-warning"href="{{route('tablas.create')}}">Crear Tabla</a>
		<hr>

		<table class="table table-striped table-bordered table-hover">
		    <thead>
		      <tr> 
		      	<th>Blog</th>
		        <th>Nombre</th>
		         <th>Descripcion</th>
		          <th>Codigo</th>
		         <th>Editar</th>
		          <th>Eliminar</th>
		      </tr>
		    </thead>
		    <tbody>
		    	
			@foreach($tablas as $tabla)
		      <tr>
		      	<td>{{$tabla->blog['titular']}}</td>
		      	<td>{{$tabla->nombre}}</td>
		      	<td>{{$tabla->descripcion}}</td>
		      	<td>{{$tabla->codigo}}</td>
		      	<td>
		        	<a class="btn btn-secondary" href="{{route('tablas.edit',$tabla->id)}}">
		        		<i class="fa fa-pencil-square fa-2x"></i>
		        	</a>
		        	</td>
		       

		        <!-- borrar -->
		        <td>
		         {!! Form::open(['route' => ['tablas.destroy', $tabla->id]]) !!}
                <input type="hidden" name="_method" value="DELETE">
                <button onClick="return confirm('Eliminar Tabla?')" class="btn btn-secondary">
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