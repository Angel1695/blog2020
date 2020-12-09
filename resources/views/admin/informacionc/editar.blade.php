@extends('masteradmin')
@section('Titulo','Editar Menu')



 @section('contenidoadmin')
	<div class="container text-center" style="text-align:center;font-family:Sulphur Point;color:black;">
		<h1><b>Editar Informacion</b></h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::model($info, ['route' => ['informaciones.update', $info->id],'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
        <div class="form-group">           
                  {!! Form::text('nombre', null, array(
                    'type'=>'text',
                    'class'=>'form-control',
                    'required'=>'required'
                    )) 
                    !!}
                  <br>
        <div class="form-group">              
      			{!! Form::textarea('descripcion', null, array(
      			    'rows'=>'3',
      			    'class'=>'form-control',
      			    'required'=>'required',
      			    'placeholder'=>'Nombre...'
      			  )) 
      			!!}
         </div>
        <div>
        		<strong><h5>Archivo de Imagen</h5></strong>
        		<hr>
        		<div class="form-group">
         		   <input type="file" class="form-control-file" name="archivo">
         </div>
                    
      </div>
      <div class="form-group">              
      			{!! Form::text('mision', null, array(
      			    'rows'=>'3',
      			    'class'=>'form-control',
      			    'required'=>'required',
      			    'placeholder'=>'Nombre...'
      			  )) 
      			!!}
         </div>
         <div class="form-group">              
      			{!! Form::text('vision', null, array(
      			    'rows'=>'3',
      			    'class'=>'form-control',
      			    'required'=>'required',
      			    'placeholder'=>'Nombre...'
      			  )) 
      			!!}
         </div>
         <div class="form-group">              
      			{!! Form::text('frase', null, array(
      			    'rows'=>'3',
      			    'class'=>'form-control',
      			    'required'=>'required',
      			    'placeholder'=>'Nombre...'
      			  )) 
      			!!}
         </div>
      
      {!! Form::submit('Guardar', array('class'=>'btn btn-success'))!!}
      {!! Form::close() !!}
      <a href="{{ route('informaciones.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Atrás</a> 
    </div>
	</div>
@endsection 