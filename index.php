<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from getbootstrap.com/examples/jumbotron-narrow/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Nov 2015 20:46:40 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<?php include_once ('main.php'); ?>

<script>
  function entrada() {
    if (!$("#entrada").hasClass("active")) $("#entrada").addClass("active");
    if ($("#salida").hasClass("active")) $("#salida").removeClass("active");
    if ($("#visitas").hasClass("active")) $("#visitas").removeClass("active");
    $.ajax({
      url:"archivo/nuevo/",
      data: {},
      success: function(r) {
        $("#contenido").html(r);
      }
    });
  }

  function salida() {
    if ($("#entrada").hasClass("active")) $("#entrada").removeClass("active");
    if (!$("#salida").hasClass("active")) $("#salida").addClass("active");
    if ($("#visitas").hasClass("active")) $("#visitas").removeClass("active");
    $.ajax({
      url:"archivo/pendientes/",
      data: {},
      success: function(r) {
        $("#contenido").html(r);
      }
    });
  }

  function visitas() {
    if ($("#entrada").hasClass("active")) $("#entrada").removeClass("active");
    if ($("#salida").hasClass("active")) $("#salida").removeClass("active");
    if (!$("#visitas").hasClass("active")) $("#visitas").addClass("active");
    $.ajax({
      url:"archivo/visitas/",
      data: {},
      success: function(r) {
        $("#contenido").html(r);
      }
    });
  }

  function salida_form(ide) {
      $.ajax({
        url:"archivo/salida/",
        data:{
          sid:ide
        },
        success: function(r) {
          $("#contenido").html(r)
        }
      });
  }
</script>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" id = "entrada"><a href="javascript:entrada()">Entrada</a></li>
            <li role="presentation" id = "salida"><a href="javascript:salida()">Salida</a></li>
            <li role="presentation" id = "visitas"><a href="javascript:visitas()">Visitas</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Control de Acceso</h3>
      </div>

      <div id = "contenido">
      <div class="jumbotron">
        <h1>Sistema de Control de Acceso</h1>
        <p class="lead">El sistema de control de acceso hecho para controlar el acceso a lugares, exponiendo la hora de entrada y salida, nombre del accesor, lugar al que accede.</p>
      </div>

      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Entrada</h4>
          <p>Esta opcion permite agregar una Entrada a un lugar.</p>

          <h4>Salida</h4>
          <p>Solo se podra acceder a esta opcion si hay entradas y sirve para asignar una salida de una entrada.</p>

          <h4>Visitas</h4>
          <p>Esta opcion muestra todas las visitas.</p>
        </div>

        
      </div>
      </div>
      <footer class="footer">
        <p>&copy; 2017 <a href = "https://klystrumate.com">klystrumate.com</a> </p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>

<!-- Mirrored from getbootstrap.com/examples/jumbotron-narrow/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Nov 2015 20:46:41 GMT -->
</html>
