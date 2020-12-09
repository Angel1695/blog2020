@extends('masteradmin')
@section('Titulo','Crear Tabla')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>Crear Tabla</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::open(['route' => ['tablas.store'],'enctype'=>'multipart/form-data']) !!}
			<div class="form-group">
				 <strong><h5>Blog</h5></strong>
				<select name="blogs" class="form-control" required>
                  <option value="">Seleccione una opción</option>
                  @foreach ($blogs as $blog => $value)
                  <option value="{{ $blog }}"> {{ $value }}</option>   
                  @endforeach
              </select>
			</div>
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
			{!! Form::submit('Guardar Tabla', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 