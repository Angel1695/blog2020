@extends('masteradmin')
@section('Titulo','Crear Practica')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>Crear Practica</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::open(['route' => ['practicas.store'],'enctype'=>'multipart/form-data']) !!}
			<div class="form-group">
				{!! Form::text('nombre', null, array(
						'class'=>'form-control',
						'required'=>'required',
						'placeholder'=>'Nombre...'
					)) 
				!!}
			</div>
			<div class="form-group">
				{!! Form::text('descripcion', null, array(
						'class'=>'form-control',
						'required'=>'required',
						'placeholder'=>'Descripcion...'
					)) 
				!!}
			</div>
			<div class="form-group">
				{!! Form::textarea('codigo', null, array(
						'class'=>'form-control',
						'required'=>'required',
						'placeholder'=>'Codigo...'
					)) 
				!!}
			</div>
			{!! Form::submit('Guardar Practica', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 