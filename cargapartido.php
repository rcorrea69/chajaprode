<?php
    require('include/parte_superior.php');
    require("db/conexion.php");
    require_once("include/funciones.php");
    
    $partido=$_GET['partido'];
?>
    <br>
    <br>
    <div class="container">
        <div class="card text-left">
         
          <div class="card-body">
            <h4 class="card-title">Carga de resultado de partido</h4>
           
                    <?php
                    $sql = "SELECT * FROM vista_partidos WHERE id_partido=$partido";
                    $res = mysqli_query($link, $sql);
                    ?>
                    <?php while ($row = mysqli_fetch_array($res)) { ?>
                        <table>
                            <tbody>
                                <form action="calculapuntos.php" method="POST">
                                <tr>
                                    <input type="hidden" id='partido<?php echo $row['id_partido'];  ?>' name="partido" value="<?php echo $row['id_partido']; ?>">
                                    <input type="hidden" id='equipolocal<?php echo $row['id_partido']; ?>' value="<?php echo $row['local']; ?>">
                                    <input type="hidden" id='equipovisitante<?php echo $row['id_partido']; ?>' value="<?php echo $row['visitante']; ?>">
                                    <!-- <td style="width:30px ;"><?php echo $row['id_partido'] ; ?> </td> -->
                                    <td class="mx-3"><?php echo substr(formato_fecha_dd_mm_Y($row['fecha']),0,5)  ; ?> </td>                                  
                                    
                                    <td>
                                        <img src="banderas/<?php echo $row['local'] . '.png'; ?>" class="  " style="height:30px ;" alt="25px">
                                    </td>
                                    <td style="width:100px ;"><?php echo $row['localnombre'] ?></td>
                                    <td><input type="number" class="form-control form-control-sm" min="0" id="local<?php echo $row['id_partido']; ?>" name="local" style=" width:48px;"></td>
                                    <td> - </td>
                                    <td><input type="number" class="form-control form-control-sm" min="0" id="visitante<?php echo $row['id_partido']; ?>" name="visitante" style="width:48px;"></td>
                                    <td><img src="banderas/<?php echo $row['visitante'] . '.png'; ?> " style="height:30px "></td>
                                    <td><?php echo $row['visitantenombre'] ?></td>
                                    <td> <button  type="submit" class="btn btn-primary" id="carga" name="carga">Cargar</button> </td>
                                </tr>
                                </form>
                            </tbody>
                        </table>
                    <?php } ?>

             
          </div>
        </div>

    </div>


<?php
    require('include/parte_inferior.php');
    mysqli_close($link);
?>
