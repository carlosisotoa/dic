<?php

 require_once '../modelo/modelo-especialidad.php';

$macroproyecto = new Macroproyecto(); //definimos la instancia
$macroproyecto->setNombre($_POST["nombre"]); //asignamoos el valor de la cedula
$macroproyecto->setObjetivo_estrategico($_POST["objetivo_estrategico"]);
$macroproyecto->setCoordinador($_POST["coordinador"]);
$macroproyecto->setEstatus($_POST["estatus"]); // la clave
print_r($macroproyecto->registrar()); //ejecutamos el registrar e imprimimos. NOTA: recuerden que deben imprimir en la vista, para la simplicidad de esta practica se esta realizando aca.

//comandos para comprobar la conexion activa en la base de datos
//SELECT * FROM pg_stat_activity;
//SELECT sum(numbackends) FROM pg_stat_database;
sleep(4); //delay, tiempo de espera de ejecucion por 10 segundos
$macroproyecto->__destruct(); // ejecutamos el destructor

?>