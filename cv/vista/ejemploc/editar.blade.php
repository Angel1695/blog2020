@extends('masteradmin')
@section('Titulo','Crear Menu')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>Editar Submenu</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::model($ejemploe, ['route' => ['ejemplos.update', $ejemploe->id],'method'=>'PUT']) !!}
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
				{!! Form::text('ejemplo', null, array(
						'class'=>'form-control',
						'required'=>'required',
						'placeholder'=>'Ejemplo...'
					)) 
				!!}
			</div>
			<div class="form-group">
				<strong><h5>Lista de Ejemplos</h5></strong>
                {!! Form::select('idlista',$listaejemplos,null,['class' => 'form-control',
                  'placeholder'=>'Seleccione una opción',
                  'required'=>'required']) !!}
			</div>
			
			{!! Form::submit('Guardar Submenu', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 