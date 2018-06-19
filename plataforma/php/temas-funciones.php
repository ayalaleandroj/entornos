<?php 
include('funciones.php');
$_SESSION['usuario'] = "Usuario 1";
$_SESSION['perfil'] = "Admin";

function cargar_temas($materia) {
	$consulta = "SELECT TIPO FROM TEMAS JOIN ";
}

function cargar_categorias($materia) {
	$consulta = "SELECT ID_TIPO_TEMA, TIPO_TEMA_DESCRIPCION FROM TIPO_TEMA JOIN TEMAS ON ID_TIPO_TEMA = RELA_TIPO_TEMA JOIN MATERIAS ";
	$consulta .= "ON ID_MATERIA = RELA_MATERIA WHERE MATERIA_NOMBRE LIKE '".$materia."'";
	$categorias = consulta($consulta);

	echo "<ul>";
	foreach($categorias as $registro=>$campo) {
		echo "<a href=curso.php?materia=".$materia."&tema=".$campo["ID_TIPO_TEMA"]."><li>".$campo["TIPO_TEMA_DESCRIPCION"]."</li></a>";
	}
	echo "</ul>";
}

function cargar_carreras() {
	$carreras = consulta("SELECT ID_CARRERA, CARRERA_NOMBRE FROM CARRERAS");
	echo "<ul>";
	foreach($carreras as $registro=>$campo) {
		echo "<li><a href='#'>".$campo['CARRERA_NOMBRE']."</a></li>";
		echo "<ul>";
		$materias = consulta("SELECT ID_MATERIA, MATERIA_NOMBRE FROM MATERIAS WHERE RELA_CARRERA = ".$campo['ID_CARRERA']."");
		foreach($materias as $linea=>$valor) {
			echo "<li><a href='#'>".$valor['MATERIA_NOMBRE']."</a></li>";
		}
		echo "</ul>";
	}
	echo "</ul>";
}


?>