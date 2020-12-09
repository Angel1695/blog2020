@extends('masteradmin')
@section('Titulo','Editar Capitulo')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>Editar Capitulo</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::model($capituloe, ['route' => ['capitulos.update', $capituloe->id],'method'=>'PUT']) !!}
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
                {!! Form::select('idlenguajes',$lenguajee,null,['class' => 'form-control',
                  'placeholder'=>'Seleccione una opción',
                  'required'=>'required']) !!}
			</div>
			
			{!! Form::submit('Guardar Capitulo', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 