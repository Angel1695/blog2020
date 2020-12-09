@extends('masteradmin')
@section('Titulo','Crear Blogs')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>Crear Blogs</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::open(['route' => ['blogs.store'],'enctype'=>'multipart/form-data']) !!}
			<div class="form-group">
				 <strong><h5>Capitulo</h5></strong>
				<select name="capitulos" class="form-control" required>
                  <option value="">Seleccione una opción</option>
                  @foreach ($capitulos as $capitulo => $value)
                  <option value="{{ $capitulo }}"> {{ $value }}</option>   
                  @endforeach
              </select>
			</div>
			<div class="form-group">
				 <strong><h5>Practica</h5></strong>
				<select name="practicas" class="form-control" required>
                  <option value="">Seleccione una opción</option>
                  @foreach ($practicas as $practica => $value)
                  <option value="{{ $practica }}"> {{ $value }}</option>   
                  @endforeach
              </select>
			</div>
			<div class="form-group">
				 <strong><h5>Referencias</h5></strong>
				<select name="referencias" class="form-control" required>
                  <option value="">Seleccione una opción</option>
                  @foreach ($referencias as $referencia => $value)
                  <option value="{{ $referencia }}"> {{ $value }}</option>   
                  @endforeach
              </select>
			</div>


			<div class="form-group">
				{!! Form::text('titular', null, array(
						'class'=>'form-control',
						'required'=>'required',
						'placeholder'=>'Titular...'
					)) 
				!!}
			</div>
			<div class="form-group">
				{!! Form::text('autor', null, array(
						'class'=>'form-control',
						'required'=>'required',
						'placeholder'=>'Autor...'
					)) 
				!!}
			</div>
			<div class="form-group">
				{!! Form::text('fercha', null, array(
						'class'=>'form-control',
						'required'=>'required',
						'placeholder'=>'fecha...'
					)) 
				!!}
			</div>
			
			{!! Form::submit('Guardar Blog', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 