<?php
require_once 'Conexion.php';
$Usuario = $_POST['usuario'];
$Password = $_POST['password'];
$ArrayJSON = array('success'=>'1','error'=>'2');
if(isset($_POST['usuario']) && isset($_POST['password']))
{
	if(!empty($_POST['usuario']) && !empty($_POST['password']))
	{
		$oConexion = new Conexion();
		$oConexion->Tabla = 'usuarios';
		$oConexion->Datos = array('ID_Usuario','Rela_Persona','Rela_Tipo_Usuario','Usuario_Nombre','Usuario_pass');
		$oConexion->Condicion = "WHERE Usuario_Nombre = '$Usuario' AND Usuario_pass = '$Password'";
		$Login = $oConexion->ObtenerFila();
		if(!empty($Login[0][0]))
		{
			$Perfil = $Login[0][2];
			$oConexion->Tabla = 'tipo_usuario';
			$oConexion->Datos = array('Tipo_Usuario_Descripcion');
			$oConexion->Condicion = "WHERE ID_Tipo_Usuario = '$Perfil'";
			$oPerfil = $oConexion->ObtenerFila();
			session_start();
			$_SESSION['usuario'] = $Login[0][3];
			$_SESSION['perfil'] = $oPerfil[0][0];
			$_SESSION['idusuario'] = $Login[0][0];
			$_SESSION['persona'] = $Login[0][1];
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($ArrayJSON['success'], JSON_FORCE_OBJECT);
		}
		else
		{
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($ArrayJSON['error'], JSON_FORCE_OBJECT);
		}
	}
	else
	{
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($ArrayJSON['error'], JSON_FORCE_OBJECT);
	}
}
else
{
	header('Content-type: application/json; charset=utf-8');
	echo json_encode($ArrayJSON['error'], JSON_FORCE_OBJECT);
}
?>