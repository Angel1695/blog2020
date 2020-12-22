@extends('masteradmin')
@section('Titulo','Lista de Componentes')



 @section('contenidoadmin')
	<div class="container text-center" style="text-align:center;font-family:Sulphur Point;color:black;">
		<h1><b>Lista de Componentes</b></h1>
		<!--no tiene caso tener un boton de crear componente-->
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
		    	
			@foreach($componentes as $componente)
		      <tr>
		      	<td>{{$componente->nombre}}</td>
		      	<td>
		        	<a class="btn btn-secondary" href="{{route('componentes.edit',$componente->id)}}">
		        		<i class="fa fa-pencil-square fa-2x"></i>
		        	</a>
		        	</td>
		       

		        <!-- borrar -->
		        <td>
		         {!! Form::open(['route' => ['componentes.destroy', $componente->id]]) !!}
                <input type="hidden" name="_method" value="DELETE">
                <button onClick="return confirm('Eliminar Componente?')" class="btn btn-secondary">
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