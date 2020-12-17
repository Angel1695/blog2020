@extends('masteradmin')
@section('Titulo','Lista de Capitulos')



@section('contenidoadmin')
<div class="container text-center">
    <h1>lista de Capitulo</h1>
	@can('isAdmin')
    	<a class="btn btn-outline-warning" href="{{route('capitulos.create')}}">Crear Capitulo</a>
	@endcan
	<hr>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Lenguaje</th>
				@can('isAdmin')
					<th>Editar</th>
					<th>Eliminar</th>
				@endcan
            </tr>
        </thead>
        <tbody>

            @foreach($capitulos as $capitulo)
            <tr>
                <td>{{$capitulo->nombre}}</td>
                <td>{{$capitulo->lenguajes['nombre']}}</td>
				@can('isAdmin')
					<td>
						<a class="btn btn-secondary" href="{{route('capitulos.edit',$capitulo->id)}}">
							<i class="fa fa-pencil-square fa-2x"></i>
						</a>
					</td>
					<!-- borrar -->
					<td>
						{!! Form::open(['route' => ['capitulos.destroy', $capitulo->id]]) !!}
						<input type="hidden" name="_method" value="DELETE">
						<button onClick="return confirm('Eliminar Capitulo?')" class="btn btn-secondary">
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