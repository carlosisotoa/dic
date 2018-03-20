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
<li>
Usuario
<ul>
<li><a href="../vistas/registrar-usuario-vista.php">Registrar</a></li>
<li><a href="../vistas/consultar-usuario-vista.php">Consultar</a></li>
</ul>
</li>
</ul>
</nav>
<?php
if (isset($mensaje)) {
printf($mensaje);
}
?>
</body>
</html>