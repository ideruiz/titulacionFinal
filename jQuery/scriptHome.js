$(document).ready(function(){

	$('#content').load('portada.html');

	$('#btn0').click(function(){
		$('#btn1,#btn2,#btn3,#btn4,#btn5').removeClass("botonactivo");
		$('#btn0').addClass("botonactivo");
		$('#icon1').removeClass("imgbtn1act");
		$('#icon2').removeClass("imgbtn2act");
		$('#icon3').removeClass("imgbtn3act");
		$('#icon4').removeClass("imgbtn4act");
		$('#icon5').removeClass("imgbtn5act");
		$('#icon0').addClass("imgbtn0act");
		$sel0 = $('<div class="elegido" id="select0"></div>');
		$('#boton0').append($sel0);
		$('#select1, #select2, #select3, #select4, #select5').remove();
		$('#content').css("display", "none");
		$('#content').show('slow');
		$('#content').load('portada.html');
	});	

	$('#btn1').on('click', function(){
		$('#btn0,#btn2,#btn3,#btn4,#btn5').removeClass("botonactivo");
		$('#btn1').addClass("botonactivo");
		$('#icon0').removeClass("imgbtn0act");
		$('#icon2').removeClass("imgbtn2act");
		$('#icon3').removeClass("imgbtn3act");
		$('#icon4').removeClass("imgbtn4act");
		$('#icon5').removeClass("imgbtn5act");
		$('#icon1').addClass("imgbtn1act");
		$sel1 = $('<div class="elegido" id="select1"></div>');
		$('#boton1').append($sel1);
		$('#select0, #select2, #select3, #select4, #select5').remove();
		$('#content').css("display", "none");
		$('#content').show('slow');
		$('#content').load('configuracion.html');
	});

	$('#btn2').click(function(){
		$('#btn0,#btn1,#btn3,#btn4,#btn5').removeClass("botonactivo");
		$('#btn2').addClass("botonactivo");
		$('#icon0').removeClass("imgbtn0act");
		$('#icon1').removeClass("imgbtn1act");
		$('#icon3').removeClass("imgbtn3act");
		$('#icon4').removeClass("imgbtn4act");
		$('#icon5').removeClass("imgbtn5act");
		$('#icon2').addClass("imgbtn2act");
		$sel2 = $('<div class="elegido" id="select2"></div>');
		$('#boton2').append($sel2);
		$('#select0,#select1,#select3,#select4,#select5').remove();
		$('#content').css("display", "none");
		$('#content').show('slow');
		$('#content').load('verCandidatos.php');
	});

	$('#btn3').click(function(){
		$('#btn0,#btn1,#btn2,#btn4,#btn5').removeClass("botonactivo");
		$('#btn3').addClass("botonactivo");
		$('#icon0').removeClass("imgbtn0act");
		$('#icon1').removeClass("imgbtn1act");
		$('#icon2').removeClass("imgbtn2act");
		$('#icon4').removeClass("imgbtn4act");
		$('#icon5').removeClass("imgbtn5act");
		$('#icon3').addClass("imgbtn3act");
		$sel3 = $('<div class="elegido" id="select3"></div>');
		$('#boton3').append($sel3);
		$('#select0,#select1,#select2,#select4,#select5').remove();
		$('#content').css("display", "none");
		$('#content').show('slow');
		$('#content').load('formValidaciones.php');
	});

	$('#btn4').click(function(){
		$('#btn0,#btn1,#btn2,#btn3,#btn5').removeClass("botonactivo");
		$('#btn4').addClass("botonactivo");
		$('#icon0').removeClass("imgbtn0act");
		$('#icon1').removeClass("imgbtn1act");
		$('#icon2').removeClass("imgbtn2act");
		$('#icon3').removeClass("imgbtn3act");
		$('#icon5').removeClass("imgbtn5act");
		$('#icon4').addClass("imgbtn4act");
		$sel4 = $('<div class="elegido" id="select4"></div>');
		$('#boton4').append($sel4);
		$('#select0,#select1,#select2,#select3,#select5').remove();
		$('#content').css("display", "none");
		$('#content').show('slow');
		$('#content').load('tablaTitulacion.php');
	});

	$('#btn5').click(function(){
		$('#titulo,#btn0,#btn1,#btn2,#btn3,#btn4').removeClass("botonactivo");
		$('#btn5').addClass("botonactivo");
		$('#icon0').removeClass("imgbtn0act");
		$('#icon1').removeClass("imgbtn1act");
		$('#icon2').removeClass("imgbtn2act");
		$('#icon3').removeClass("imgbtn3act");
		$('#icon4').removeClass("imgbtn4act");
		$('#icon5').addClass("imgbtn5act");
		$sel5 = $('<div class="elegido5" id="select5"></div>');
		$('#boton5').append($sel5);
		$('#select0,#select1,#select2,#select3,#select4').remove();
		$('#content').css("display", "none");
		$('#content').show('slow');
		$('#content').load('exportables.html');
	});
	
});