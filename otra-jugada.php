<?php
require('include/parte_superior.php');
require('db/conexion.php');

$usuario = $_GET['usuario'];


$sql = "SELECT `id_jugada`,`usuario`,`partido`,`equipo_local`,`equipo_visitante`,`resultado_local`,`resultado_visitante`,`puntos`, (SELECT equipos.equipo FROM equipos WHERE equipos.id=jugadas.equipo_local) as equipoL, 
(SELECT equipos.equipo FROM equipos WHERE equipos.id=jugadas.equipo_visitante) as equipoV, 
(SELECT partidos.res_local FROM partidos WHERE partidos.id_partido=jugadas.partido) as resultadoL, 
(SELECT partidos.res_visitante FROM partidos WHERE partidos.id_partido=jugadas.partido) as resultadoV,
(SELECT partidos.partido_jugado FROM partidos WHERE partidos.id_partido=jugadas.partido) as partido_jugado
FROM jugadas 
WHERE usuario=$usuario";
$res = mysqli_query($link, $sql);
$cant = mysqli_num_rows($res);

if ($cant > 0) {

$sqlpuntos = "SELECT SUM(`puntos`) as puntos FROM `jugadas` WHERE usuario=$usuario";
$resul = mysqli_query($link, $sqlpuntos);
$rowpuntos = mysqli_fetch_array($resul);
$puntos = $rowpuntos['puntos'];

$sqlusu = "SELECT `usu_usuario` FROM `usuarios` WHERE `id_usuario`=$usuario";
$reusu = mysqli_query($link, $sqlusu);
$rowusu = mysqli_fetch_array($reusu);
$nickusu = $rowusu['usu_usuario'];

?>
<br>
<br>
<div class="container">
    <div class="card">
        <div class="card-body">

            <div class="d-flex mb-3">
        
                <div class="me-auto p-2"><h3>Usuario : <?php echo $nickusu; ?></h3> </div>
                <div class="p-2"><h3>Total Puntos : <?php echo $puntos; ?></h3> </div>
                
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th colspan="7" class="p-3 mb-2 bg-secondary text-white">Mis Pronosticos</th>
                            <th colspan="3" class="p-3 mb-2 bg-dark text-white">Resultados Cargados</th>
                        </tr>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col"></th>
                            <th scope="col">Equipo</th>
                            <th scope="col">L</th>
                            <th scope="col">V</th>
                            <th scope="col"></th>
                            <th scope="col">Equipo</th>
                            <th scope="col">L</th>
                            <th scope="col">V</th>
                            <th scope="col">Pts</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($res)) { ?>
                            <?php
                            $miclase = "";
                            if ($row['partido_jugado'] == 1) {
                                $miclase = "bg-info bg-gradient";
                            }

                            ?>
                            <tr class="<?php echo $miclase; ?>">
                                <th scope="row"><?php echo $row['partido'] ?></th>
                                <td><img src="banderas/<?php echo $row['equipo_local'] . '.png'; ?>" class="  " style="height:30px ;" alt="25px"></td>
                                <td><?php echo $row['equipoL'] ?></td>
                                <td><?php echo $row['resultado_local'] ?></td>
                                <td><?php echo $row['resultado_visitante'] ?></td>
                                <td><img src="banderas/<?php echo $row['equipo_visitante'] . '.png'; ?>" class="  " style="height:30px ;" alt="25px"></td>
                                <td><?php echo $row['equipoV'] ?></td>
                                <td><?php echo $row['resultadoL'] ?></td>
                                <td><?php echo $row['resultadoV'] ?></td>
                                <td><?php echo $row['puntos'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


</div>
<br>
<?php } else { ?>
    <br>
    <br>
    
    <div class="container">
        <div class="alert alert-danger" role="alert">
           Todavía no hay registro de su Juego.
        </div>
    </div>
<?php } ?>

<?php
require('include/parte_inferior.php');
mysqli_close($link);
?>