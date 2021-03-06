<div class="container text-center">
    <div class="card">
        <div class="card-header">
            <strong>{{strtoupper($section)}}S</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5"><br>
                    @foreach($blogs as $blog)
                        @if($section != 'practicas')
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
                        @elseif($blog->practica != null)
                            <div class="col-md-12">
                                <div class="col-md-11"><strong>{{$blog->capitulo->nombre}}</strong></div>
                                <div class="row">
                                    <div class="col-md-12"><a href="{{url('/seccion/'.$section.'/'.$blog->practica->id)}}" class="btn btn-link">{{$blog->practica->nombre}}</a></div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <label for=""><h4>{{@$etiqueta->nombre}}</h4></label>
                                </div><br>
                                <div class="col-md-12 text-justify">
                                    <p>{{@$etiqueta->descripcion}}</p>
                                </div><br>
                                <div class="col-md-12">
                                    <pre><code class="language-{{$lenguaje}}">{{@$etiqueta->codigo}}</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div><br><br>
            
        </div>
    </div>
</div>