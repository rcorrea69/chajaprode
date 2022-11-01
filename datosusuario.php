<?php
require('include/parte_superior.php');
require('db/conexion.php');
$usuario = $_GET['usuario'];
$sql = "SELECT * FROM usuarios WHERE id_usuario=$usuario";
$res = mysqli_query($link, $sql);
$row = mysqli_fetch_array($res);



?>

<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-md-12 col-lg-6" >
            <div class="card">
                <h5 class="card-header text-white" style="background: #891d51;">TuQ Prode</h5>
                <div class="card-body">
                    <h5 class="card-title">Alta de Usuario</h5>
                    <p class="card-text mb-0">Nombres : <strong><?php echo  $row['usu_nombre']; ?></strong> </p>
                    <p class="card-text mb-0">Nickname : <strong><?php echo $row['usu_usuario']; ?></strong></p>
                    <p class="card-text">Contraseña : <strong><?php echo $row['usu_clave']; ?></strong> </p>
                    <a href="https://tuqprode.mpcargentina.net/login.php" class="btn btn-primary">Ir al Juego</a>
                </div>
            </div>
        </div>
    </div>


</div>


<?php
require('include/parte_inferior.php');
mysqli_close($link);
?>