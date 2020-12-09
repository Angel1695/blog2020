@extends('masteradmin')
@section('Titulo','Lista de Blogs')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>lista de Blogs</h1>
		<a class="btn btn-outline-warning"href="{{route('blogs.create')}}">Crear Blogs</a>
		<hr>

		<table class="table table-striped table-bordered table-hover">
		    <thead>
		      <tr> 
		        <th>Capitulo</th>
		         <th>Practica</th>
		         <th>Referencias</th>
		         <th>Titular</th>
		         <th>Autor</th>
		         <th>Fecha</th>
		         <th>Editar</th>
		          <th>Eliminar</th>
		      </tr>
		    </thead>
		    <tbody>
		    	
			@foreach($blogs as $blog)
		      <tr>
		      	<td>{{$blog->capitulo['nombre']}}</td>
		      	<td>{{$blog->practicas['nombre']}}</td>
		      	<td>{{$blog->referencias['nombre']}}</td>
		      	<td>{{$blog->titular}}</td>
		      	<td>{{$blog->autor}}</td>
		      	<td>{{$blog->fercha}}</td>
		      	<td>
		        	<a class="btn btn-secondary" href="{{route('blogs.edit',$blog->id)}}">
		        		<i class="fa fa-pencil-square fa-2x"></i>
		        	</a>
		        	</td>
		       

		        <!-- borrar -->
		        <td>
		         {!! Form::open(['route' => ['blogs.destroy', $blog->id]]) !!}
                <input type="hidden" name="_method" value="DELETE">
                <button onClick="return confirm('Eliminar Blogs?')" class="btn btn-secondary">
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