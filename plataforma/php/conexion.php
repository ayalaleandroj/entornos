<?php
define('NOMBREBD', 'plataforma');
session_start();
if(empty($_SESSION['usuario']))
{
	header('location: login.php'); 
}

date_default_timezone_set('America/Argentina/Buenos_Aires'); //Fecha configurada para Argentina

function conectar() {
	try {
		$GLOBALS['conexion'] = new PDO('mysql:host=localhost;dbname='.NOMBREBD, 'root', '');
	} catch(PDOException $error) {
		echo "Error al conectar a la base de datos: </br>", $error->getMessage();
	}
}

function desconectar() {
	$GLOBALS['conexion'] = null;
}
?>