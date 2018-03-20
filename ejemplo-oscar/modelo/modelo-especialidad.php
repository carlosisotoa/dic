<?php

require_once 'conexion.php'; //incluimos el archivo de php de conexion

// heredamos la clase conexion
class Macroproyecto extends Conexion
{
	//definimo los atributos de nuestra clase
	protected $id_macroproyecto;
	protected $nombre;
	protected $objetivo_estrategico;
	protected $coordinador;
	protected $estatus;

	public function __construct()
	{
		//llamamos  el metodo de crear la conexion previamente definido en la clase Conexion
		Conexion::realizarConexion();
	}

	//realizamos los metodos  set y get  de cada uno de los atributos
	public function setId_Macroproyecto($id_macroproyecto)
	{
		$this->id_macroproyecto = $id_macroproyecto;
	}

	public function getId_Macroproyecto()
	{
		return $this->id_macroproyecto;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setObjetivo_estrategico($objetivo_estrategico)
	{
		$this->objetivo_estrategico = $objetivo_estrategico;
	}

	public function getObjetivo_estrategico()
	{
		return $this->objetivo_estrategico;
	}

	public function setCoordinador($coordinador)
	{
		$this->coordinador = $coordinador;
	}

	public function getCoordinador()
	{
		return $this->coordinador;
	}

	public function setEstatus($estatus)
	{
		$this->estatus = $estatus;
	}

	public function getEstatus()
	{
		return $this->estatus;
	}


	//metodos para operar con la base de datos
	public function registrar()
	{
		if (Conexion::getEstatusConexion()) { //verificamos que la conexion esta activa
			$strSql = 'INSERT INTO macroproyecto (nombre, objetivo_estrategico, coordinador, estatus) VALUES (:nombre, :objetivo_estrategico, :coordinador, :estatus)'; //realizamos una cadena de texto con la instruccion sql a realizar
			$strExec = Conexion::prepare($strSql); // preparamos la sentencia
			//  http://php.net/manual/es/pdo.prepare.php
			$strExec->bindValue(':nombre', $this->nombre); // Vincula un valor a un parámetro
			// http://php.net/manual/es/pdostatement.bindvalue.php
			$strExec->bindValue(':objetivo_estrategico', $this->objetivo_estrategico);
			$strExec->bindValue(':coordinador', $this->coordinador);
			$strExec->bindValue(':estatus', $this->estatus);
			$respuestaArreglo = ""; // o tambien declaramos asi:[];  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec->execute(); //ejecutamos la instruccion sql
				$respuestaArreglo = $strExec->fetchAll(); //retornamos todos los datos de la ejecucion
			} catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
				$errorReturn = "error sql:{$e}"; //"error sql:{$e}" concatenar metodo curly braces  //asignamos en mensaje a una variable

				return $errorReturn; //retornamos el contenido de esa variable
			}
			$respuestaI = Conexion::lastInsertId(); //obtenemos ID (clave primaria de la tabla) para implementarlo en otros registros
			return $respuestaArreglo; //retornamos los datos del arreglo
		}else
		{ //sino hay conexion
			return Conexion::getErrorConexion(); //retorno el mensaje de error generado 
		}
	}

	public function consultar()
	{

		return "";
	}

	public function actualizar()
	{
		return "en proceso metodo de actualizar";
	}

	public function eliminar()
	{
		return "en proceso metodo de Eliminar";
	}

	public function __destruct()
	{//metodo destructor de la clase
		parent::cerrarConexion(); //ejecutamos la simulacion de cierre de conexion
	}
}