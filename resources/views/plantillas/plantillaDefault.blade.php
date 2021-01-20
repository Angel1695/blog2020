<div class="container">
    <div class="row">
    <a href="javascript:history.back()" class="btn btn-success">Volver atras</a>
    </div><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @foreach($componentes as $item)
                        @switch($item->idcomponente)
                            @case (1)     
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <h1><strong>{{$item->valor}}</strong></h1>
                                    </div>
                                </div><br>
                            @break
                            @case (2)
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <h3><strong>{{$item->valor}}</strong></h3>
                                    </div>
                                </div><br>
                            @break
                            @case (3)
                                <div class="row text-justify">
                                    <div class="col-md-10 offset-md-1">
                                        <p>{{$item->valor}}</p>
                                    </div>
                                </div><br>
                            @break
                            @case (4)
                                <div class="row text-center">
                                    <div class="col-md-10 offset-md-1">
                                        <h6><em>{{$item->valor}}</em></h6>
                                    </div>
                                </div>
                            @break
                            @case (5)
                                <div class="row text-center">
                                    <div class="col-md-8 offset-md-2">
                                            <img class="card-img-top" src="{{asset($item->valor)}}" />
                                    </div>
                                    
                                </div>
                            @break
                            @case (6)
                                <div class="row text-center">
                                    <div class="col-md-8 offset-md-2">
                                        <h6><em>{{$item->valor}}</em></h6>
                                    </div>
                                </div><br>
                            @break
                            @case (7)
                            <div class="row text-center">
                                <div class="col-md-8 offset-md-2">
                                    <h6><strong>{{$item->valor}}</strong></h6>
                                </div>
                            </div>
                            @break
                            @case (8)
                                <div class="row text-center">
                                    <div class="col-md-10 offset-md-1">
                                        <pre><code class="language-{{$lenguaje}}">{{$item->valor}}</code></pre>
                                    
                                    </div>
                                </div>
                            @break
                            @case (9)
                                <div class="row text-center">
                                    <div class="col-md-8 offset-md-2">
                                        <h6><em>{{$item->valor}}</em></h6>
                                    </div>
                                </div><br>
                            @break
                            @case(10)
                                <div class="row text-center">
                                    <div class="col-md-8 offset-md-2">
                                        <h6><strong>{{$item->valor}}</strong></h6>
                                    </div>
                                </div>
                            @break
                            @case(11)
                            <div class="row text-center">
                                <div class="col-md-8 offset-md-2">
                                    <a href="{{$item->valor}}" target="_blank" class="btn btn-link">{{$item->valor}}</a>
                                </div>
                            </div>
                            @break
                            @case (13)<!--tabla-->
                                <br><div class="row text-justify">
                                    <div class="col-md-10 offset-md-1">
                                        <div class="card  border-warning mb-3">
                                            @if($tablas->isEmpty())
                                                <div class="card-body text-center">
                                                    <label for="">No hay tabla!!!</label>
                                                </div>
                                            @else
                                                <div class="card-header"><h4>Tabla de {{$tablas[0]['tipo']}}s</h4></div>
                                                <div class="card-body">
                                                    <div class="col-md-12">
                                                        <table class="table table-hover table-striped table-bordered table-light table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nombre</th>
                                                                    <th>Descripcion del elemento</th>
                                                                    <th>Codigo</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($tablas as $tabla)
                                                                    <tr>
                                                                        <td>{{$tabla->nombre}}</td>
                                                                        <td><p>{{$tabla->descripcion}}</p></td>
                                                                        <td><pre><code class="language-{{$lenguaje}}">{{$tabla->codigo}}</code></pre></td>
                                                                    </tr>
                                                                @endforeach    
                                                            </tbody>
                                                            
                                                        </table>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div><br>
                            @break
                            @case (14)<!--practicas-->
                                <div class="row text-justify">
                                    <div class="col-md-10 offset-md-1">
                                        <div class="card  border-primary mb-3">
                                        @if($blog->practica == null)
                                            <div class="card-body text-center">
                                                <label for="">No hay practica</label>
                                            </div>
                                        @else
                                            <div class="card-header"><h4>Practica</h4></div>
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <div class="row text-center"><h5>{{@$blog->practica->nombre}}</h5></div>
                                                    <br><div class="row text-justify">
                                                        <p>{{@$blog->practica->descripcion}}</p>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <pre><code class="language-{{$lenguaje}}">{{@$blog->practica->codigo}}</code></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        </div>

                                    </div>
                                </div><br>
                            @break
                        @endswitch
                        
                    @endforeach
                    <br>
                    <div class="form-group">
                        <div class="card border-success">
                            <div class="card-header">Referencias</div>
                            <div class="card-body text-center">
                                @if($referencias->isEmpty())
                                    <label for="">No hay referencias!!!</label>
                                @else
                                    @foreach($referencias as $k=>$referencia)
                                        <div class="row text-center">
                                            <div class="col-md-3">{{$k + 1}}</div>
                                            <label class="col-md-9" for="">{{$referencia->nombre}}</label>
                                        </div>
                                        
                                    @endforeach
                                @endif
                                <br><hr>
                                <div class="form-group row">
                                    <label class="col-md-3" for="">Autor</label>
                                    <label for="" class="col-md-9">{{@$blog->autor}}</label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="">Fecha</label>
                                    <label for="" class="col-md-9">{{@$blog->fercha}}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>