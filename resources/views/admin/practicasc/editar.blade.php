@extends('masteradmin')
@section('Titulo','Editar Practica')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>Editar Practica</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::model($practicae, ['route' => ['practicas.update', $practicae->id],'method'=>'PUT']) !!}
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
						'placeholder'=>'codigo...'
					)) 
				!!}
			</div>
			{!! Form::submit('Guardar Practica', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 