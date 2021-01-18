<nav id="sidebar">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="p-4">
        <h1><a href="index.html" class="logo">Lenguajes <span>Seleccione sus lenguajes</span></a></h1>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="#"><span class="fa fa-home mr-3"></span> Home</a>
            </li>
            @foreach($lenguajes as $item)
            <li>
                <a href="#{{trim(str_ireplace(' ','_',$item['nombre']))}}" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle"><span class="fa fa-user mr-3"></span> {{$item['nombre']}}</a>
                <ul class="collapse list-unstyled" id="{{trim(str_ireplace(' ','_',$item['nombre']))}}">
                    @foreach($item['capitulos'] as $capitulo)
                        <li>
                            <a href="{{url('/apartado/capitulos/'.$item['id'].'/'.$capitulo['id'])}}">{{$capitulo['nombre']}}</a>
                        </li>
                    @endforeach
                    
                </ul>
            </li>
            @endforeach
        </ul>

        

        <div class="footer">
            <!--<p>
                 Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. 
                Copyright &copy;
                <script>
                document.write(new Date().getFullYear());
                </script> All rights reserved | This template
                is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                    target="_blank">Colorlib.com</a>
                 Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
            </p>-->
        </div>

    </div>
</nav>
