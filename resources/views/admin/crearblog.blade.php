@extends('masteradmin')
@section('Titulo','Lista de Perfiles')



@section('contenidoadmin')
<div class="container text-center" style="text-align:center;font-family:Sulphur Point;color:black;">

    <h1><b>Diseñe su Blog</b></h1>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="list-group">

                    <h2><b>Selecione sus Componentes</b></h2>
                    <br>

                    @foreach($componentes as $componente)

                    <a data-id="{{$componente['id']}}" href="#"
                        class="componente list-group-item list-group-item-action"><strong>{{$componente->nombre}}</strong></a>

                    @endforeach
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6">
				<div class="card">
				<div class="card-header"><h3><b>Estructura del Blog</b></h3></div>
				<div class="card-body">
					<div id="lista"> <br><br><br><br><br>
					</div>
				</div>
				<div class="card-footer text-center">
					<div class="form-group row">
						<div class="col"><a href="{{route('limpiarcampo')}}" class="btn btn-danger"> limpiar</a><br></div>
						<div class="col"><a href="{{route('relaciones.create')}}" class="btn btn-success">crear blog</a></div>

					</div>
				</div>
				</div>
                
                
               
               
            </div>

        </div>
    </div>
</div><br><br>


<script type="text/javascript" src="{{asset('js/lista.js')}}"></script>

@endsection