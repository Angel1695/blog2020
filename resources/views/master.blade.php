<!DOCTYPE html>
<html>

<head>
    <title>Tu Lenguaje @yield('Titulo')</title>
    <link rel="stylesheet" href="{{asset('css/estilo_css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/prism/prism.css')}}">
    <link rel="stylesheet" href="{{asset('dropzone/min/dropzone.min.css')}}">
  <!--   <link rel="stylesheet" href="{{asset('css/style.css')}}"> -->
  <link rel="stylesheet" href="{{asset('css/estiloJA.css')}}">
</head>

<body>
    @include('secciones.menu')
     
            @yield('contenidoc')
        
    
    <div class="wrapper d-flex align-item-stretch">
       <!--  @include('secciones.sidebar') -->
        <div id="content" class="p-4 p-md-5 pt-5">
            @yield('contenido')
		</div>
    </div>
    
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>

    
    <script src="{{asset('js/arriba.js')}}"></script>
    <script src="{{asset('js/filesJS/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/prism/prism.js')}}"></script>
    <script src="{{asset('dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
</body>
<footer>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- estilo css  -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilofooter.css')}}">

    <!-- fin estilo css   -->
    @include('secciones.foother')

</footer>

</html>