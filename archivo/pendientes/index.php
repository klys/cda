<?php 
	include ("../../db.php");

	$sql = "SELECT vs.id as ide, v.nombre as visitante, h.area as lugar, h.nombre as visitado, vs.fecha_entrada as fin, vs.fecha_salida as fout FROM visitas vs
			INNER JOIN habitantes h ON vs.habitante_id = h.id
			INNER JOIN visitantes v ON vs.visitante_id = v.id";

	$query = $mysqli->query($sql);
?>

<script>
  function salida_form(ide) {
    $.ajax({
      url:"archivo/salida/",
      data: {
        sid:ide
      },
      success: function(r) {
        $("#contenido").html(r);
      }
    });
  }
</script>

<table class="table table-striped">
  
    <tr>
      <th>
        Visitante
      </th>
      <th>
        Visitado
      </th>
      <th>
        Lugar
      </th>
      <th>
        Entrada
      </th>
      <th>
        Salida
      </th>
    </tr>
  <?php while($row = $query->fetch_assoc()) { 
	  	if ($row['fout'] != "") {
	  		continue;
	  	}
	  	$sid = $row["ide"];
  	?>
  <tr>
  	<td> <?= $row["visitante"] ?></td>
  	<td> <?= $row["visitado"] ?></td>
    <td> <?= $row["lugar"] ?></td>
    <td> <?= $row["fin"] ?></td>
    <td> <button class = 'btn btn-danger' onclick = 'salida_form(<?= $sid ?>)'>Asignar</button></td>
  </tr>
  <?php } ?>
  
</table>