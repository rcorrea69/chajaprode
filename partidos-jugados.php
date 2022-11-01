<?php
require('include/parte_superior.php');
require('db/conexion.php');
require('include/funciones.php');
$sql = "SELECT * FROM vista_partidos WHERE partido_jugado=1";
$res = mysqli_query($link, $sql);
$cant = mysqli_num_rows($res);

if ($cant > 0) {
?>
    <br>
    <br>

    <div class="container">
        <div class="container-fluit">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Bandera</th>
                                    <th scope="col">Equipo</th>
                                    <th scope="col">Resutado L</th>
                                    <th scope="col">Resutado V</th>
                                    <th scope="col">Bandera</th>
                                    <th scope="col">Equipo</th>
                                    <th scope="col">Grupo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($res)) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id_partido'] ?></th>
                                        <td><?php echo formato_fecha_dd_mm_Y($row['fecha'])  ?></td>
                                        <td><img src="banderas/<?php echo $row['local'] . '.png'; ?>" class="  " style="height:30px ;" alt="25px"></td>
                                        <td><?php echo $row['localnombre'] ?></td>
                                        <td><?php echo $row['res_local'] ?></td>
                                        <td><?php echo $row['res_visitante'] ?></td>
                                        <td><img src="banderas/<?php echo $row['visitante'] . '.png'; ?>" class="  " style="height:30px ;" alt="25px"></td>
                                        <td><?php echo $row['visitantenombre'] ?></td>
                                        <td><?php echo $row['grupo'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <br>
    <br>
    <div class="container">
        <div class="alert alert-danger" role="alert">
        Todavía no hay ningún partido registrado.
        </div>
    </div>

<?php } ?>


<?php
require('include/parte_inferior.php');
mysqli_close($link);
?>