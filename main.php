<?php
	/*
		Control de Acceso
			Configuration File

			Cargar los headers
			Cargar la base de datos

			<?= $server ?>

			<?php
				include ("../../main.php");
			?>

	*/ 
	$server = "http://localhost/cda1/";

?>


		<header>
			<title>Control de Acceso </title>
			<link href="jumbotron-narrow.css" rel="stylesheet">
			<link rel="stylesheet" href="<?= $server ?>css/bootstrap.css">
			<script src="<?= $server ?>js/jquery.min.js"></script>
			<script src="<?= $server ?>js/bootstrap.js"></script>
		</header>

		<script type="text/javascript">
			function mensaje_verde(txt) {
				$.ajax({
					url:"mensajes/verde/",
					type:"GET",
					data:{
						mensaje:txt
					},
					success: function(r) {
						$("#contenido").html(r)
					}
				})
			}

			function mensaje_rojo(txt) {
				$.ajax({
					url:"mensajes/rojo/",
					type:"GET",
					data:{
						mensaje:txt
					},
					success: function(r) {
						$("#contenido").html(r)
					}
				})
			}
		</script>