@extends('masteradmin')
@section('Titulo','Crear Capitulo')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>Crear Capitulo</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::open(['route' => ['capitulos.store'],'enctype'=>'multipart/form-data']) !!}
			<div class="form-group">
				{!! Form::text('nombre', null, array(
						'class'=>'form-control',
						'required'=>'required',
						'placeholder'=>'Nombre...'
					)) 
				!!}
			</div>
			<div class="form-group">
				 <strong><h5>Lenguaje</h5></strong>
				<select name="lenguaje" class="form-control" required>
                  <option value="">Seleccione una opción</option>
                  @foreach ($lenguajes as $lenguaje => $value)
                  <option value="{{ $lenguaje }}"> {{ $value }}</option>   
                  @endforeach
              </select>
			</div>
			
			{!! Form::submit('Guardar Capitulo', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 