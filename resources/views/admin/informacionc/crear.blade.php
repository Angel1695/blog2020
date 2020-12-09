@extends('masteradmin')
@section('Titulo','Crear Informacion')



 @section('contenidoadmin')
	<div class="container text-center" style="text-align:center;font-family:Sulphur Point;color:black;">
		<h1><b>Crear Informacion</b></h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::open(['route' =>'informaciones.store', 'enctype'=>'multipart/form-data']) !!}
        <div class="text-center">
                  {!! Form::text('nombre', null, array(
                    'type'=>'text',
                    'class'=>'form-control',
                    'required'=>'required',
                    'placeholder'=>'Nombre...'                 
                  	)) 
                	!!}
                  <br>         
        <div class="form-group"> 
      			{!! Form::text('descripcion', null, array(
          		'rows'=>'3',
          		'class'=>'form-control',
          		'required'=>'required',
              'placeholder'=>'descripcion...' 
        		)) 
      			!!}
         </div> 
      <div>
        <strong><h6>Archivo de Imagen</h6></strong>
        <div class="form-group">
            <input type="file" class="form-control-file" name="archivo">
        </div>
                    
      </div>
      <div class="form-group">
      			{!! Form::text('mision', null, array(
          		'rows'=>'3',
          		'class'=>'form-control',
          		'required'=>'required',
              'placeholder'=>'descripcion...' 
        		)) 
      			!!}
         </div>
        <div class="form-group">
      			{!! Form::text('vision', null, array(
          		'rows'=>'3',
          		'class'=>'form-control',
          		'required'=>'required',
              'placeholder'=>'Vision...' 
        		)) 
      			!!}
         </div>
         <div class="form-group">
      			{!! Form::text('frase', null, array(
          		'rows'=>'3',
          		'class'=>'form-control',
          		'required'=>'required',
              'placeholder'=>'frase...' 
        		)) 
      			!!}
         </div>
      
      {!! Form::submit('Guardar', array('class'=>'btn btn-success'))!!}
      {!! Form::close() !!}

    </div>
	</div>
@endsection 