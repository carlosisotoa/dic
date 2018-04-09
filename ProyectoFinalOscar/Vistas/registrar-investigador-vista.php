<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>REGISTRAR INVESTIGADOR</title>
</head>
<body>
	<center><h1>Registrar Investigador</h1></center>
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
	<form name="form" action="../Controladores/registro-investigador-controlador.php" method="post" >
		<center><label>Nombre:</label></center>
	<center><input type="text" name="nombre" placeholder="Ingrese su nombre"></center>
    <center><label>Apellido</label></center>
    <center><input type="text" name="apellido" placeholder=" ingrese su apellido"></center>
    <center><label>Telefono</label></center>
    <center><input type="text" name="telefono" placeholder=" ingrese su telefono"></center>
    <center><label>Correo</label></center>
    <center><input type="email" name="correo" placeholder=" ingrese su correo"></center>
	<center><label>Direccion</label></center>
	<center><input type="text" name="direccion" placeholder=" Direccion"></center>
	<center><label>Nivel Academino</label></center>
	<center><input type="text" name="nivel_academico" placeholder=" Ejemple: Bachiller"></center>
	<center><input type="submit" name="Agregar"></center>
	</form>
</body>
</html>