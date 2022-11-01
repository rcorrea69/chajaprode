<?php
require_once("include/parte_superior.php");
require_once("include/funciones.php");
require("db/conexion.php");

$usu=$_SESSION['id_usuario'];
$sqljugo="SELECT  `jugo` FROM `usuarios` WHERE `id_usuario`=$usu";
$resjugo=mysqli_query($link,$sqljugo);
$rowj=mysqli_fetch_array($resjugo);

$yajugo=$rowj['jugo'];
if ($yajugo==0){


?>

<div class="container" style="font-size:0.8rem ;">
    <br>
    <h3>TuQ Prode</h3>
    <?php
    $bandera = 0;
    $sqlGrupo = "SELECT * FROM grupos";
    $resgrupo = mysqli_query($link, $sqlGrupo);

    while ($rowgrupo = mysqli_fetch_array($resgrupo)) {

        $grupo = $rowgrupo['grupo'];
        $bandera = $bandera + 1;

        if ($bandera == 1) {
            echo "<div class='row'>";
        }
    ?>

        <div class="col-md-6 mt-3">
            <div class="card ">
                <div class="card-header text-white fs-6" style="background:#771844 ;" >
                    Grupo <?php echo $grupo; ?>
                </div>
                <div class="card-body">
                    <?php
                    $sql = "SELECT * FROM vista_partidos WHERE grupo='" . $grupo . "'";
                    $res = mysqli_query($link, $sql);
                    ?>
                    <?php while ($row = mysqli_fetch_array($res)) { ?>
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <input type="hidden" id='partido<?php echo $row['id_partido']; ?>' value="<?php echo $row['id_partido']; ?>">
                                        <input type="hidden" id='equipolocal<?php echo $row['id_partido']; ?>' value="<?php echo $row['local']; ?>">
                                        <input type="hidden" id='equipovisitante<?php echo $row['id_partido']; ?>' value="<?php echo $row['visitante']; ?>">
                                        <td style="width:30px ;" class="d-none d-lg-block mt-1 pt-1"><?php echo $row['id_partido']; ?> </td>
                                        <td class="mx-3"><?php echo substr(formato_fecha_dd_mm_Y($row['fecha']), 0, 5); ?> </td>
                                        <td>
                                            <img src="banderas/<?php echo $row['local'] . '.png'; ?>" class="  " style="height:30px ;" alt="25px">
                                        </td>
                                        <td style="width:100px ;"><?php echo $row['localnombre'] ?></td>
                                        <td><input type="number" class="form-control form-control-sm" min="0" id="local<?php echo $row['id_partido']; ?>" style=" width:48px;"></td>
                                        <td> - </td>
                                        <td><input type="number" class="form-control form-control-sm" min="0" id="visitante<?php echo $row['id_partido']; ?>" style="width:48px;"></td>
                                        <td><img src="banderas/<?php echo $row['visitante'] . '.png'; ?> " style="height:30px "></td>
                                        <td><?php echo $row['visitantenombre'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    <?php } ?>

                </div>

            </div>
        </div>

        <?php
        if ($bandera == 1) {
        } else {
            echo "</div>";
            $bandera = 0;
        }
        ?>


    <?php } ?>

    <!-- <button id="ejecuto">Confirmar tu Pronostico</button>
    <button id="ejecuto" class="btn btn-primary btn-lg">Confirmar tu Pronostico</button> -->
    <br>
    <div class="row">
        <div class="col-12 md-12">
            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg" id="ejecuto" type="button">Confirmar tu Pronostico</button>
            </div>
        </div>
    </div>

    

    <div class="modal" id="procesando" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <img src="img/procesando.gif" class="rounded" alt="...">
                        <h3><p>Procesando ......</p></h3>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div>
<br>

<!-- Fin del contenido Principal -->
<?php }else{
    
?>
<script>
    window.location.replace("tu-jugada.php");
</script>
<!-- <br>
<br>
<div class="container">
    <div class="alert alert-success" role="alert">
    Ya Esta registrado su Pronostico. Para ver tu jugada hace click <a href="tu-jugada.php">Tu Juego</a>
    </div>
</div> -->
<?php
} 
?>

<?php require_once("include/parte_inferior.php"); ?>
<script>
    $(document).ready(function () {
    function ver() {
        $("#ejecuto").prop('disabled', true);
        // $("#procesando").modal("show");
        objpartido = {};
        var linea = new Array();
        for (i = 1; i < 49; i++) {
            // console.log('partido' + i)  49;

            let partido = parseInt($('#partido' + i).val());
            let equipolocal = parseInt($('#equipolocal' + i).val());
            let equipovisitante = parseInt($('#equipovisitante' + i).val());
            let local = parseInt($('#local' + i).val());
            let visitante = parseInt($('#visitante' + i).val());

            if (isNaN(local)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Upps...',
                    text: 'Ingresar un resultado Valido en el partido ' + partido + ' Local'
                })
                $("#ejecuto").prop('disabled', false);
                return;
            }

            if (isNaN(visitante)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Upps...',
                    text: 'Ingresar un resultado Valido en el partido ' + partido + ' Visitante'
                })
                $("#ejecuto").prop('disabled', false);
                return;
            }

            objpartido = {
                partido: partido,
                equipolocal: equipolocal,
                equipovisitante: equipovisitante,
                resultadolocal: local,
                resultadovisitante: visitante
            }

            linea.push(objpartido);

        }

        let jugada = JSON.stringify(linea);
        $.ajax({
            type: "POST",
            url: "procesajugada.php",
            data: {
                jugada: jugada
            },
            // dataType: "dataType",
            beforeSend: function(objeto) {
                $("#procesando").modal("show");
            },
            success: function(response) {
                $("#procesando").modal("hide");
                window.location.href = "tu-jugada.php";
            }
        });

    }

    $('#ejecuto').click(function(e) {
        e.preventDefault();
        ver();

    });
});
</script>