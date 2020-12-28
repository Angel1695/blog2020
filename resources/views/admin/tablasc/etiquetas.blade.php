@if(auth()->user()->idperfil == 1)
    @extends('masteradmin')
@else
    @extends('master')
@endif

@section('Titulo','Lista Tablas')

@section((auth()->user()->idperfil == 1) ? 'contenidoadmin' :'contenido')
<div class="container text-center">
    <div class="card">
        <div class="card-header">
            <strong>{{strtoupper($section)}}S</strong>
        </div>
        <div class="card-body">
            <div class="row">
                 @foreach($blogs as $blog)
                    @if(!$blog->tablas->isEmpty() && $blog->tablas[0]['tipo'] == $section)
                        <div class="col-md-12">
                            <div class="col-md-11"><strong>{{$blog->capitulo->nombre}}</strong></div>
                            @foreach($blog->tablas as $tabla)
                                @if($tabla->tipo == $section)
                                    <div class="row">
                                        <div class="col-md-12"><a href="{{url('/seccion/'.$section.'/'.$tabla->id)}}" class="btn btn-link">{{$tabla->nombre}}</a></div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                 @endforeach
            </div><br><br>
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-8 offset-md-2">
                            <label for=""><h4>{{@$etiqueta->nombre}}</h4></label>
                        </div><br>
                        <div class="col-md-10 offset-md-1">
                            <p>{{@$etiqueta->descripcion}}</p>
                        </div><br>
                        <div class="col-md-10 offset-md-1">
                            <p>{{@$etiqueta->codigo}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection