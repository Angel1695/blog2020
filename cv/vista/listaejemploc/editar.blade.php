@extends('masteradmin')
@section('Titulo','editar lista')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>Editar lista</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::model($listae, ['route' => ['listas.update', $listae->id],'method'=>'PUT']) !!}
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
                {!! Form::select('idmenu',$menus,null,['class' => 'form-control',
                  'placeholder'=>'Seleccione una opción',
                  'required'=>'required']) !!}
			</div>
			
			{!! Form::submit('Guardar lista', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 