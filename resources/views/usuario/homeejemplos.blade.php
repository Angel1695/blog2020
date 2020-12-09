@extends('master')
@section('Titulo','vista Ejemplos')


@section('contenido')
<div class="container">
	<h1 style="text-align:center;font-family:century gothic;color:black;" >Ejemplos</h1>
	<br>
 
</div>

<div class="container text-center">
<ul class="list-group">
 
@foreach($listaejemplos as $listav)
  <a class="dropdown-item" href="#" style="text-align:center;font-family:Sulphur Point;color:black;"><?=$listav['nombre'] ?></a>
   @endforeach
  
</ul>

</div>
 	
@endsection 
