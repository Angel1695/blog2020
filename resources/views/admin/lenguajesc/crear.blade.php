@extends('masteradmin')
@section('Titulo','Crear  Lenguaje')



 @section('contenidoadmin')
	<div class="container text-center" style="text-align:center;font-family:Sulphur Point;color:black;">
		<h1><b>Crear Lenguaje</b></h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif		

		{!! Form::open(['route' => ['lenguajes.store'],'enctype'=>'multipart/form-data']) !!}
			<div class="form-group">
				{!! Form::text('nombre', null, array(
						'class'=>'form-control',
						'placeholder'=>'Nombre...'
					)) 
				!!}
			</div>
			<div class="form-group">
				{!! Form::text('descripcion', null, array(
						'class'=>'form-control',
						'required'=>'required',
						'placeholder'=>'Descripcion...'
					)) 
				!!}
			</div>
			<div class="form-group">
					<select name="clave"  class="form-control">
						<option value="" disabled selected><em> Seleccione el tipo de sintaxis para su lenguaje</em></option>
						<option value="markup">Markup</option>
						<option value="html">HTML</option>
						<option value="css">CSS</option>
						<option value="javascript">JavaScript</option>
						<option value="arduino">Arduino</option>
						<option value="basic">Basic</option>
						<option value="c">C</option>
						<option value="csharp">C#</option>
						<option value="cpp">C++</option>
						<option value="dart">Dart</option>
						<option value="django">Django</option>
						<option value="git">Git</option>
						<option value="php">PHP</option>
						<option value="mongodb">MongoDB</option>
						<option value="matlab">MATLAB</option>
						<option value="kotlin">Kotlin</option>
						<option value="json">JSON</option>
						<option value="java">Java</option>
						<option value="py">Python</option>
						<option value="ruby">Ruby</option>
						<option value="sql">SQL</option>
						<option value="typescript">Typescript</option>
						<option value="visual-basic">Visual Basic</option>
						<option value="none">Otro..</option>
					</select>
			</div>
			
			{!! Form::submit('Guardar Lenguaje', array('class'=>'btn btn-primary'))!!}
		{!! Form::close() !!}
		<hr>
	</div>
@endsection 