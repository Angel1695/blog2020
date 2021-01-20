@extends('master')
@section('Titulo','Bienvenido')

	@section('contenido')
	   @include('secciones.banner')
	@endsection

	@section('contenidoc')
	    @include('secciones.carrucel')
	    
	@endsection