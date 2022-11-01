<?php
require('include/parte_superior.php');
require('db/conexion.php');

$sql = "SELECT `id_usuario`, `usu_usuario`, `puntos` FROM `vista_puntos_jugadores` ORDER BY puntos DESC LIMIT 10";
$res = mysqli_query($link, $sql);

?>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                        <thead class="text-white" style="background:#771844 ;">
                            <tr class="colspan-2"><h5> Top 10</h5tyle=></tr>
                            <tr>
                                <th scope="col">Nickname</th>
                                <th scope="col">Puntos</th>

                            </tr>
                        </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($res)) { ?>
                                    <tr>
                                        <td><?php echo $row['usu_usuario']; ?></td>
                                        <td><?php echo $row['puntos']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white bg-gradient" style="background:#771844 ;">
                    <h5>Puntuación de Todos los Usuarios</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaPuntuacion" class="table table-striped table-bordered table-condensed table-sm" style="width:100%">
                            <thead class="text-center thead-dark ">
                                <tr>
                                    <th>id</th>
                                    <th>Usuario</th>
                                    <th>Puntos</th>
                                    <th>Ver jugada</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>
<br>
<br>


<?php
require('include/parte_inferior.php');
mysqli_close($link);
?>
<script src="js/puntuacion.js"></script>