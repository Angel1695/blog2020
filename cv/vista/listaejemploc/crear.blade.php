@extends('masteradmin')
@section('Titulo','Crear Submenu')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>Crear Lista</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::open(['route' => ['listas.store'],'enctype'=>'multipart/form-data']) !!}
			<div class="form-group">
				{!! Form::text('nombre', null, array(
						'class'=>'form-control',
						'required'=>'required',
						'placeholder'=>'Nombre...'
					)) 
				!!}
			</div>
			<div class="form-group">
				 <strong><h5>Menu</h5></strong>
				<select name="menu" class="form-control" required>
                  <option value="">Seleccione una opción</option>
                  @foreach ($listas as $menu => $value)
                  <option value="{{ $menu }}"> {{ $value }}</option>   
                  @endforeach
              </select>
			</div>
			
			{!! Form::submit('Guardar Lista', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 