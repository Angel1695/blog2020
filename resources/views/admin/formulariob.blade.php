@extends('masteradmin')
@section('Titulo','Formulario Blog ')



@section('contenidoadmin')
<div class="container text-center" style="text-align:center;font-family:Sulphur Point;color:black;">
    
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
		<div class="card">
			<div class="card-header"><h3><b>Formulario Blog</b></h3></div>
			<div class="card-header">
			
        {!! Form::open(['route' => ['relaciones.store'],'enctype'=>'multipart/form-data']) !!}

			@foreach($componentes as $key => $componente)
				@switch($componente)
					@case(1)
						<div class="form-group row">
							<div class="col-md-8 offset-md-2">
								{!! Form::text('titulo_'.$key, null, array(
								'class'=>'form-control',
								'placeholder'=>'Titulo...'
								))
								!!}
							</div>
						</div>
					@break
					@case(2)
						<div class="form-group row">
							{!! Form::text('subtitulo_'.$key, null, array(
							'class'=>'form-control',
							'placeholder'=>'Subtitulo...'
							))
							!!}
						</div>
					@break
					@case(3)
						<div class="form-group row">
							<textarea name="parrafo_{{$key}}" id="valor3" cols="60" rows="5"></textarea>
						</div>
					@break
					@case(4)
						<div class="form-group">
							{!! Form::text('titulo_imagen_'.$key, null, array(
							'class'=>'form-control',
							'placeholder'=>'titulo de imagen...'
							))
							!!}
						</div>
					@break
					@case(5)
						<div class="form-group">
							<label for="" class="col-md-5"><strong><h6>Archivo de Imagen</h6></strong>
							</label>
							<div class="col-md-7"><input type="file" class="form-control-file" name="imagen_{{$key}}"></div>
						</div>
					@break
					@case(6)
						<div class="form-group">
							{!! Form::text('descripcion_imagen_'.$key, null, array(
							'class'=>'form-control',
							'placeholder'=>'descripcion de imagen...'
							))
							!!}
						</div>
					@break
					@case(7)
						<div class="form-group">
							{!! Form::text('titulo_codigo_'.$key, null, array(
							'class'=>'form-control',
							'placeholder'=>'titulo de codigo...'
							))
							!!}
						</div>
					@break
					@case(8)
						<div class="form-group">
							{!! Form::text('codigo_'.$key, null, array(
							'class'=>'form-control',
							'placeholder'=>'codigo...'
							))
							!!}
						</div>
					@break
					@case(9)
						<div class="form-group">
							{!! Form::text('descripcion_codigo_'.$key, null, array(
							'class'=>'form-control',
							'placeholder'=>'descripcion de codigo...'
							))
							!!}
						</div>
					@break
					@case(10)
						<div class="form-group">
							{!! Form::text('titulo_video_'.$key, null, array(
							'class'=>'form-control',
							'placeholder'=>'titulo de video...'
							))
							!!}
						</div>
					@break
					@case(11)
						<div>
							<strong>
								<h6>Archivo de Video</h6>
							</strong>
							<div class="form-group">
								<input type="file" class="form-control-file" name="video_{{$key}}">
							</div>
							@break
							
						</div>
					@case(12)
						<div class="form-group">
							{!! Form::text('decripcion_video_'.$key, null, array(
							'class'=>'form-control',
							'placeholder'=>'descrpcion de video...'
							))
							!!}
						</div>
					@break
					@case(13)
						<div class="form-group">
							<div class="card">
									<div class="card-header">
										<div class="row">
											<div class="col"><b>Genere su tabla</b></div>
											<a href="" id="btn_newRow" class="btn btn-info">Agregar fila</a>
										</div>
									</div>
									<div class="card-body">
										<div class="form-group">
											<table class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>nombre</th>
														<th>descripcion</th>
														<th>codigo</th>
														<th>Eliminar</th>
													</tr>
												</thead>
												<tbody id=tbody data-key="{{$key}}"> 
													<tr id= "0" class="row_table">
														<td><input type="text" name="tabla_{{$key}}[0][nombre]" placeholder="nombre"></td>
														<td><input type="text" name="tabla_{{$key}}[0][descripcion]" placeholder="descripcion"></td>
														<td><textarea name="tabla_{{$key}}[0][codigo]" id="" cols="20" rows="3"></textarea></td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>		
									</div>
							</div>
						</div>
						
					@break
					@case(14)
					@break
				@endswitch
			@endforeach

        	{!! Form::submit('Guardar Tabla', array('class'=>'btn btn-primary'))!!}
        {!! Form::close() !!}
			</div>
		</div>
    </div>
</div>
</div>
@endsection
@section('script')
	<script>
		$(document).ready(function(){
			$('#btn_newRow').on('click', function(){
				var table = document.getElementById('tbody');
				var tr = document.getElementsByClassName('row_table');
				var key = $('tbody').data('key');
				var id_new = parseInt(tr[tr.length - 1].getAttribute('id')) + 1;
				var code = '<tr id= "'+id_new+'" class="row_table">'+
							'<td><input type="text" name="tabla_'+key+'['+id_new+'][nombre]" placeholder="nombre"></td>'+
							'<td><input type="text" name="tabla_'+key+'['+id_new+'][descripcion]" placeholder="descripcion"></td>'+
							'<td><textarea name="tabla_'+key+'['+id_new+'][codigo]" id="" cols="20" rows="3"></textarea></td>'+
							'<td><a href="" class="btn_deleteRow btn btn-danger" data-id="'+id_new+'"><i class="fa fa-trash-o"></i></a></td>'+
							'</tr>';
				$('#tbody').append(code);

				return false;
			});

			$('#tbody').on('click', '.btn_deleteRow', function(){
				var id = $(this).data('id');
				console.log(id);
				$("#"+id).remove();
				return false;
			});
		});
	</script>
@endsection