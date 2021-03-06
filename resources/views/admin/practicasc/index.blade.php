@extends('masteradmin')
@section('Titulo','Lista Practicas')



@section('contenidoadmin')
<div class="container text-center">
    <h1>lista de Practicas</h1>
    @can('isAdmin')
    <a class="btn btn-outline-warning" href="{{route('practicas.create')}}">Crear Practica</a>
    @endcan
    <hr>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Codigo</th>
                @can('isAdmin')
                <th>Editar</th>
                <th>Eliminar</th>
                @endcan
            </tr>
        </thead>
        <tbody>

            @foreach($practicas as $practica)
            <tr>
                <td>{{$practica->nombre}}</td>
                <td>{{$practica->descripcion}}</td>
                <td>{{$practica->codigo}}</td>
                @can('isAdmin')
				<td>
                    <a class="btn btn-secondary" href="{{route('practicas.edit',$practica->id)}}">
                        <i class="fa fa-pencil-square fa-2x"></i>
                    </a>
                </td>


                <!-- borrar -->
                <td>
                    {!! Form::open(['route' => ['practicas.destroy', $practica->id]]) !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <button onClick="return confirm('Eliminar Practicas?')" class="btn btn-secondary">
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