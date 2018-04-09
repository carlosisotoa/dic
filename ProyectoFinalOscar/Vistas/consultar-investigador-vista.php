<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Consultar Investigador</title>
</head>

<body>
	<h2>Consultar Investigador</h2>
	<nav>
		<ul>
					<li><a href="../index.php">Inicio</a></li>
			<li>
				Investigador
				<ul>
					<li><a href="../Vistas/registrar-investigador-vista.php">Registrar</a></li>
					<li><a href="../Vistas/consultar-investigador-vista.php">Consultar</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<form action="../Controladores/consultar-investigador-controlador.php" method="post">
		<input type="text" name="nombre" id="nombre" placeholder="Introduzca el Nombre del Usuario" />
		<input type="submit" value="Buscar" />
	</form>
<?php
if (isset($r1)) {
	if (!empty($r1)) {
		$impr = '	<table border=1>
			<thead>
			<tr>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Telefono</td>
			<td>Correo</td>
			<td>Direccion</td>
			<td>Nvl Academico</td>
			<td>Opcion</td>
			</tr>
			</thead>
			<tbody>';
foreach ($r1 as $valor) {
	if (isset($valor["nombre"])) {
		$impr .= '<tr>';
		$impr .= '<td>'.$valor['nombre'].'</td>';
		$impr .= '<td>'.$valor['apellido'].'</td>';
		$impr .= '<td>'.$valor['telefono'].'</td>';
		$impr .= '<td>'.$valor['correo'].'</td>';
		$impr .= '<td>'.$valor['direccion'].'</td>';
		$impr .= '<td>'.$valor['nivel_academico'].'</td>';
		$impr .= '
		<td>
			<form action="../Controladores/cargar-investigador-controlador.php" method="POST">
				<input type="hidden" name="nombre" value="'.$valor['nombre'].'" />
				<input type="submit" value="Actualizar" />
			</form>
			<form action="../Controladores/eliminar-investigador-controlador.php" method="POST">
				<input type="hidden" name="nombre" value="'.$valor['nombre'].'" />
				<input type="submit" value="Eliminar" />
			</form>
		</td>

';
		$impr .= '</tr>';
	}
}
$impr .= '</tbody>';
$impr .= '</table>';
printf($impr);
	}
}
?>
</body>

</html>