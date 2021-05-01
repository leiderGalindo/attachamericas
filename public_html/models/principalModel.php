<?php 

/**
 * 
 */
class principalModel
{
	
	static public function newRecord($datos)
	{
		$date = date('Y-m-d');
		$sql = "INSERT INTO userContact(name,phone,email,menssage,date)
						VALUES(:name,:phone,:email,:message,:date)";
		$stmt = conexionPDO::conectar('c2051184_attach')->prepare($sql);
		$stmt -> bindParam(":name", $datos['name'], PDO::PARAM_STR);
		$stmt -> bindParam(":phone", $datos['phone'], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos['email'], PDO::PARAM_STR);
		$stmt -> bindParam(":message", $datos['message'], PDO::PARAM_STR);
		$stmt -> bindParam(":date", $date, PDO::PARAM_STR);
        $stmt -> execute();
        return 'exito';
        
        
	}
}

?>