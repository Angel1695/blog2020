$(document).ready(function(){

	$.ajaxSetup({
		headers:{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

$('.componente').on('click',function(){
	let id = (this).dataset.id;
	// let value = (this).val();
	console.log('componente selecionado '+id+' '+$(this).text());
	if(id == 13 || id == 14){
		//si el componente es una tabla o practica, 
		//se elimina para que solo pueda crearse una tabla por blog
		$(this).remove();
	}

	$.ajax({
		url:'/sesiones',
		type:"POST",
		data:{'id':id},
		success: function(respuesta){
			let codigo = '';
			for (var i = 0; i < respuesta.length; i++) {
				codigo+= '<br>'+respuesta[i];
			}

			$('#lista').empty().html('<div id="tabla">'+codigo+'</div>');

		},
		error: function(jqXHR,estado,error){
			console.log(error);
		}
	});
	
	


	return false;
});

});