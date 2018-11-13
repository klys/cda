<?php
	
	include ("../../../db.php");

	$json = array("result" => false, "mensaje" => "No hubo respuesta.");

	$habn = $_GET["habn"];
	$haba = $_GET["haba"];
	$visn = $_GET["visn"];
	$visc = $_GET["visc"];

	$vis = -1;
	$hab = -1;

	$sql = "INSERT INTO habitantes (nombre, area) VALUES ('{$habn}','{$haba}')";

	$query = $mysqli->query($sql);



	//var_dump($query);//$mysqli->insert_id;
	$hab = $mysqli->insert_id;

	if ($query) 
	{
		$sql2 = "INSERT INTO visitantes (cedula, nombre) VALUES ('{$visc}', '{$visn}')";

		$query2 = $mysqli->query($sql2);

		$vis = $mysqli->insert_id;

		if ($query2) 
		{
			$sql3 = "INSERT INTO visitas (fecha_entrada, habitante_id, visitante_id) VALUES (NOW(), {$hab}, {$vis})";

			$query3 = $mysqli->query($sql3);

			if ($query3) 
			{
				$json["result"] = true;
				$json["mensaje"] = "Guardado con exito!";
			}
		}
	}

	echo json_encode($json);

?>