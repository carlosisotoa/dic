<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mensaje</title>
</head>
<body>
<h1>Mensaje</h1>
	<nav>
		<ul>
					<li><a href="../index.php">Inicio</a></li>
					<li><a href="../inicio.php">Inicio 2</a></li>
			<li>
				Usuario
				<ul>
					<li><a href="../Vistas/registrar-usuario-vista.php">Registrar</a></li>
					<li><a href="../Vistas/consultar-usuario-vista.php">Consultar </a></li>
				</ul>
			</li>
		</ul>
						<ul>
							<li>
							Investigador
							</li>
							<ul>
					<li><a href="../Vistas/registrar-investigador-vista.php">Registrar</a></li>
					<li><a href="../Vistas/consultar-investigador-vista.php">Consultar</a></li>
								
							</ul>
						</ul>

			<ul>
				<li>
					Comunidad
				</li>
				<ul>
				<li><a href="../Vistas/registrar-comunidad-vista.php">Registrar</a></li>
				<li><a href="../Vistas/consultar-comunidad-vista.php">Consultar</a></li>
				</ul>
			</ul>
	</nav>
<?php
if (isset($mensaje)) {
	printf($mensaje);
}
?>
</body>
</html>
