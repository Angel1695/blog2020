@extends('masteradmin')
@section('Titulo','Formulario Blog ')



 @section('contenidoadmin')
<div class="container text-center" style="text-align:center;font-family:Sulphur Point;color:black;"><h1><b>Formulario Blog</b></h1>
<div class="container text-center">

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		

		{!! Form::open(['route' => ['relaciones.store'],'enctype'=>'multipart/form-data']) !!}

		@foreach($componentes as $componente)

        @switch($componente)
		

    	@case(1)
        	<div class="form-group">
        		{!! Form::text('valor1', null, array(
						'class'=>'form-control',
						'placeholder'=>'Titulo...'
					)) 
				!!}
        	</div>
        	@break
   	 	@case(2)
        	<div class="form-group">
        		{!! Form::text('valor2', null, array(
						'class'=>'form-control',
						'placeholder'=>'Subtitulo...'
					)) 
				!!}
        	</div>
        	@break
        @case(3)
        	<div class="form-group">
        		{!! Form::text('valor3', null, array(
						'class'=>'form-control',
						'placeholder'=>'Parrafo...'
					)) 
				!!}
        	</div>
        	@break
        @case(4)
        	<div class="form-group">
        		{!! Form::text('valor4', null, array(
						'class'=>'form-control',
						'placeholder'=>'titulo de imagen...'
					)) 
				!!}
        	</div>
        	@break
        @case(5)
        	<div>
        <strong><h6>Archivo de Imagen</h6></strong>
        <div class="form-group">
            <input type="file" class="form-control-file" name="valor5">
        </div>
                    
      </div>
        	@break
        @case(6)
        	<div class="form-group">
        		{!! Form::text('valor6', null, array(
						'class'=>'form-control',
						'placeholder'=>'descrpcion de imagen...'
					)) 
				!!}
        	</div>
        	@break
        @case(7)
        	<div class="form-group">
        		{!! Form::text('valor7', null, array(
						'class'=>'form-control',
						'placeholder'=>'titulo de codigo...'
					)) 
				!!}
        	</div>
        	@break
        @case(8)
        	<div class="form-group">
        		{!! Form::text('valor8', null, array(
						'class'=>'form-control',
						'placeholder'=>'codigo...'
					)) 
				!!}
        	</div>
        	@break
        @case(9)
        	<div class="form-group">
        		{!! Form::text('valor9', null, array(
						'class'=>'form-control',
						'placeholder'=>'descripcion de codigo...'
					)) 
				!!}
        	</div>
        	@break
        @case(10)
        	<div class="form-group">
        		{!! Form::text('valor10', null, array(
						'class'=>'form-control',
						'placeholder'=>'titulo de video...'
					)) 
				!!}
        	</div>
        	@break
        @case(11)
        <div>
        <strong><h6>Archivo de Video</h6></strong>
        <div class="form-group">
            <input type="file" class="form-control-file" name="valor11">
        </div>
        	@break
        @case(12)      	                    
      </div>
        	<div class="form-group">
        		{!! Form::text('valor12', null, array(
						'class'=>'form-control',
						'placeholder'=>'descrpcion de video...'
					)) 
				!!}
        	</div>
        	@break										
		@endswitch

        @endforeach	
        <div class="form-group">
				 <strong><h5>Blog</h5></strong>
				<select name="blogs" class="form-control" required>
                  <option value="">Seleccione una opción</option>
                  @foreach ($blogs as $blog => $value)
                  <option value="{{ $blog }}"> {{ $value }}</option>   
                  @endforeach
              </select>
			</div>

        {!! Form::submit('Guardar Tabla', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
	 			

	 	 </div>
	</div>
</div>
@endsection	 				
	 				

			