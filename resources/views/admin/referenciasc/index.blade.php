@extends('masteradmin')
@section('Titulo','Lista de referencias')



 @section('contenidoadmin')
	<div class="container text-center" style="text-align:center;font-family:Sulphur Point;color:black;">
		<h1><b>Lista de Referencias</b></h1>
		<a class="btn btn-outline-warning"href="{{route('referencias.create')}}">Crear Referencias</a>
		<hr>

		<table class="table table-striped table-bordered table-hover">
		    <thead>
		      <tr> 
		        <th><b>Nombre</b></th>
		         <th><b>Editar</b></th>
		          <th><b>Eliminar</b></th>
		      </tr>
		    </thead>
		    <tbody>
		    	
			@foreach($referencias as $referencia)
		      <tr>
		      	<td>{{$referencia->nombre}}</td>
		      	<td>
		        	<a class="btn btn-secondary" href="{{route('referencias.edit',$referencia->id)}}">
		        		<i class="fa fa-pencil-square fa-2x"></i>
		        	</a>
		        	</td>
		       

		        <!-- borrar -->
		        <td>
		         {!! Form::open(['route' => ['referencias.destroy', $referencia->id]]) !!}
                <input type="hidden" name="_method" value="DELETE">
                <button onClick="return confirm('Eliminar Referencia?')" class="btn btn-secondary">
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