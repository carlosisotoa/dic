<?php 
if (!empty($_POST))
	if(isset($_POST["nombre"]))
	{
		require_once '../Modelos/investigador-modelo.php';
$investigador = new Investigador();
$investigador->setNombre($_POST["nombre"]);
$investigador->setApellido($_POST["apellido"]);
$investigador->setTelefono($_POST["telefono"]);
$investigador->setCorreo($_POST["correo"]);
$investigador->setDireccion($_POST["direccion"]);
$investigador->setNivel_academico($_POST["nivel_academico"]);
$r1=$investigador->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			if (count($r1)>1) {  //contamos la cantidad de elemento en el arreglo
				$mensaje="El Usuario ya Existe en la base de Datos";
			}
			else{ //sino hay mas de 1 registro
				$r2 = $investigador->registrar();
				if ($r2['estatus']) { ////verificamos si se ejecuto correctamente el metodo del modelo
					$mensaje = 'Registro Exitoso';
				} else {//si hay un error al registrar
					$mensaje = 'Error al registrar el Usuario, contacte con el soporte';
				}
			}
		}else{//si hay un error al consultar
			$mensaje = 'Error al registrar el Usuario, contacte con el soporte';
		}
		require_once '../Vistas/mensaje-vista.php';
	}

//print_r($investigador->registrar());
//sleep(4); //delay, tiempo de espera de ejecucion por 10 segundos
//$investigador->__destruct(); // ejecutamos el destructor
 ?>