<?php
	include_once ("../../main.php");
	include ("../../db.php");

	$sid = $_GET["sid"];
	$sql = "SELECT vs.id as ide, v.nombre as visitante, h.area as lugar, h.nombre as visitado, vs.fecha_entrada as fin, vs.fecha_salida as fout FROM visitas vs
			INNER JOIN habitantes h ON vs.habitante_id = h.id
			INNER JOIN visitantes v ON vs.visitante_id = v.id 
			WHERE vs.id = {$sid}";
	$query = $mysqli->query($sql);

	if ($row = $query->fetch_assoc()) {
?>

<script>
	function salida_set(sid) {
		var fout = $("#fout").val();
		console.log(fout)
		$.ajax({
			url:"<?= $server ?>/api/visita/salida/",
			data:{
				ide:sid,
				fout:fout
			},
			success: function(r) {
				$("#contenido").html(r);
			}
		});
	}
</script>

<div class="container-fluid">
	<div class="row">
		
		<div class="col-md-12">
			<h1>Asignamiento de Salida</h1>
			<form role="form" class = "well">
			<label>Visitante: <?= $row["visitante"] ?></label><br>
			<label>Visitado: <?= $row["visitado"] ?></label><br>
			<label>Lugar: <?= $row["lugar"] ?></label><br>
			<label>Entrada: <?= $row["fin"] ?></label>
			</form>
			<div class = "well">
				Salida: <input value = "<?= date("Y-m-d H:i:s") ?>" id = "fout">
				<button class = "btn btn-success" onclick = "salida_set(<?= $sid ?>)">Okey</button>
			</div>
		</div>


	</div>
</div>

<?php
	} else {
?>

<div class="container-fluid">
	<div class="row">
		
		<div class="col-md-12">
			<h1>Registro no valido.</h1>
		</div>


	</div>
</div>	

<?php
	}
?>