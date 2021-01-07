$(document).ready(function() {

    
    var table = $('#example').DataTable();
    $('body').on('click','.permissionrole', function(e){

        var permission_id = (this).dataset.permission;
        var role_id = (this).dataset.role;
        var ban = e.target.checked;
        
        $('#alert').show();
        $.ajax({
            url: "permissions/"+(this).dataset.role,
            type:"PATCH",
            data:{"permission":permission_id, "role":role_id, "ctrl":ban},
            success:function(resp){
                $('#message').html(resp.message);
                console.log(resp);
            },
            error: function(jqXHR,estado,error){
                console.log(estado);
                console.log(error);
                $('#message').html("algo salio mal");
            },
        });
    }); 
});