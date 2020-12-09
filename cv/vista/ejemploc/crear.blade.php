@extends('masteradmin')
@section('Titulo','Crear Ejemplo')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>Crear Ejemplo</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::open(['route' => ['ejemplos.store'],'enctype'=>'multipart/form-data']) !!}
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
				{!! Form::textarea('ejemplo', null, array(
						'class'=>'form-control',
						'required'=>'required',
						'placeholder'=>'Ejemplo...'
					)) 
				!!}
			</div>

<!--este es un comentario-->

			<div class="form-group">
				 <strong><h5>Lista ejemplo</h5></strong>
				<select name="lista" class="form-control" required>
                  <option value="">Seleccione una opción</option>
                  @foreach ($listaejemplos as $menu => $value)
                  <option value="{{ $menu }}"> {{ $value }}</option>   
                  @endforeach
              </select>
			</div>
			
			{!! Form::submit('Guardar Ejemplo', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 