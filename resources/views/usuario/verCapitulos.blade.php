@extends('master')
@section('Titulo','Bienvenido')

@section('contenido')
<div class="main-footer widgets-dark typo-light">
<div class="container">
    <br>
    <div class="card" >
        <div class="card-header" style="background: rgb(0,0,139)"><h1 style="font-family:Sulphur Point;font-weight: bold;color: white">{{$lenguaje->nombre}}</h1></div>
        <div class="card-body">
            <ul class="nav nav-tabs" style="font-family:Sulphur Point;  font-weight:bold;">
                @php  $cont = 0; @endphp
                @foreach($capitulos as $cap)
                    <li class="nav-item">
                        @if($cap->id == $capitulos_id)
                            <a class="nav-link active" data-toggle="tab" href="#section_{{$cap->id}}">{{$cap->nombre}}</a>
                        @elseif($cont == 0 && $capitulos_id == -1)
                            <a class="nav-link active" data-toggle="tab" href="#section_{{$cap->id}}">{{$cap->nombre}}</a>
                        @else
                            <a class="nav-link" data-toggle="tab" href="#section_{{$cap->id}}">{{$cap->nombre}}</a>
                        @endif
                    </li>
                    @php $cont += 1;  @endphp 
                @endforeach
                
            </ul>
            <div id="myTabContent" class="tab-content">
                @php  $c = 0; @endphp
                @foreach($capitulos as $cap)
                    @if($cap->id == $capitulos_id )
                        <div class="tab-pane fade show active" id="section_{{$cap->id}}">
                    @elseif($c == 0 && $capitulos_id == -1)
                        <div class="tab-pane fade show active" id="section_{{$cap->id}}">
                    @else
                        <div class="tab-pane fade" id="section_{{$cap->id}}">
                    @endif
                            <div class="col-md-12"><br>
                                <div class="row">
                                    @if(!$cap->blogs->isEmpty())
                                        @foreach($cap->blogs as $blog)
                                        
                                            <div class="col-md-4 text-center" style="font-family: Comfortaa">
                                                <div  class="card border-warning mb-3" style="max-width: 18rem;">
                                                    <div class="card-header"  style="font-weight:bold;background: rgb(241, 196, 15);"><strong >{{$blog->titular}}</strong></div>
                                                    <div class="card-body">
                                                        <div class="col-md-12" style="font-weight:bold;"><strong>Autor</strong></div>
                                                        <label for="" style="font-family:Sulphur Point;">{{$blog->autor}}</label><br>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-12"><strong>Tablas</strong></div>
                                                                <label for="">{{(count(@$blog->tablas) > 0) ?  1 : 0}}</label><br>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="col-md-12"><strong>Practicas</strong></div>
                                                                <label for="">{{(@$blog->practicas != null) ?  1 : 0}}</label><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <center><a href="{{route('plantilladefault',$blog->id )}}"class="btn btn-outline-dark" class="fa fa-eye fa-2x">Ver</a></center>
                                                    </div>
                                                </div><br>
                                            </div>
                                        
                                        @endforeach
                                    @else
                                        <div class="col-md-6 offset-md-3">
                                            <h2>Aun no existen blogs!!!</h2>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @php $c += 1;  @endphp
                @endforeach

               
            </div>
        </div>
    </div>
</div>
</div>
@endsection