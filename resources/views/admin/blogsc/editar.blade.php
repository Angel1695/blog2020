@extends('masteradmin')
@section('Titulo','Editar Blog')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>Editar Blog</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::model($bloge, ['route' => ['blogs.update', $bloge->id],'method'=>'PUT']) !!}
		<div class="form-group">
				<strong><h5>Lenguaje</h5></strong>
                {!! Form::select('idlenguajes',$lenguajee,null,['class' => 'form-control',
                  'placeholder'=>'Seleccione una opción',
                  'required'=>'required']) !!}
			</div>
			
			<div class="form-group">
				<strong><h5>Capitulo</h5></strong>
                {!! Form::select('idcapitulos',$capituloe,null,['class' => 'form-control',
                  'placeholder'=>'Seleccione una opción',
                  'required'=>'required']) !!}
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
						'placeholder'=>'Fecha...'
					)) 
				!!}
			</div>
			
			{!! Form::submit('Guardar Blog', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 