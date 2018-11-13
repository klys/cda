<?php
	include ("../../../db.php");

	$fout = $_GET['fout'];
	$sid = $_GET['ide'];
	$sql = "UPDATE visitas
			SET fecha_salida = '{$fout}'
			WHERE id = {$sid}";

	$query = $mysqli->query($sql);

	if ($query) {
		?>
			<script>
				mensaje_verde("Salida asignada!")
			</script>
		<?php
	} else {
		?>
			<script>
				mensaje_rojo("Ocurrio un error, no se hicieron cambios!")
			</script>
		<?php
	}
?>