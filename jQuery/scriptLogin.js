
$(document).ready(function () {
    
    $(".enviar").click( function(){
        if ($('#usuario').val() == "" || $('#usuario').val()== " "){

            $('#aviso').fadeIn('slow', function(){
                $('#aviso').html("Ingrese su nombre de usuario");
                $('#usuario').focus();
            });
        }
        else if ($('#password').val() == "" || $('#password').val()==" " ){

                $('#aviso').fadeIn('slow', function(){
                    $('#aviso').html("Ingrese su contraseña");
                    $('#password').focus();
                });
        }
        else{
            user = $('#usuario').val();
            pass = $('#password').val();

            $.ajax({

                type:'POST',
                url: './index_funcion.php',
                data:{
                    user:user,
                    pass:pass
                }

            }).done(function (mensaje){

                if(mensaje=="2"){
                    location.href='./inicio.php';
                }
                if(mensaje=="1"){
                    location.href='./home.php';
                }
                if(mensaje=="false"){
                  $('#aviso').html("Verifique su usuario y contraseña");  
                }

            }).fail(function (mensaje){
                 $('#aviso').html("Algo salio mal");
            });
        }

    });
  
});
	


