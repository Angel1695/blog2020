$(document).ready(function(){
    $('#divProgress').hide();

    function doProgress(evt) {
        if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            console.log(percentComplete);
            $('.progress').attr({
                value: percentComplete * 100
            });
        }else{
            console.log("no medible");
        }
    }


    $('#sendEmail').bind("submit", function(){
        $('#divProgress').show();
        $.ajax({
            xhr: function(){
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", doProgress,false);
                xhr.addEventListener("progress", doProgress, false);
                return xhr;
            },
            type: "POST",
            url: "/senEmailReset",
            data: $(this).serialize(),
            success: function(data){
                $('#alert').show();
                var mes = "";
                for(let i in data){
                    mes += "<br>"+data[i].message+"</br>";
                }
                $('#message').html(mes);
                $('#divProgress').hide();
            },
            error: function(jqXHR,estado,error){
                $('#alert').show();
                console.log(estado);
                console.log(error);
                $('#message').html("algo salio mal");
                $('#divProgress').hide();
            }
        });
        return false;
    });
});