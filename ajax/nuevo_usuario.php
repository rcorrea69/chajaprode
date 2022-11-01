<?php
require_once("../db/conexion.php");
require_once("../include/funciones.php");

function passaleatorio()
{
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $longpalabra = 8;
    for ($pass = '', $n = strlen($caracteres) - 1; strlen($pass) < $longpalabra;) {
        $x = rand(0, $n);
        $pass .= $caracteres[$x];
    }
    return $pass;
}
//require_once("./include/funciones.php");
//require_once('./db/conexion.php');
//global $link;
$nombres = $_POST['nombres'];
$usuario = $_POST['usu'];
$responsable =$_POST['responsable'];
$pass = passaleatorio();

$fecha = formato_fecha_Y_mm_dd(hoy());

$tuqpoint = 1000;
$jugo = 0;

$sqlnick = "SELECT usu_usuario FROM usuarios WHERE usu_usuario='" . $usuario . "'";
$resnick = mysqli_query($link, $sqlnick);
$conta = mysqli_num_rows($resnick);
//die("trado de consulta ".$conta);
if ($conta == 0) {
    $sql = "INSERT INTO usuarios (usu_usuario,usu_clave,usu_nombre,usu_nivel,usu_fecha_alta,tuqpoint,jugo,responsable) 
    VALUES('" . $usuario . "','" . $pass . "','" . $nombres . "',2,'" . $fecha . "',$tuqpoint,$jugo,$responsable)";
    //die($sql);
    $res = mysqli_query($link, $sql);
    $row = mysqli_affected_rows($link);

    if ($row < 0) {
?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Error!</strong>
            <?php
            echo "Algo salío mal. No se Ingreso el Nuevo Unidad";
            ?>
        </div>

    <?php


    } else {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>¡Bien hecho!</strong>
            <?php

            echo "Se dió de Alta Correctamente";

            ?>
        </div>
    <?php
    }
} else {
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Error!</strong>
        <?php
        echo "El nick name ya existe";
        ?>
    </div>

<?php

}






?>