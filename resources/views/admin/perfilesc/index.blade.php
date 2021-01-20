@extends('masteradmin')
@section('Titulo','Lista de Perfiles')



 @section('contenidoadmin')
	<div class="container text-center" style="text-align:center;font-family:Sulphur Point;color:black;">
		<h1><b>Lista de Perfiles</b></h1>
			@can('isAdmin')
				<a class="btn btn-outline-warning"href="{{route('perfiles.create')}}">Crear Perfiles</a>
			@endcan
		<hr>

		<table class="table table-striped table-bordered table-hover">
		    <thead>
		      <tr> 
		        <th><b>Nombre</b></th>
				@can('isAdmin')
		         <th><b>Editar</b></th>
		          <th><b>Eliminar</b></th>
				@endcan
		      </tr>
		    </thead>
		    <tbody>
		    	
			@foreach($perfiles as $perfil)
		      <tr>
		      	<td>{{$perfil->nombre}}</td>
				@can('isAdmin')
					<td>
						<a class="btn btn-secondary" href="{{route('perfiles.edit',$perfil->id)}}">
							<i class="fa fa-pencil-square fa-2x"></i>
						</a>
						</td>
				

					<!-- borrar -->
					<td>
					{!! Form::open(['route' => ['perfiles.destroy', $perfil->id]]) !!}
						<input type="hidden" name="_method" value="DELETE">
						<button onClick="return confirm('Eliminar Perfil?')" class="btn btn-secondary">
						<i class="fa fa-trash-o fa-2x "></i>
						</button>
					{!! Form::close() !!}			
					</td>
		       	@endcan
		      </tr>

			@endforeach
		    </tbody>
		</table>
		<hr>
	</div>
@endsection 