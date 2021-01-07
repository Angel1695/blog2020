<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <title>Tu Lenguaje @yield('Titulo')</title>
    <!-- bostrap -->
    <link rel="stylesheet" href="{{asset('css/estilo_css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/prism/prism.css')}}">
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



    <!-- fin bostrap  -->
</head>
<header>
    @include('admin.menuadmin')
</header>

<body>
    <center>
        <h1>Administrador</h1>
    </center>
    @if(\Session::has('mensaje'))
    @include('secciones.mensajes')
    @endif


    @yield('contenidoadmin')

    @yield('script')

    <!-- jquery -->

    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/filesJS/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/prism/prism.js')}}"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
   

    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>

   
    
</body>


<footer>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- estilo css  -->
    <link rel="stylesheet" type="text/css" href="css/estilofooter.css">
    <!-- fin estilo css   -->


    <!-- finjqueri -->
    @include('secciones.foother')
</footer>

</html>
