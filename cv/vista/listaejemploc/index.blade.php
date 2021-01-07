@extends('masteradmin')
@section('Titulo','Crear Listade Ejemplos')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>lista de Ejemplos</h1>
		<a class="btn btn-outline-warning"href="{{route('listas.create')}}">Crear lista</a>
		<hr>

		<table class="table table-striped table-bordered table-hover">
		    <thead>
		      <tr> 
		        <th>Nombre</th>
		         <th>Menu</th>
		         <th>Editar</th>
		          <th>Eliminar</th>
		      </tr>
		    </thead>
		    <tbody>
		    	
			@foreach($listas as $lista)
		      <tr>
		      	<td>{{$lista->nombre}}</td>
		      	<td>{{$lista->menus['nombre']}}</td>
		      	<td>
		        	<a class="btn btn-secondary" href="{{route('listas.edit',$lista->id)}}">
		        		<i class="fa fa-pencil-square fa-2x"></i>
		        	</a>
		        	</td>
		       

		        <!-- borrar -->
		        <td>
		         {!! Form::open(['route' => ['listas.destroy', $lista->id]]) !!}
                <input type="hidden" name="_method" value="DELETE">
                <button onClick="return confirm('Eliminar lista?')" class="btn btn-secondary">
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