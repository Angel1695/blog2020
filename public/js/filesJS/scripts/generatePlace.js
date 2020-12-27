$(document).ready(function(){

    $('#generar_lugar').submit(function(evt){
        var name = $('#name').val();
        var address =$('#direccion').val();
        var id = $('#contact').val();
        console.log(name);
        console.log(address);
        console.log(id);
        $.ajax({
            url:'/lugares',
            type:'POST',
            data:{ 'name':name, 'direccion':address, 'contact':id},
            success:function(data){
                close();
            },
            error:function(jqXHR, estado, error){
                console.log(estado);
                console.log(error);
            }
        });
        evt.preventDefault();

    });
});