@extends('masteradmin')
@section('Titulo','Lista de Lenguajes')



 @section('contenidoadmin')
	<div class="container text-center" style="text-align:center;font-family:Sulphur Point;color:black;">
		<h1><b>Lista de Lenguajes</b></h1>
		<a class="btn btn-outline-warning"href="{{route('lenguajes.create')}}">Crear Lenguaje</a>
		<hr>

		<table class="table table-striped table-bordered table-hover">
		    <thead>
		      <tr> 
		        <th><b>Nombre</b></th>
		         <th><b>Descripcion</b></th>
		         <th><b>Editar</b></th>
		          <th><b>Eliminar</b></th>
		      </tr>
		    </thead>
		    <tbody>
		    	
			@foreach($lenguajes as $lenguaje)
		      <tr>
		      	<td>{{$lenguaje->nombre}}</td>
		      	<td>{!!$lenguaje->descripcion!!}</td>
		      	<td>
		        	<a class="btn btn-secondary" href="{{route('lenguajes.edit',$lenguaje->id)}}">
		        		<i class="fa fa-pencil-square fa-2x"></i>
		        	</a>
		        	</td>
		       

		        <!-- borrar -->
		        <td>
		         {!! Form::open(['route' => ['lenguajes.destroy', $lenguaje->id]]) !!}
                <input type="hidden" name="_method" value="DELETE">
                <button onClick="return confirm('Eliminar Lenguaje?')" class="btn btn-secondary">
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