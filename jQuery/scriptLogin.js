
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
                //alert(mensaje);
                if(mensaje == '1'){
                    alert("validado");
                    location.href='./home.php';
                }
                $('#aviso').html(mensaje);
            }).fail(function (mensaje){
                 $('#aviso').html("Algo salio mal");
            });
        }
    });
    /*
  $('#enviar').click( function(){

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
            $('#aviso').html("");
            
            user = $('#usuario').val();
            pass = $('#password').val();

            alert(user);
            alert(pass);

            $.ajax({

                type:'POST',
                url: './index_funcion.php',
                data:{
                    usuario: user,
                    password:pass
                }

            }).done(function (mensaje){
                $('#aviso').html(mensaje);
            }).fail(function (mensaje){
                 $('#aviso').html("Algo salio mal");
            });
        }
            

  });  
*/
});
	


