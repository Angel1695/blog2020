@extends('masteradmin')
@section('Titulo','Crear Referencias')



 @section('contenidoadmin')
	<div class="container text-center" style="text-align:center;font-family:Sulphur Point;color:black;">
		<h1><b>Crear Referencias</b></h1>

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
				{!! Form::text('nombre', null, array(
						'class'=>'form-control',
						'placeholder'=>'Nombre...'
					)) 
				!!}
			</div>			
			{!! Form::submit('Guardar Referencia', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 