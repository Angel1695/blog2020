$(document).ready(function() {
    //configuraciones generales
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //ocultar el mensaje de alerta al cerrarlo
    $('.close').on('click', function(){
        $('#alert').hide();    
    });
    $('#alert').hide();
});