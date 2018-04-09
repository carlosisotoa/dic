<?php

if (!empty($_POST))
	if (isset($_POST["nombre"])) {
		require_once '../Modelos/investigador-modelo.php';
		$investigador = new Investigador();
		$investigador->setNombre($_POST['nombre']);
		$r1=$investigador->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			require_once '../Vistas/actualizar-investigador-vista.php';
		}else{//si hay un error al consultar
			$mensaje = 'Error al consultar el Investigador, contacte con el soporte';
			require_once '../Vistas/mensaje-vista.php';
		}
	}
?>