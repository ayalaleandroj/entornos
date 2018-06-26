<?php
	include('conexion.php');

	//Funcion que mediante una consulta dada, devuelve una matriz con los registros que trae
	function consulta($consulta) {
		conectar();
		try {
			$accesoBD = $GLOBALS['conexion']->prepare($consulta);
			$accesoBD->execute();
			$matrisRecordSet = $accesoBD->fetchall();
			return $matrisRecordSet;
		} catch(PDOException $error) {
			echo "Error de la base de datos: ", $error->getMessage();
		}
		desconectar();
	}

	//funcion para insertar datos mediante una sentencia sql insert/update/delete dada
	function modificarBD($consulta) {
		conectar();
		try {
			$accesoBD = $GLOBALS['conexion']->prepare($consulta);
			$accesoBD->execute();
			return true;
		} catch(PDOException $error) {
			echo "Error al insertar: ", $error->getMessage();
		}
		desconectar();
	}

	//funcion que cargara un combobox mediante una consulta dada
	function cargar_combo($consulta) {
		$matrizRecordSet = consulta($consulta);

		foreach($matrizRecordSet as $id=>$columna) {
			echo "<option value=".$id.">".$columna."</option>";
		}
	}
?>