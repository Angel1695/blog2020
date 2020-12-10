<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <title>Tu Lenguaje @yield('Titulo')</title>
    <!-- bostrap -->


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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


</body>


<footer>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- estilo css  -->
    <link rel="stylesheet" type="text/css" href="css/estilofooter.css">
    <!-- fin estilo css   -->


    <!-- jquery -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>

    <!-- finjqueri -->
    @include('secciones.foother')
</footer>

</html>