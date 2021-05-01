<?php  

    class conexionPDO{

        static public function Conectar($base){
            //creamos variables de usuario, db y contraseña
            $usuario="c2051184_attach";
            $contraseña="04raMOzega";	
            $dbName=$base;	
            try {
                $bd = new PDO('mysql:host=localhost;port=3306;dbname='.$dbName, $usuario, $contraseña);
                $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $bd ->exec("set names utf8");//cartabetres, Ñ tildes, se puedan recibir sin problemas			
                return $bd;
            } catch(PDOException $e) {
                echo 'Error conectando con la base de datos: ' . $e->getMessage();
            }
        }
    }