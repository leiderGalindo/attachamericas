<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

$datos = $_REQUEST;

$body = '
	    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	    <html xmlns="http://www.w3.org/1999/xhtml">
	        <head>
	            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	            <meta name="viewport" content="width=device-width, initial-scale=1"/>
	            <title>Contact ATTACHAMERICAS</title>
	        </head>
	        <body>
	    
	            <div style="width:100%!important;min-width:100%;color:#0a0836;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif;font-size:14px;line-height:1.5;margin:0;padding:0" bgcolor="#f6fafb">
	                <center style="width:100%;background-color:rgba(245, 245, 245, 45.47);padding:16px;">
	    
	                    <div>
	                        <div style="margin-top: 5%;">
	                            <div class="col-12" style="color: rgb(65,64,108);padding: 70px;background-color: white;text-align: justify;width:70%;border-radius:2%;">
	                                <h1 style="text-align:center;">ATTACHAMERICAS</h1><br>
	                                
	                                <p>'.$datos['message'].'</p>
	                                <h3>Datos Usuario</h3>
	                                <ul>
	                                	<li>
	                                		<h5>name: '.$datos['name'].'</h5>
	                                	</li>
	                                	<li>
	                                		<h5>phone: '.$datos['phone'].'</h5>
	                                	</li>
	                                	<li>
	                                		<h5>email: '.$datos['email'].'</h5>
	                                	</li>
	                               	</ul>
	                            </div>
	                        </div>
	                    </div>

	                </center>
	            </div>
	    
	        </body>
	    </html>
	';

$nombre = 'ATTACHAMERICAS';
$email = 'no-reply@c2110576.ferozo.com';

$mensaje = '';

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c2110576.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "no-reply@c2110576.ferozo.com";  // Mi cuenta de correo
$smtpClave = "F2oPo5z2xp";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "lgalindo@attachamericas.com";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";


// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "CONTACT ATTACHAMERICAS"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml}". $body; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Formulario de ejemplo By DonWeb"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo "El correo fue enviado correctamente.";
} else {
    echo "Ocurrió un error inesperado.";
}
