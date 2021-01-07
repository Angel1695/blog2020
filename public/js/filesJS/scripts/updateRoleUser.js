$(document).ready(function() {
    $('#usersTable').DataTable();
    
    //evento para cambiar el role de usuario
    $('.field_role').on("change", function(e){
        var value = (this).value;
        var user_id = (this).dataset.user;
        var action = "users/"+(this).dataset.user; 
        
       
         $('#alert').show();
        $.ajax({
           url:action,
           type:"PATCH",
           data:{"role_id": value, "user_id":user_id},
           cache: false,
           success: function(resp){
               console.log(resp.message);
               $('#message').html(resp.message);
           },
           error: function(jqXHR, estado, error){
               console.log(estado);
               console.log(error);
               $('#message').html(error);
           },

        });

    });
} );