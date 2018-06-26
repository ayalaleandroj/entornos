<?php 
include('funciones.php');
$_SESSION['usuario'] = "Usuario1";
$_SESSION['perfil'] = "Alumno";
$_SESSION['idusuario'] = 1;

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

function cargarCarreras() {
	//Funcion que carga carreras en el menu principal
	$carreras = consulta("SELECT ID_CARRERA, CARRERA_NOMBRE FROM CARRERAS");
	foreach($carreras as $registro=>$campo) {
		echo "<li role='presentation'><a role='menuitem' tabindex='-1' href='clases.php?idcarrera=".$campo['ID_CARRERA']."'>".$campo['CARRERA_NOMBRE']."</a></li>";
	}
}

function obtenerTitulo($idcarrera) {
	//funcion que devuelve el titulo de una carrera de acuerdo al id
	$carreratitulo = consulta("SELECT CARRERA_NOMBRE FROM CARRERAS WHERE ID_CARRERA = ".$idcarrera."");
	return $carreratitulo[0]['CARRERA_NOMBRE'];
}

function obtenerMaterias($carrera, $year) {
	//Funcion que devuelve las materias dadas una carrera y un año de cursada de esa carrera
	$materiaConsulta = "SELECT ID_MATERIA, MATERIA_NOMBRE, CURSADA FROM MATERIAS JOIN CARRERAS ON ID_CARRERA = RELA_CARRERA";
	$materiaConsulta .= " WHERE RELA_CARRERA = ".$carrera." AND CURSADA = ".$year;
	$materias = consulta($materiaConsulta);
	foreach($materias as $registro=>$campo) {
		echo "<tr><td>".$campo['ID_MATERIA']."</td>",
		"<td><a href='modulo-materia.php?idmateria=".$campo['ID_MATERIA']."'>".$campo['MATERIA_NOMBRE']."</a></td>",
		"<td class='centro-ins'>";
		$inscriptoMateria = determinarInscripto($_SESSION['idusuario'], $campo['ID_MATERIA']);
		if ($inscriptoMateria == "no-inscripto") {
			echo "<input type='button' value='Inscribirse' onclick='window.location=\"inscribir-materia.php?idmateria=".$campo['ID_MATERIA']."\"'/>";
		} elseif($inscriptoMateria == "inscripto") {
			echo "Inscripto";
		} elseif($inscriptoMateria == "asignado") {
			echo "Asignado";
		} elseif($inscriptoMateria == "no-asignado") {
			echo "No Asignado";
		} elseif($inscriptoMateria == "no-registrado") {
			echo "<input type='button' value='Inscribirse' onclick='window.location=\"alta-usuarios.php\";'/>";
		}
		echo "</td></tr>";
	}
}

function determinarInscripto($usuario, $materia) {
	//Funcion para determinar si un usuario esta inscripto a una materia
	if (isset($_SESSION['usuario'])) {
		if ($_SESSION['perfil'] == "Alumno") {
			$consulta = "SELECT COUNT(*) AS CANTIDAD FROM MATERIAS_CURSADAS JOIN MATERIAS ON ID_MATERIA = RELA_MATERIA JOIN ALUMNOS ";
			$consulta .= "ON ID_ALUMNO = RELA_ALUMNO JOIN PERSONAS ON ID_PERSONA = ALUMNOS.RELA_PERSONA JOIN USUARIOS";
			$consulta .= " ON ID_PERSONA = USUARIOS.RELA_PERSONA WHERE ID_USUARIO = ".$usuario." AND ID_MATERIA = ".$materia;
		} elseif($_SESSION['perfil'] == "Profesor") {
			$consulta = "SELECT COUNT(*) AS CANTIDAD FROM PROFESORXMATERIA JOIN MATERIAS ON ID_MATERIA = RELA_MATERIA JOIN ";
			$consulta .= "PROFESORES ON ID_PROFESOR = RELA_PROFESOR JOIN PERSONAS ON ID_PERSONA = PROFESORES.RELA_PERSONA ";
			$consulta .= "JOIN USUARIOS ON ID_PERSONA = USUARIOS.RELA_PERSONA WHERE ID_USUARIO = ".$usuario." AND ID_MATERIA = ".$materia;
		} else {
			$consulta = "";
		}
		$matrizResultado = consulta($consulta);
		if($matrizResultado != NULL && $matrizResultado[0]['CANTIDAD'] > 0) {
			if($_SESSION['perfil'] == "Profesor") {
				return "asignado";
			} elseif($_SESSION['perfil'] == "Alumno") {
				return "inscripto";
			}
		} elseif($matrizResultado != NULL) {
			if($_SESSION['perfil'] == "Profesor") {
				return "no-asignado";
			} elseif($_SESSION['perfil'] == "Alumno") {
				return "no-inscripto";
			}
		} else {
			return "no-registrado";
		}
	} else {
		return "no-registrado";
	}
}

function inscripcionMateria($materia, $usuario) {
	if (isset($_SESSION['usuario'])) {
		if($_SESSION['perfil'] == "Profesor") {
			$profesor = consulta("SELECT ID_PROFESOR FROM PROFESORES JOIN PERSONAS ON ID_PERSONA = PROFESORES.RELA_PERSONA JOIN USUARIOS ON ID_USUARIO = USUARIOS.RELA_PERSONA WHERE ID_USUARIO = ".$usuario);
			$profesorID = $profesor[0]['ID_PROFESOR'];
			modificarBD("INSERT INTO PROFESORXMATERIA(RELA_PROFESOR, RELA_MATERIA) VALUES(".$profesorID.", ".$materia.")");
			echo "<script>alert('Materia asignada a profesor correctamente');</script>";
		} elseif($_SESSION['perfil'] == "Alumno") {
			$alumno = consulta("SELECT ID_ALUMNO FROM ALUMNOS JOIN PERSONAS ON ID_PERSONA = ALUMNOS.RELA_PERSONA JOIN USUARIOS ON ID_USUARIO = USUARIOS.RELA_PERSONA WHERE ID_USUARIO =".$usuario);
			$alumnoID = $alumno[0]["ID_ALUMNO"];
			modificarBD("INSERT INTO MATERIAS_CURSADAS(ESTADO_CURSO, FECHA_INSCRIPCION, RELA_ALUMNO, RELA_MATERIA) VALUES ('activo', '".date('Y-m-d')."', ".$alumnoID.", ".$materia.")");
			echo "<script>alert('Inscripción a materia realizada correctamente');</script>";
		}
		echo "<script>window.location='modulo-materia.php?idmateria=".$materia."'</script>";
	}
}
?>