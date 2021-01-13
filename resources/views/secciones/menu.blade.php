<div   style="background-color: rgb(241, 196, 15);" class="navbar  justify-content-between">
    <!-- Brand/logo -->
    <div>
        <a class="navbar-brand" href="/">
            <img src="{{ asset("archivos/h3.png") }}" alt="logo" style="width:150px;">
        </a>
    </div>
<!--
    <div style="margin:0px;">
        <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #FFD700">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true" style="text-align:center;font-family:Sulphur Point;color:black;">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false"
                    style="text-align:center;font-family:Sulphur Point;color:black;">Servicios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="/homenosotros" role="tab"
                    aria-controls="contact" aria-selected="false"
                    style="text-align:center;font-family:Sulphur Point;color:black;">Nosotros</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">###</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">****</div>
        </div>
    </div>


</div>-->




<nav class="navbar navbar-expand-lg navbar-light " style="background: rgb(241, 196, 15,0.5);">

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background: rgb(241, 196, 15);">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/" style="text-align:center;font-family:Sulphur Point;color:black;">Inicio<span
                        class="sr-only">(current)</span></a>
            </li>
            @foreach($lenguajes as $lenguaje)
                <li class="nav-item dropdown" style="text-align:center;font-family:Sulphur Point;color:black;font-weight: bold">
                    <a class="nav-link dropdown-toggle" href=""  role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">{{$lenguaje->nombre}}</a>

                    <div class="dropdown-menu" >
                        @foreach($lenguaje->capitulos as $capitulo)
                        <a class="dropdown-item" href="{{url('/apartado/capitulos/'.$lenguaje->id.'/'.$capitulo->id)}}"
                            style="text-align:center;font-family:Sulphur Point;color:black;">{{$capitulo->nombre}}</a>
                        @endforeach
                    </div>
                </li>
            @endforeach
            <li class="nav-item" style="text-align:center;font-family:Sulphur Point;color:black;">
                <a class="nav-link" href="{{url('/seccion/ejemplo')}}">Ejemplos<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item" style="text-align:center;font-family:Sulphur Point;color:black;">
                <a class="nav-link" href="{{url('/seccion/etiqueta')}}">Etiquetas<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            @else
            <li class="nav-item dropdown"  style="text-align:center;font-family:Sulphur Point;color:black;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                    aria-haspopup="true" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li  style="text-align:center;font-family:Sulphur Point;color:black;">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            @endguest
        </ul>
    </div>
</nav>



</div>