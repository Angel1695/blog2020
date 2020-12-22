@extends('masteradmin')
@section('Titulo','Lista de Blogs')



@section('contenidoadmin')
<div class="container text-center">
    <div class="card">
        <div class="card-header">
			<div class="row offset-md-4 col-md-4">
				<div class="col"><h3>lista de Blogs</h3></div>
				<a class="btn btn-outline-warning" href="{{route('blogs.create')}}">Crear Blogs</a>
			</div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Lenguaje</th>
                        <th>Capitulo</th>
                        <th>Titular</th>
                        <th>Autor</th>
                        <th>Fecha</th>
                        <th>ver blog</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($blogs as $blog)
                    <tr>
                        <td>{{$blog->lenguajes['nombre']}}</td>
                        <td>{{$blog->capitulo['nombre']}}</td>
                        <td>{{$blog->titular}}</td>
                        <td>{{$blog->autor}}</td>
                        <td>{{$blog->fercha}}</td>
                        <td>
                            <a href="{{route('plantilladefault',$blog->id )}}" class="btn btn-secondary"><i class="fa fa-eye fa-2x"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-secondary" href="{{route('blogs.edit',$blog->id)}}"><i class="fa fa-pencil-square fa-2x"></i></a>
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
        </div>
    </div>


    <hr>


    <hr>
</div>
@endsection