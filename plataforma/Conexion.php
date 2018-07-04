<?php
/**
* Clase de conexion
*/
class Conexion
{
	private $Host;
	private $BaseDeDatos;
	private $Usuario;
	private $Contraseña;
	//////////////////////////
	private $Conexion;
	private $Comando;
	//////////////////////////
	public $Tabla;
	public $Datos;
	public $Condicion;
	public $Columnas;
	function __construct()
	{
		$this->Host = 'localhost';
		$this->BaseDeDatos = 'plataforma';
		$this->Usuario = 'root';
		$this->Contraseña = '';
	}
	private function Configuracion()
	{
		$this->Conexion = new PDO('mysql:host='.$this->Host.';dbname='.$this->BaseDeDatos,$this->Usuario,$this->Contraseña);
		$this->Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	public function Conectarse()
	{
		try
		{
			$this->Configuracion();
			$this->Conexion->beginTransaction();
		}
		catch (PDOException $e)
		{
			return 'Error al conectarse:'.$e->getMessage();
		}
	}
	public function Insertar()
	{
		try
		{
			$Valores;
			$Signos = "NULL";
			foreach ($this->Datos as $key => $value)
			{
				$Signos = $Signos.",?";
				if(is_numeric($key))
				{
					if(isset($_POST[$value]))
					{
						$Valores[] = $_POST[$value];
					}
					else
					{
						$Valores[] = 'NULL';
					}
				}
				else
				{
					$Valores[] = $value;
				}
			}
			$Consulta = "INSERT INTO $this->Tabla VALUES($Signos)";
			$this->Comando = $this->Conexion->prepare($Consulta);
			$this->Comando->execute($Valores);
			return $this->Conexion->lastInsertId();
		}
		catch (Exception $e)
		{
			return "Error al ejecutar los datos: ".$e->getMessage();
		}
		
	}
	public function Actualizar()
	{
		try
		{
			$Valores = '';
			foreach ($this->Datos as $Key => $Valor)
			{
				$Valores = $Valores." ".$Key." = "."'".$Valor."',";
			}
			$Valores = substr($Valores, 0, -1);
			$Consulta = "UPDATE $this->Tabla SET $Valores WHERE $this->Condicion";
			$this->Comando = $this->Conexion->prepare($Consulta);
			$this->Comando->execute();
		}
		catch (Exception $e)
		{
			return "Error al ejecutar los datos: ".$e->getMessage();
		}
	}
	public function Eliminar()
	{
		try 
		{
			$Consulta = "DELETE FROM $this->Tabla WHERE $this->Condicion";
			$this->Comando = $this->Conexion->prepare($Consulta);
			$this->Comando->execute();
		}
		catch (Exception $e)
		{
			return "Error al ejecutar los datos: ".$e->getMessage();
		}
	}
	public function ObtenerFila()
	{
		$Columnas = '';
		$Tablas;
		$Matriz = array(array());
		if(is_array($this->Datos))
		{
			$NumeroDeColumnas = count($this->Datos);
		}
		else
		{
			$NumeroDeColumnas = $this->Columnas;
		}
		if(is_array($this->Datos))
		{
			foreach ($this->Datos as $Key => $Valor)
			{
				$Columnas = $Columnas.$Valor.", ";
			}
			$Columnas = substr($Columnas, 0, -2);
		}
		else
		{
			$Columnas = $this->Datos;
		}
		if(is_array($this->Tabla))
		{
			foreach ($this->Tabla as $Key => $Valor)
			{
				$Tablas = $Tablas.$Valor.", ";
			}
			$Tablas = substr($Tablas, 0, -2);
		}
		else
		{
			$Tablas = $this->Tabla;
		}
		$Consulta = "SELECT $Columnas FROM $Tablas $this->Condicion";
		$this->Conectarse();
		$this->Comando = $this->Conexion->prepare($Consulta);
		$this->Comando->execute();
		$this->Ejecutar();
		$Contador = 0;
		while($datos = $this->Comando->fetch())
		{			
			for ($i=0; $i < $NumeroDeColumnas; $i++) 
			{ 
				$Matriz[$Contador][$i] = $datos[$i];
			}
			++$Contador;
		}
		return $Matriz;
	}
	public function Ejecutar()
	{
		try
		{
			$this->Conexion->commit();
			return "1";
		} 
		catch (Exception $e)
		{
			$this->Conexion->rollBack();
			return "Error al subir los datos: ".$e->getMessage();
		}
	}
}