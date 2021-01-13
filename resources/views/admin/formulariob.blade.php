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
							<div class="col-md-10 offset-md-1">
								{!! Form::text('titulo_'.$key, null, array(
								'class'=>'form-control',
								'placeholder'=>'Titulo...'
								))
								!!}
							</div>
						</div><br>
					@break
					@case(2)
						<div class="form-group row">
							<div class="col-md-8 offset-md-2">
								{!! Form::text('subtitulo_'.$key, null, array(
								'class'=>'form-control',
								'placeholder'=>'Subtitulo...'
								))
								!!}
							</div>
						</div><br>
					@break
					@case(3)
						<div class="form-group row">
							<div class="col-md-10 offset-md-1">
								<textarea class="form-control" name="parrafo_{{$key}}" id="valor3" cols="80" rows="5" placeholder="Parrafo"></textarea>
							</div>
						</div><br>
					@break
					@case(4)
						<div class="form-group">
							<div class="col-md-8 offset-md-2">
								{!! Form::text('titulo_imagen_'.$key, null, array(
								'class'=>'form-control',
								'placeholder'=>'titulo de imagen...'
								))
								!!}
							</div>
						</div>
					@break
					@case(5)
						<div class="form-group">
							<label for="" class="col-md-5"><strong><h6>Archivo de Imagen</h6></strong>
							</label>
							<div class="col-md-8 offset-md-2">
								<!--<input type="file" class="form-control-file" name="imagen_{{$key}}">-->
								<input type="hidden" name="imagen_{{$key}}" value="imagen">
								<div id="imagen_{{$key}}" class="dropzone"></div>
							</div>
							
						</div>
					@break
					@case(6)
						<div class="form-group">
							<div class="col-md-8 offset-md-2">
								<textarea name="descripcion_imagen_{{$key}}"  class="form-control" id="valor3" cols="80" rows="4" placeholder="Descripción de la imagen"></textarea>
							</div>
						</div><br>
					@break
					@case(7)
						<div class="form-group">
							<div class="col-md-8 offset-md-2">
								{!! Form::text('titulo_codigo_'.$key, null, array(
								'class'=>'form-control',
								'placeholder'=>'titulo de codigo...'
								))
								!!}
							</div>
						</div>
					@break
					@case(8)
						<div class="form-group">
							<div class="col-md-10 offset-md-1">
								<textarea name="codigo_{{$key}}" id="" cols="80" rows="6" placeholder="codigo..." class="form-control"></textarea>
							</div>
							
						</div>
					@break
					@case(9)
						<div class="form-group">
							<div class="col-md-8 offset-md-2">
								<textarea name="descripcion_codigo_{{$key}}" id="" cols="60" rows="4" placeholder="descripcion del codigo..." class="form-control"></textarea>
							</div>
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
							<div class="card border-success">
									<div class="card-header">
										<div class="row">
											<div class="col"><strong>Genere su tabla</strong></div>
											Tipo
											<div class="col-md-3">
												<select class="form-control" name="tabla_{{$key}}[tipo]" id="">
													<option value="ejemplo" selected>Ejemplo</option>
													<option value="etiqueta">Etiqueta</option>
												</select>
											</div>
											<a href="" id="btn_newRow" class="btn btn-success">Agregar fila</a>
										</div>
									</div>
									<div class="card-body">
										<div class="form-group">
											<table class="table table-striped table-bordered table-hover">
												<thead>
													<tr class="table-success">
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
						<div class="form-group">
							<div class="card border-primary">
								<div class="card-header">
									<div class="row">
										<div class="col"><b>Datos de la practica</b></div>
									</div>
								</div>
								<div class="card-body">
									<div class="form-group row">
										<label for="" class="col-md-4">Nombre de la practica</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="practica_{{$key}}[nombre]" >
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-md-4">Descripcion de la practica</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="practica_{{$key}}[descripcion]">
											
										</div>
									</div>

									<div class="form-group row">
										<label for="" class="col-md-4">Codigo de la practica</label>
										<div class="col-md-8">
											<textarea class="form-control" name="practica_{{$key}}[codigo]" id="" cols="30" rows="3"></textarea>
										</div>
									</div>		
								</div>
							</div>
						</div>
					@break
				@endswitch
			@endforeach
			<hr><!------------------ apartado de referencias ----------------->
			<div class="form-group">
				<div class="card border-warning">
					<div class="card-header">
						<div class="row">
							<div class="col"><strong>Apartado de Referencias</strong></div>
							<div class="col-md-4 ml-auto"><a href="" id="btn_newRef" class="btn btn-sm btn-success">Nueva referencia</a></div>
						</div>
					</div>
					<div class="card-body" id="section_referencias">
						<div class="item_ref form-group row" id="0">
							<label for="" class="col-md-4">Nombre</label>
							<div class="col-md-8"><input type="text" class="form-control" required name="referencias[0][nombre]"></div>
						</div>
					</div>
				</div>
			</div>

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
		Dropzone.autoDiscover = false;
		$(document).ready(function(){
			var drops = document.getElementsByClassName('dropzone');
			//console.log(drops);
			var myDrop = new Array(drops.length);
			for(var i = 0; i < drops.length; i++){
				console.log(drops[i].getAttribute('id'));
				var nameId = drops[i].getAttribute('id');
				myDrop[i] = new Dropzone("#"+drops[i].getAttribute('id'), {
					url: '/subirimagen/'+drops[i].getAttribute('id'),
					headers:{
						"X-CSRF-TOKEN": "{{csrf_token()}}"
					},
					dictDefaultMessage: "Arrastra tus imagenes aqui ",
					paramName:"files"
					/*sending: function(file, xhr, formData){
						formData.append('id', nameId);
					}*/
				});
			}
				

			$('#btn_newRow').on('click', function(){
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
				$("#"+id).remove();
				return false;
			});

			$('#btn_newRef').on('click', function(){
				var elements = document.getElementsByClassName('item_ref');
				var id_new = parseInt(elements[elements.length - 1].getAttribute('id')) + 1;
				var  code = '<div class="item_ref form-group row" id="'+id_new+'"><label for="" class="col-md-4"> Otra referencia</label>'+
							'<div class="col-md-8"><input type="text" class="form-control" required name="referencias['+id_new+'][nombre]"></div></div>';
				$('#section_referencias').append(code);
				return false;
			});
		});
	</script>
@endsection