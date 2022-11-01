<?php 
require("validar_session.php");
require("db/conexion.php");
$usuario=$_SESSION['id_usuario'];//aca va el usuario
$jugada = json_decode($_POST['jugada'], true);


        ////////grabo detalle de ventas//////////////////////////////////////
        foreach ($jugada as $key => $val) {
            $usuario = $usuario;
            $partido = $jugada[$key]['partido'];
            $equipolocal = $jugada[$key]['equipolocal'];
            $equipovisitante = $jugada[$key]['equipovisitante'];
            $resultadolocal = $jugada[$key]['resultadolocal'];
            $resultadovisitante = $jugada[$key]['resultadovisitante'];


            $sql="INSERT INTO `jugadas`( `usuario`,`partido`, `equipo_local`, `equipo_visitante`, `resultado_local`, `resultado_visitante`) 
            VALUES ($usuario,$partido,$equipolocal,$equipovisitante,$resultadolocal,$resultadovisitante)";
            //  die($sql) ;
            $ejectuto = mysqli_query($link, $sql);
            
 
    }
    $sqljugo="UPDATE `usuarios` SET `jugo`=1 WHERE `id_usuario`=$usuario";
    $ejecut = mysqli_query($link, $sqljugo);
    mysqli_close($link);
    // die($sql) ;
?>