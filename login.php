<?php 
session_start();
// require('include/parte_superior.php');


require_once('db/conexion.php');
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Tucu Prode</title>
</head>
<body  class="bg-dark" style="background-image: url('img/fondo.png'); width: 100%; height: 100%; background-repeat: no-repeat;background-size: cover; ">
<!-- class="bg-gradient-primary" -->
<?php

# Verifico si envio un usuario y pin, y si es válido.

$error="";
if (isset($_REQUEST["ingresar"])) {
    if ($_REQUEST["usuario"] == "") {
    $error="Debe ingresar su usuario";
    } else {
    $resalu=mysqli_query($link,"select count(*) as cant from usuarios where usu_usuario='" . $_REQUEST["usuario"] . "'");   
    //die($resalu);
    if ($resalu) {
        $dataalu=mysqli_fetch_array($resalu);
        if ($dataalu[0]==0) {
            $error="El Usuario no existe.";
        } else {
            $res=mysqli_query($link,"select count(*) as cant from usuarios where usu_usuario='" . $_REQUEST["usuario"] . "' and usu_clave='" . $_REQUEST["pass"] . "'");
            if ($res) {
                $data=mysqli_fetch_array($res);
                if ($data[0]==1) {

                    $res=mysqli_query($link,"select id_usuario,usu_usuario,usu_nivel,usu_nombre from usuarios where usu_usuario='" . $_REQUEST["usuario"] . "' and usu_clave='" . $_REQUEST["pass"] . "'");
                    $data=mysqli_fetch_array($res);
                    //session_start();
                    $_SESSION["login"]='OK';
                    $_SESSION['nickname']=$data['usu_usuario'];
                    $_SESSION['nombre']=$data['usu_nombre'];
                    $_SESSION['nivel']=$data['usu_nivel'];
                    $_SESSION['id_usuario']=$data['id_usuario'];
                    ?>
                    <p><script>
                        document.location='pronostico.php';
                    </script>
                    <?php
                    mysqli_close($sql);
                    exit;
                } else {
                    $error="Password incorrecto.";
                }
            } else {
                $error="Error en la consulta a la base de datos: " . mysqli_error($sql);
            }
        }
    } else {
        $error="Error en la consulta a la base de datos: " . mysqli_error($sql);
    }
    }
}
?>

    <br/>
    <br/>
    <br/>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-5 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                    
    
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">TuQ Prode</h1>
                                    </div>
                                    
                                    <form class="user" role="form" name="form1" method="POST" action="login.php" autocomplete="off">
                                        <div class="form-group m-3">
                                                <input type="text" class="form-control form-control-user"
                                                id="usuario" name="usuario" autofocus="autofocus"
                                                placeholder="Nickname">
                                        </div>
                                        <div class="form-group m-3">
                                            
                                            <input type="password" class="form-control form-control-user"
                                                id="pass" name="pass" placeholder="Contraseña">
                                        </div>
                                        <div class="m-3">
                                            <input type="submit" value="Ingresar" name="ingresar" id="ingresar" class="btn btn-primary btn-user btn-block">
                                        </div>
                                        
                                        <hr>
                                    </form>
                                    <?php
                                        if ($error !== "") {

                                            ?>

                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Error! </strong><?php print $error?>

                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                    <?php } ?>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php
    require('include/parte_inferior.php');
?>