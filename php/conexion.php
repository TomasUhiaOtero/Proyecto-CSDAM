<?php
$servidor="localhost"; // Ordenador donde reside el servidor MySQL.
$usuario="root"; // Usuario de MySQL
$pass="root"; // Contraseña del $usuario
$bd="musica"; // Base de datos del $servidor al que queremos conectarnos
// Establecemos la conexión con el servidor y con la base de datos.
$conexion=mysqli_connect ($servidor, $usuario, $pass, $bd) or die ("Error:" . mysqli_connect_error());
?>