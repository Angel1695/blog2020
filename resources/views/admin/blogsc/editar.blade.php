@extends('masteradmin')
@section('Titulo','Editar Blog')



@section('contenidoadmin')
	<div class="container text-center">
		<!--<h1>Editar Blog</h1>

		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif-->
		
			
			{!! Form::model($blog, ['route' => ['blogs.update', $blog->id],'method'=>'PUT']) !!}
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-6">
						<div class="card"><!--datos del blog en general-->
							<div class="card-header">
								<h4>Datos principales</h4>
							</div>
							<div class="card-body">
									<div class="form-group row">
										<label for="" class="col-md-4">Titular</label>
										<div class="col-md-8">
											<input type="text" name="blog[titular]" value="{{$blog->titular}}" id="" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-md-4">Titular</label>
										<div class="col-md-8">
											<select name="blog[idcapitulos]" id="" class="form-control">
												@foreach($capitulos as $capitulo)
													<option value="{{$capitulo->id}}" selected="{{($capitulo->id == $blog->idcapitulos) ? true : false}}">{{$capitulo->nombre}}</option>	
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-md-4">Autor</label>
										<div class="col-md-8">
											<input type="text" name="blog[autor]" value="{{$blog->autor}}" id="" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-md-4">Fecha de creación</label>
										<div class="col-md-8">
											<input type="text" name="blog[fercha]" value="{{$blog->fercha}}" id="" class="form-control">
										</div>
									</div>
								
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								Datos de practica
							</div>
							<div class="card-body">
								@if($blog->practica == null)
									<h3>No hay practica</h3>
								@else
									<div class="form-group row">
										<label for="" class="col-md-4">Nombre</label>
										<div class="col-md-8">
											<input type="text" name="practica[nombre]" value="{{$blog->capitulo->nombre}}" id="" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-md-4">Descripcion</label>
										<div class="col-md-8">
											<input type="text" id="" name="practica[descripcion]" value="{{$blog->capitulo->descripcion}}" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label for="" class="col-md-4">Codigo</label>
										<div class="col-md-8">
											<textarea name="practica[codigo]" id="" cols="30" rows="10" class="form-control">{{$blog->capitulo->codigo}}</textarea>
										</div>
									</div>
								@endif
							</div>
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<strong>Estructura del blog</strong>
							</div>
							<div class="card-body">
								@foreach($componentes as $item)
									@switch($item->idcomponente)
										@case(1)
											<div class="form-group row">
												<label for="" class="col-md-4">Titulo</label>
												<div class="col-md-8">
													<input type="text" name="componente[{{$item->id}}][valor]" class="form-control" value="{{$item->valor}}">
												</div>
											</div><br>
										@break
										@case(2)
											<div class="form-group row">
												<label for="" class="col-md-4">Subtitulo</label>
												<div class="col-md-8">
													<input type="text" name="componente[{{$item->id}}][valor]" class="form-control" value="{{$item->valor}}">
												</div>
											</div><br>
										@break
										@case(3)
											<div class="form-group row">
												<label for="" class="col-md-4">Parrafo</label>
												<div class="col-md-8">
													<textarea name="componente[{{$item->id}}][valor]" id="" cols="75" rows="7">{{$item->valor}}</textarea>
												</div>
											</div><br>
										@break
										@case(4)
											<div class="form-group row">
												<label for="" class="col-md-4">Titulo de la imagen</label>
												<div class="col-md-8">
													<input type="text" name="componente[{{$item->id}}][valor]" class="form-control" value="{{$item->valor}}">
												</div>
											</div><br>
										@break
										@case (5)
										<div class="form-group row">
											<div class="col-md-10 offset-md-1">
												<div class="card">
													<div class="card-header">
														<strong>Imagen</strong>
													</div>
													<div class="card-body">
														<div class="row">
															<div class="col-md-6">
																<label for="">Imagen anterior</label>
																<img src="{{asset($item->valor)}}" class="card-img-top" alt="">		
															</div>
															<div class="col-md-6">
																<label for="">Selecciona una nueva imagen</label>
																<input type="hidden" name="componente[{{$item->id}}][valor]" value="{{$item->valor}}">
																<div id="imagen_{{$item->id}}" class="dropzone"></div>
															</div>
														</div>
													</div>
												</div>		
											</div>
										</div><br>
										@break
										@case(6)
											<div class="form-group row">
												<label for="" class="col-md-4">Descripción de la imagen</label>
												<div class="col-md-8">
													<textarea name="componente[{{$item->id}}][valor]" id="" cols="75" rows="3">{{$item->valor}}</textarea>
												</div>
											</div><br>
										@break
										@case(7)
											<div class="form-group row">
												<label for="" class="col-md-4">Titulo de codigo</label>
												<div class="col-md-8">
													<input type="text" name="componente[{{$item->id}}][valor]" class="form-control" value="{{$item->valor}}">
												</div>
											</div><br>
										@break
										@case(8)
											<div class="form-group row">
												<label for="" class="col-md-4">Codigo</label>
												<div class="col-md-8">
													<textarea name="componente[{{$item->id}}][valor]" id="" cols="75" rows="10">{{$item->valor}}</textarea>
												</div>
											</div><br>
										@break
										@case (9)
											<div class="form-group row">
												<label for="" class="col-md-4">Descripción de codigo</label>
												<div class="col-md-8">
													<textarea name="componente[{{$item->id}}][valor]" id="" cols="75" rows="3">{{$item->valor}}</textarea>
												</div>
											</div><br>
										@break
										@case(13)
											<div class="form-group row">
												<div class="col-md-12">
													<div class="card border-success">
														<div class="card-header">
															Estructura de la tabla
														</div>
														<div class="card-body">
															<div class="form-group">
																<table class="table table-striped">
																	<thead>
																		<th>Nombre</th>
																		<th>Descripcion</th>
																		<th>Codigo</th>
																	</thead>
																	<tbody>
																		@foreach($tablas as $t)
																			<tr>
																				<td><input type="text" value="{{$t->nombre}}" name="table[{{$t->id}}][nombre]"></td>
																				<td><input type="text" value="{{$t->descripcion}}" name="table[{{$t->id}}][descripcion]"></td>
																				<td><textarea name="table[{{$t->id}}][codigo]" id="" cols="30" rows="5">{{$t->codigo}}</textarea></td>
																			</tr>
																		@endforeach
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div><br>
										@break
										@case(14)
										@break
									@endswitch
								@endforeach
							</div>
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<center>
									<button type="submit" class="btn btn-primary btn-lg btn-block" >Guardar cambios</button>
								</center>
							</div>
						</div>
					</div>
				</div>
			{!! Form::close() !!}


					
				
			
	</div><br>
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
		});
	</script>
@endsection