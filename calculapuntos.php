<?php 
require('db/conexion.php');
print_r($_POST);
//////////variables de puntuacion///////////////

$puntosPorAcierto=3;
$puntosPorIgualGoles=5;



$partido=$_POST['partido'];
$reslocal=$_POST['local'];
$resvisitante=$_POST['visitante'];

function gana($local,$visitante){
    if($local >$visitante){
        $resultado="L";

    }elseif($local == $visitante){
        $resultado="E";
    } else {
        $resultado="V";
    }
    return $resultado;
}





$resPartido=gana($reslocal,$resvisitante);
// echo "el resultado es  " .$resPartido ."<br>";

$sql="SELECT usuario,partido,equipo_local,equipo_visitante,resultado_local,resultado_visitante FROM jugadas WHERE partido=$partido";
$res = mysqli_query($link, $sql);
while ($row = mysqli_fetch_array($res)) {

    $puntos=0;
    $jugador=$row['usuario'];
    $apuestaL=$row['resultado_local'];
    $apuestaV=$row['resultado_visitante'];

    $resApuesta=gana($apuestaL,$apuestaV);
    // echo "apostado " .$resApuesta ."<br>";
    // echo "el resultado es  " .$resPartido ."<br>";

    if($resPartido==$resApuesta){
        // echo"entre por resultado y apuesta iguales";
        $puntos=$puntos + $puntosPorAcierto;
        if($apuestaL==$reslocal and $apuestaV==$resvisitante){
            $puntos=$puntos+$puntosPorIgualGoles;
        }
    }

    $sqlpuntos="UPDATE jugadas SET puntos=$puntos WHERE partido=$partido AND usuario=$jugador";
    $ejecuto = mysqli_query($link, $sqlpuntos);
    echo "puntos para usuario $jugador : ".$puntos."<br>";
}

$sqljugada="UPDATE partidos SET partido_jugado=1, res_local=$reslocal, res_visitante=$resvisitante  WHERE id_partido=$partido";
$ejecuto = mysqli_query($link, $sqljugada);


header("Location: panel-partidos.php");
?>