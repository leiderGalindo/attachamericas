<?php 
include('conexion.php');
include('contact.php');
include('../models/principalModel.php');

$datos = $_REQUEST;
contact::ctrContac($datos);


?>