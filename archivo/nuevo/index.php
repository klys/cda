<?php
	include_once ("../../main.php");
?>

<script>
	function guardar() {
		var habn = $("#hab-nombre").val();
		var haba = $("#hab-area").val();
		var visn = $("#vis-nombre").val();
		var visc = $("#vis-cedula").val();

		if ((habn == "") || (haba == "") || (visn == "") || (visc == "")) {
			alert("Todos los campos son obligatorios y deben ser validos.")
			return;
		}

		$.ajax({
			url:"<?= $server ?>/api/visita/nueva/",
			data: {
				habn:habn,
				haba:haba,
				visn:visn,
				visc:visc
			},
			success: function(r) {
				var json = JSON.parse(r);
				if (json.result == true) {
					mensaje_verde(json.mensaje)
				} else {
					mensaje_rojo(json.mensaje)
				}
			} // function success
		})
	}

	function restablecer() {
		$("#hab-nombre").val("")
		$("#hab-area").val("")
		$("#vis-nombre").val("")
		$("#vis-cedula").val("")
	}

	function cancelar() {
		location.reload();
	}
</script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		<h1 style = "color:blue;">Nueva Visita</h1>
			<form role="form" class = "well">
				<h3 style = "color:red;">A quien visita?</h3>

				<div class="form-group">
					 
					<label for="hab-nombre">
						Nombre
					</label>
					<input type="text" class="form-control" id="hab-nombre" />
				</div>

				<div class="form-group">
					 
					<label for="hab-area">
						Area
					</label>
					<input type="text" class="form-control" id="hab-area" />
				</div>
				
				
			</form>

			<form role="form" class = "well">
				<h3 style = "color:red;">Quien es el visitante?</h3>

				<div class="form-group">
					 
					<label for="vis-nombre">
						Nombre
					</label>
					<input type="text" class="form-control" id="vis-nombre" />
				</div>

				<div class="form-group">
					 
					<label for="vis-cedula">
						Cedula
					</label>
					<input type="number" class="form-control" id="vis-cedula"/>
				</div>
				
				
			</form>

				<button type="´button" onclick = "guardar()" class="btn btn-success">
					Guardar
				</button>
				<button type="´button" onclick = "restablecer()" class="btn btn-warning">
					Restablecer
				</button>
				<button type="´button" onclick = "cancelar()" class="btn btn-danger">
					Cancelar
				</button>
		</div>
	</div>
</div>