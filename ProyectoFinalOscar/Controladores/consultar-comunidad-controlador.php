<?php

if (!empty($_POST))
	if (isset($_POST["nombre"])) {
		require_once '../Modelos/comunidad-modelo.php';
		$objUsuario = new Comunidad();
		$objUsuario->setNombre($_POST['nombre']);
		$r1=$objUsuario->consultarNombreUsuario();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			require_once '../Vistas/consultar-comunidad-vista.php';
		}else{//si hay un error al consultar
			$mensaje = 'Error al consultar el Usuario, contacte con el soporte';
			require_once '../Vistas/mensaje-vista.php';
		}
	}
?>