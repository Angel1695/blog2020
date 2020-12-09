@extends('masteradmin')
@section('Titulo','Crear  Lenguaje')



 @section('contenidoadmin')
	<div class="container text-center" style="text-align:center;font-family:Sulphur Point;color:black;">
		<h1><b>Crear Lenguaje</b></h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::open(['route' => ['lenguajes.store'],'enctype'=>'multipart/form-data']) !!}
			<div class="form-group">
				{!! Form::text('nombre', null, array(
						'class'=>'form-control',
						'placeholder'=>'Nombre...'
					)) 
				!!}
			</div>
			<div class="form-group">
				{!! Form::textarea('descripcion', null, array(
						'class'=>'ckeditor form-control',
						'required'=>'required',
						'required pattern'=> '[A-Za-záéíóúÁÉÍÓÚ\s.,]+',
                      'title'=>'Solo  se Aceptan letras.',
						'placeholder'=>'Descripcion...'
					)) 
				!!}
			</div>
			
			{!! Form::submit('Guardar Lenguaje', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 