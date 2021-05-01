<?php 
/**
 * 
 */
class contact
{
	
	static public function ctrContac($datos)
	{
		$newRecord = contact::ctrNewRecord($datos);
		//$newEmail = contact::ctrNewEmail($datos);
	}

	static public function ctrNewRecord($datos)
	{
		$newRecord = principalModel::newRecord($datos);
		return $newRecord;
	}

	static public function ctrNewEmail($datos)
	{

		$motivo = 'Contact ATTACHAMERICAS';
		$num = md5(time());

		$body = contact::ctrBodyEmail($datos);
		

		$mensaje = wordwrap($body, 70, "\r\n");

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		$headers .= "From: ATTACHAMERICAS <c2051184.ferozo.com>\r\n";


		//$exito = mail('lgalindo@attachamericas.com', $motivo, $mensaje, $headers);
		$exito = mail('lgalindo@attachamericas.com', $motivo, $mensaje, $headers);
		
		if ($exito) {
		   echo 'exito';
		}else{
			echo $errorMessage = error_get_last()['message'];
			print_r($errorMessage);
		}

	}

	static public function ctrBodyEmail($datos)
	{
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
		return $body;
	}
}