@extends('masteradmin')
@section('Titulo','Editar Tabla')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>Editar Tabla</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::model($tablae, ['route' => ['tablas.update', $tablae->id],'method'=>'PUT']) !!}
		<div class="form-group">
				<strong><h5>Blog</h5></strong>
                {!! Form::select('idblog',$bloge,null,['class' => 'form-control',
                  'placeholder'=>'Seleccione una opción',
                  'required'=>'required']) !!}
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
						'placeholder'=>'codigo...'
					)) 
				!!}
			</div>
			{!! Form::submit('Guardar Tabla', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 