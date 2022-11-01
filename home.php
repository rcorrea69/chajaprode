<?php
require('include/parte_superior.php');
?>
<br><br>
<!-- <div class="container-fluit">
  <div style="background:#771844 ;">
    <p class="fs-4 m-0 px-4 text-white">
      TuQ Prode
    </p>
  </div>

  <div class="p-4 p-md-5 mb-4 text-white rounded m-0" style="background-image: url('img/fondo.png') ;">
    <div class="row">
      <div class="col-md-10 px-0">
        <h1 class="display-4">Bienvendidos !!!</h1>
        <p class="lead my-3">Chiques. Con la intención de generar un espacio para compartir algo más que nuestra rutina laboral, me permití desarrollar una página para jugar al TuQ prode.</p>

      </div>
      <div class="col-md-2 px-0">
        <img src="img/logo.png" class="img-fluid" alt="...">
      </div>
    </div>
  </div>
</div> -->
<div class="container">
  <!-- <div class="row">
    <div class="col">
      <div class="card text-center">
        <div class="card-body ">
          <p class="text-end mb-1" style="color:#891d51;"><strong>Tus TuQ-Poins :</strong> 1000</p>
          <button type="button" style="background:#891d51" class="btn text-white" id="empezar">
            <h4>¡Empezar a Jugar!</h4>
          </button>
          <a href="https://wa.me/05491123276675?text=Hola%20Quiero%20Mi%20Usuario"><img class="img-fluid w-0.5 p-3" src="img/ws.png"></a>
        </div>
      </div>
    </div>

  </div> -->
  <!-- <br> -->
<div class="card">
    <div class="card-header text-white" style="background:#891d51">
      <p class="fs-4 mb-0">Tutorial De TuQ prode</p>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <p style="color:#891d51;">Opción <strong>Mi Prode</strong> </p>
          <p>Se ingresan los resultados. Luego confirmar los pronósticos</p>
        </div>
        <div class="col-sm-12 col-md-8">
          <img src="img/miprode.png" class="img-fluid" alt="...">
        </div>
      </div>
    </div>
  </div>
  <br>
    <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <p style="color:#891d51;">Opción <strong>Puntuación</strong> </p>
          <p>Se puede ver en cualquier momento el top 10 de los mejores puntuado y también el pronóstico de todos los usuarios registrados</p>
        </div>
        <div class="col-sm-12 col-md-8">
          <img src="img/puntuacion.png " class="img-fluid" alt="...">
        </div>
      </div>
    </div>
  </div>
  <br>
    <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <p style="color:#891d51;">Opción <strong>Tu Juego</strong> </p>
          <p>Muestra un detalle de tus pronósticos. También de fondo celeste aquellos partidos ya jugados y un detalle de los puntos obtenidos </p>
        </div>
        <div class="col-sm-12 col-md-8">
          <img src="img/tujuego.png " class="img-fluid" alt="...">
        </div>
      </div>
    </div>
  </div>
  <br>
    <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <p style="color:#891d51;">Opción <strong>Partidos Cargados</strong> </p>
          <p>Muestra un detalle de los partidos ya cargados. </p>
        </div>
        <div class="col-sm-12 col-md-8">
          <img src="img/partidocargados.png " class="img-fluid" alt="...">
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="card text-left">
    <div class="card">
      <div class="card-header text-white" style="background:#891d51">
        <p class="fs-4 mb-0">Reglamento</p>
      </div>
      <div class="card-body">
        <section>
          <p>Se podrá registrar jugadas hasta el 19/11.
            Una vez registrado la jugada no se podrá modificar. </p>
          <p>Los puntos se acumulan hasta finalizar la fase inicial (48 partidos).</p>
          <p>Solo se puede registrar 1 jugada por usuario.</p>
        </section>
        <section>
          <p><strong>Calculo de Puntos</strong> </p>
          <p>3 pts para los aciertos L, E o V.</p>
          <p>5 pts + en el caso de acertar el resultado del partido</p>
        </section>

        <section>
          <p><strong> Premios</strong> </p>
          <p>El pozo, formado con el aporte de TuQ-point de cada jugador, será repartido de la siguiente manera:</p>
          <p>1er Puesto. 60%</p>
          <p>2do Puesto. 30%</p>
          <p>El 10% restante para el mantenimiento de la página.</p>
        </section>
      </div>
    </div>
  </div>
  
</div>
<br>

<?php
require('include/parte_inferior.php');

?>
<script>
  $('#empezar').click(function(e) {
    e.preventDefault();
    window.location.href = "login.php";

  });
</script>