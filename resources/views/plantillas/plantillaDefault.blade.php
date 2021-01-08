
<div class="container">
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
                                <object class="card-img-top" data="{{asset($item->valor)}}" type="image/png">
                                    <img class="card-img-top" src="{{asset('archivos/h3.png')}}" />
                                </object>
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
                    @case (13)<!--tabla-->
                        <br><div class="row text-justify">
                            <div class="col-md-10 offset-md-1">
                                <div class="card  border-warning mb-3">
                                    <div class="card-header"><h4>Tabla de {{$tablas[0]['tipo']}}s</h4></div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <table class="table table-hover table-striped table-bordered table-light">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Descripcion</th>
                                                        <th>Codigo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($tablas as $tabla)
                                                        <tr>
                                                            <td>{{$tabla->nombre}}</td>
                                                            <td><small>{{$tabla->descripcion}}</small></td>
                                                            <td><pre><code class="language-{{$lenguaje}}">{{$tabla->codigo}}</code></pre></td>
                                                        </tr>
                                                    @endforeach    
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                    @break
                    @case (14)<!--practicas-->
                        <div class="row text-justify">
                            <div class="col-md-10 offset-md-1">
                                <div class="card  border-primary mb-3">
                                <div class="card-header"><h4>Practica</h4></div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row text-center"><h5>{{$blog->practica->nombre}}</h5></div>
                                        <br><div class="row text-justify">
                                            <p>{{$blog->practica->descripcion}}</p>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <pre><code class="language-{{$lenguaje}}">{{$blog->practica->codigo}}</code></pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </div><br>
                    @break
                @endswitch
                
            @endforeach
        </div>
    </div>
</div>