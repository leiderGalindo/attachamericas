$(function() {
	
	$('#btn-send').on('click', function(){
		if ($('#name').val() != '' && $('#phone').val() != '' && $('#email').val() != '') {
			var datos = $('#form-Contact').serialize();

			$.ajax({
	            type: "POST",
	            url: "../controllers/principalController.php",
	            data: datos,
	            success: function (data) {

	            	alert('Gracias por Comunicarte con nosotros muy pronto uno de nuestros acesores se comunicara contigo.');
	            	$('#name').val('');
	            	$('#phone').val('');
	            	$('#email').val('');
	            	$('#message').val('');

	            	document.getElementById('card').style.display = 'none';

	            }
	        });

	        $.ajax({
	            type: "POST",
	            url: "https://attachamericas.site/landing/controllers/mail.php",
	            data: datos,
	            success: function (data) {}
	        });
	        
	    }else{
	    	alert('Recuerda los campos name, phone, email son obligatorio.');
	    }
	});
})