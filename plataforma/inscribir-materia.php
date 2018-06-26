<?php
include('php/temas-funciones.php');
if (isset($_SESSION['idusuario'])) {
	if ($_SESSION['perfil'] == "Alumno" OR $_SESSION['perfil'] == "Profesor") {
		inscripcionMateria($_GET['idmateria'], $_SESSION['idusuario']);
	}
} else {
	echo "Acceso denegado";
}
?>