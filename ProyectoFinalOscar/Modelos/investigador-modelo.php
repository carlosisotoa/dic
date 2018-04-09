<?php 
require_once "conexion.php";
class Investigador extends Conexion
{
	protected $id_investigador;
	protected $nombre;
	protected $apellido;
	protected $telefono;
	protected $correo;
	protected $direccion;
	protected $nivel_academico;

	public function __construct()
	{
		Conexion::realizarConexion();
	}

	public function setId_Investigador($id_investigador)
	{
		$this->id_investigador = $id_investigador;
	}
	public function getId_Investigador()
	{
		return $this->id_investigador;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function getNombre()
	{
		return $this->nombre;
	}

	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}
	public function getApellido()
	{
		return $this->apellido;
	}

	public function setTelefono($telefono)
	{
		$this->telefono = $telefono;
	}
	public function getTelefono()
	{
		return $this->telefono;
	}

	public function setCorreo($correo)
	{
		$this->correo = $correo;
	}
	public function getCorreo()
	{
		return $this->correo;
	}

	public function setDireccion($direccion)
	{
		$this->direccion = $direccion;
	}
	public function getDireccion()
	{
		return $this->direccion;
	}

	public function setNivel_academico($nivel_academico)
	{
		$this->nivel_academico = $nivel_academico;
	}
	public function getNivel_academico()
	{
		return $this->nivel_academico;
	}

	public function registrar()
	{
		if (Conexion::getEstatusConexion()) { //verificamos que la conexion esta activa
			$strSql = 'INSERT INTO investigador (nombre, apellido, telefono, correo, direccion, nivel_academico) VALUES (:nombre, :apellido, :telefono, :correo, :direccion, :nivel_academico )'; 
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				$strExec->bindValue(':nombre', $this->nombre); 
				$strExec->bindValue(':apellido', $this->apellido);
				$strExec->bindValue(':telefono', $this->telefono); 
				$strExec->bindValue(':correo', $this->correo);
				$strExec->bindValue(':direccion', $this->direccion); 
				$strExec->bindValue(':nivel_academico', $this->nivel_academico);
				$strExec->execute(); //ejecutamos la instruccion sql
				$respuestaArreglo = $strExec->fetchAll(); //retornamos todos los datos de la ejecucion
				$respuestaArreglo += ['estatus' => true];
			} catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];

				return $errorReturn; //retornamos el contenido de esa variable
			}
			$respuestaI = Conexion::lastInsertId(); //obtenemos ID (clave primaria de la tabla) para implementarlo en otros registros
			return $respuestaArreglo; //retornamos los datos del arreglo
		} else { //sino hay conexion
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => 'error sql:'.Conexion::getErrorConexion()];

			return $errorReturn; //retorno el mensaje de error generado
		}
	}

	public function consultar()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT id_investigador,nombre, apellido, telefono, correo, direccion, nivel_academico FROM investigador WHERE nombre=:nombre';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);

				$strExec->bindValue(':nombre', $this->nombre);
				$strExec->execute();
				$respuestaArreglo = $strExec->fetchAll();
				$respuestaArreglo += ['estatus' => true];
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];

				return $errorReturn;
			}

			return $respuestaArreglo;
		} else {
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => 'error sql:'.Conexion::getErrorConexion()];

			return $errorReturn;
		}
	}

	public function consultarNombreUsuario()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT  id_investigador, nombre, apellido, telefono, correo, direccion, nivel_academico FROM investigador WHERE nombre LIKE :nombre';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);
				$strExec->bindValue(':nombre', "%$this->nombre%");
				$strExec->execute();
				$respuestaArreglo = $strExec->fetchAll();
				$respuestaArreglo += ['estatus' => true];
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];

				return $errorReturn;
			}

			return $respuestaArreglo;
		} else {
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => 'error sql:'.Conexion::getErrorConexion()];

			return $errorReturn;
		}
	}

	public function actualizar()
	{
		if (Conexion::getEstatusConexion()) { //verificamos que la conexion esta activa
			$strSql = 'UPDATE investigador SET apellido=:apellido, correo=:correo, nivel_academico=:nivel_academico, direccion=:direccion, telefono=:telefono WHERE nombre=:nombre'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); 
				$strExec->bindValue(':nombre', $this->nombre); // Vincula un valor a un parámetro
				$strExec->bindValue(':direccion', $this->direccion);
				$strExec->bindValue(':telefono', $this->telefono);
				$strExec->bindValue(':apellido', $this->apellido);
				$strExec->bindValue(':nivel_academico', $this->nivel_academico);
				$strExec->bindValue(':correo', $this->correo);
				$strExec->execute(); //ejecutamos la instruccion sql
				$respuestaArreglo = $strExec->fetchAll(); //retornamos todos los datos de la ejecucion
				$respuestaArreglo += ['estatus' => true];
			} catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];

				return $errorReturn; //retornamos el contenido de esa variable
			}

			return $respuestaArreglo; //retornamos los datos del arreglo
		} else { //sino hay conexion
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => 'error sql:'.Conexion::getErrorConexion()];

			return $errorReturn; //retorno el mensaje de error generado
		}
	}

	public function eliminar()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'DELETE FROM investigador WHERE nombre=:nombre';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);

				$strExec->bindValue(':nombre', $this->nombre);
				$strExec->execute();
				$respuestaArreglo = $strExec->fetchAll();
				$respuestaArreglo += ['estatus' => true];
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];

				return $errorReturn;
			}

			return $respuestaArreglo;
		} else {
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => 'error sql:'.Conexion::getErrorConexion()];

			return $errorReturn;
		}
	}

	public function __destruct()
	{//metodo destructor de la clase
		parent::cerrarConexion(); 
	}
}