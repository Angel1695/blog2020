@extends('masteradmin')
@section('Titulo','Editar Referencia')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>Editar Referencia</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::model($referenciae, ['route' => ['referencia.update', $referenciae->id],'method'=>'PUT']) !!}
			
			<div class="form-group">
				<strong><h5>Componente</h5></strong>
                {!! Form::select('idcomponente',$componentee,null,['class' => 'form-control',
                  'placeholder'=>'Seleccione una opción',
                  'required'=>'required']) !!}
			</div>
			<div class="form-group">
				<strong><h5>Blogs</h5></strong>
                {!! Form::select('idblog,$bloge,null,['class' => 'form-control',
                  'placeholder'=>'Seleccione una opción',
                  'required'=>'required']) !!}
			</div>
			<div class="form-group">
				{!! Form::text('valor', null, array(
						'class'=>'form-control',
						'required'=>'required',
						'placeholder'=>'valor...'
					)) 
				!!}
			</div>
			
			{!! Form::submit('Guardar Referencia', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 