<?php require 'validar_session.php';
require('db/conexion.php');
$sqltuqpoint = "SELECT SUM(`tuqpoint`)as tuqpoint FROM `usuarios`";
$res = mysqli_query($link, $sqltuqpoint);
$row = mysqli_fetch_array($res);
$totaltuqpoint = $row['tuqpoint'];
// die($sqltuqpoint);


?>
<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- <script src="vendor/sweeatAlert2/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="vendor/sweeatAlert2/sweetalert2.min.css"> -->
    <link rel="shortcut icon" type="image/png" href="img/pelota.png" > 
    <title>TuQ Prode</title>

    <!-- .bg-dark.bg-gradient -->
    <!-- <nav class="navbar navbar-expand-lg  navbar-dark bg-dark bg-s fixed-top"> -->
    <nav class="navbar navbar-expand-lg  navbar-dark bg-s fixed-top" style="background: #771844 ;">    
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">TuQ Prode</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- para el usuario administrador -->
                    <?php if ($_SESSION['nivel'] <> 2) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Administración
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="panel-usuarios.php">Usuarios</a></li>
                                <?php if ($_SESSION['nivel'] == 3) { ?>
                                <li><a class="dropdown-item" href="panel-partidos.php">Carga de Resultados</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link" href="pronostico.php">Mi Prode</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="partidos-jugados.php">Partidos Cargados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="puntuacion.php">Puntuación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tu-jugada.php">Tu Juego</a>
                    </li>

                    <button type="button" class="btn btn-primary position-relative mx-3">
                        TuQ-point Acumulado : <?php echo $totaltuqpoint; ?>
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">TuQ-point Acumulado : <?php echo $totaltuqpoint; ?></span>
                        </span>
                    </button>

                </ul>


                <div class="d-flex ms-3">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['nickname'] ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                            <li><a class="dropdown-item" href="logout.php">Cerrar Session</a></li>

                        </ul>
                    </div>

                </div>
                
            </div>
        </div>
    </nav>

</head>

<body>
    <br>
    <br>