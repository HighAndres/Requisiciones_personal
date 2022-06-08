<?php
	$conectar= mysqli_connect('localhost','acelis','acti1998','requisiciones');

    if (!$conectar) {
        die("Ha fallado la conexión a la Base de Datos: " . mysqli_connect_error());
        exit();
    }

    mysqli_set_charset( $conectar, 'utf8');
?>