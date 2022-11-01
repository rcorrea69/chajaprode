<?php
require('include/parte_superior.php');
require('db/conexion.php');
require('modal/Modal-alta-usuario.php');
?>
<br><br>
<div class="container">
    <div class="container-fluit">
        <div class="card mb-3">
            <div class="card-header bg-gradient-light">
                <div class="btn-group float-right">

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-alta-usuarios">
                        Nuevo Usuario
                    </button>
                </div>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-sm" id="dataUsuario" name="dataUsuario" width="100%" cellpadding="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Código</th>
                                <th>Usuario</th>
                                <th>Password</th>
                                <th>Nombres</th>
                                <th>Fecha de Alta</th>
                                <th>clave</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sql = "SELECT  * FROM usuarios";
                            $res_cli = mysqli_query($link, $sql);
                            while ($reg_cli = mysqli_fetch_array($res_cli)) {
                            ?>

                                <tr class="odd gradeX">
                                    <td><?php echo $reg_cli["id_usuario"]; ?></td>
                                    <td><?php echo $reg_cli["usu_usuario"]; ?></td>
                                    <td><?php echo $reg_cli["usu_clave"]; ?></td>
                                    <td><?php echo $reg_cli["usu_nombre"]; ?></td>
                                    <td><?php echo $reg_cli["usu_fecha_alta"]; ?></td>
                                    <td><div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='bi bi-eye'></i></button></div></div></td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">
            </div>
        </div> <!-- card -->

    </div>

</div>


<?php
require('include/parte_inferior.php');

?>
<script src="js/panel-usuarios.js"></script>