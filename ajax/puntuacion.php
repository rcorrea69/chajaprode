<?php
include_once '../db/conexion.php';


$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){

    case 4: ///selecciono todos los Rubros
        $consulta="SELECT `id_usuario`, `usu_usuario`, `puntos` FROM `vista_puntos_jugadores` ORDER BY puntos DESC";    
        
        $res_art = mysqli_query($link, $consulta);
        $data=array();
            while ($row=mysqli_fetch_array($res_art)) {
                        $data[]=array(
                            'id_usuario'=> $row['id_usuario'],
                            'usu_usuario'=> $row['usu_usuario'],
                            'puntos'=> $row['puntos']

                        );    
            };
        break;


}

print json_encode($data, JSON_UNESCAPED_UNICODE);


