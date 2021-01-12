<h2 style="text-align:center;font-family:Pacifico;color:black;">Tus Lenguaje</h2>
<h2 style="text-align:center;font-family:Sacramento;color:black;">Escoge tu lenguaje favorito y comienza a
    programar, Suerte:)</h2>


<div class="main-footer widgets-dark typo-light">
    <div class="container">
        <div class="row">

            @foreach ($lenguajes as $hijo)
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="widget subscribe no-box" style="background: rgb(0, 0, 128);border-radius:">
                    <br>
                        <h2 class="card-title" style="text-align:center;font-family:Sulphur Point;color:rgb(242, 243, 244);">
                       
                            {{@$hijo['nombre']}} 
                        </h2>
                    <p style="text-align:center;font-family:Sulphur Point;color:rgb(242, 243, 244);">
                        <pre>{{@$hijo['descripcion']}}</pre>
                    </p>
                    <center><a href="{{url('/apartado/capitulos/'.$hijo->id)}}" class="btn btn-info">Ver</a></center>
                    <br>
                </div>
            </div>
           @endforeach
        </div>
    </div>
</div>