@extends('masteradmin')
@section('Titulo','Crear Referencia')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>Crear Referencia</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::open(['route' => ['referencias.store'],'enctype'=>'multipart/form-data']) !!}
			<div class="form-group">
				 <strong><h5>Componentes</h5></strong>
				<select name="componentes" class="form-control" required>
                  <option value="">Seleccione una opción</option>
                  @foreach ($componentes as $componente => $value)
                  <option value="{{ $componente }}"> {{ $value }}</option>   
                  @endforeach
              </select>
			</div>
			<div class="form-group">
				 <strong><h5>Blog</h5></strong>
				<select name="blogs" class="form-control" required>
                  <option value="">Seleccione una opción</option>
                  @foreach ($blogs as $blog => $value)
                  <option value="{{ $blog }}"> {{ $value }}</option>   
                  @endforeach
              </select>
		
			<div class="form-group">
				{!! Form::text('valor', null, array(
						'class'=>'form-control',
						'required'=>'required',
						'placeholder'=>'Valor...'
					)) 
				!!}
			</div>
			
			{!! Form::submit('Guardar Blog', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 