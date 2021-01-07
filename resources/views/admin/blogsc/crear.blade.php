@extends('masteradmin')
@section('Titulo','Crear Blogs')



 @section('contenidoadmin')
	<div class="container text-center">
		<h1>Crear Blogs</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::open(['route' => ['blogs.store'],'enctype'=>'multipart/form-data']) !!}
		<div class="form-group">
				 <strong><h5>Lenguaje</h5></strong>
				<select name="lenguaje" class="form-control" id="lenguajes_select" required>
                  <option value="">Seleccione una opción</option>
                  @foreach ($lenguajes as $lenguaje => $value)
                  <option value="{{ $lenguaje }}"> {{ $value }}</option>   
                  @endforeach
              </select>
			</div>
			
			<div class="form-group">
				<strong><h5>Capitulo</h5></strong>
				 <div id="capitulos_select">
					<select name="capitulos" class="form-control" required>
						<option value="">Seleccione una opción</option>
						@foreach ($capitulos as $capitulo => $value)
						<option value="{{ $capitulo }}"> {{ $value }}</option>   
						@endforeach
					</select>
				</div>
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
				{!! Form::date('fercha', null, array(
						'class'=>'form-control',
						'id'=>'example-date-input',
						'required'=>'required',
						'placeholder'=>'fecha...'
					)) 
				!!}
			</div>
			
			{!! Form::submit('Guardar Blog', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 
@section('script')
	<script>
		$(document).ready(function (){
			$(document).on('change','#lenguajes_select', function(e){
				var option = (this).value;
				$.ajax({
					url:'/getCapitulos/'+option,
					type:'get',
					success: function(e){
						console.log(e);
						var code  = '<select name="capitulos" class="form-control" required> '+
                  					'<option value="">Seleccione una opción</option>';
						for(var i = 0; i < e.length;i++ ){
							code += '<option value="'+e[i].id+'">'+e[i].nombre+'</option> ';
						}
                  		code += '</select>';
						$('#capitulos_select').empty().html(code);
					},
					error: function(x,m,e){

					},
				});
			});
		});
	</script>
@endsection