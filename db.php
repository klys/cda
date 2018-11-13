<?php
	// Conexion con base de datos MySQL
	$mysqli=new mysqli("localhost", "root","","controlacceso");
	
	if (mysqli_connect_errno()) {
		# code...
		echo 'Database Conection Failed: ', mysqli_connect_error();
		exit;
	}
	$mysqli->set_charset("utf8");
	/*
			Archivo de Conexion a base de Datos MySQL
			Usado en todo el proyecto.
	*/
?>