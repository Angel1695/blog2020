$(document).ready(function(){
    $('#empresa').prop('checked', false);
    $('#empresa').click(function(){
        
        console.log("onclick");
        var check = document.getElementById('empresa').checked;
        if(check){
            console.log('entro');
            $('#btn_ok').attr('value','Registrar establecimiento');
        }else{
            $('#btn_ok').attr('value','Registrar');
        }
        
    });

    $('#generar').submit(function(evt){
        var btn = $('#btn_ok').attr('value');

        if(btn == "Registrar establecimiento"){
            console.log('if');
            var win = window.open("/lugares/create", "_blank");
            if(win){
                $('#btn_ok').attr('value','Registrar');
                $('#checkbox_div').hide();
                
                win.focus();
                
                

                evt.preventDefault();
            }else{
                console.log('no abrio la ventana');
            }
            evt.preventDefault();
        }else{
            console.log('else');
            $('#alert').show();
            $.ajax({
                type:'POST',
                url:'/contactos',
                data:$(this).serialize(),
                success:function(datos){
                    //$('.result').html(datos['img']);
                    console.log(datos);
                    $('#btn_ok').prop("disabled",true);
                    $('#title').html(datos.title);
                    $('#message').html(datos.message);
                },
                error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
                    $('#title').html("ERROR");
                    $('#message').html("algo salio mal");
                },
            });
        }
        evt.preventDefault();
        
    });

    $('.close').on('click', function(){
        $('#alert').hide();    
        $('#btn_ok').prop("disabled",false);
    });
});