<?php
require('include/parte_superior.php');
require 'funcs/conexion.php';
require 'funcs/funcs.php';
$errors = array();

?>

<div class="container">
	<div class="row justify-content-center">
		<div class="card col-xl-8 col-lg-8 col-md-9">
			<div class="card-header bg-info">
				<div class="card-title ">Reg&iacute;strate</div>
				<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="index.php">Iniciar Sesi&oacute;n</a></div>
			</div>

			<div class="card-body">

				<form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">

					<div class="row mb-3">
						<label for="nombre" class="col-sm-2 col-form-label">Nombre : </label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php if (isset($nombre)) echo $nombre; ?>" required>
						</div>
					</div>

					<div id="signupalert" style="display:none" class="alert alert-danger">
						<p>Error:</p>
						que es esto
						<span></span>
					</div>

					<div class="row mb-3">
						<label for="usuario" class="col-sm-2 col-form-label">Usuario : </label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?php if (isset($usuario)) echo $usuario; ?>" required>
						</div>
					</div>


					<div class="row mb-3">
						<label for="password" class="col-sm-2 col-form-label">Password : </label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="password" placeholder="Password" required>
						</div>
					</div>


					<div class="row mb-3">
						<label for="con_password" class="col-sm-2 col-form-label">Confirmar Password : </label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="con_password" placeholder="Confirmar Password" required>
						</div>
					</div>


					<div class="form-group">
						<div class="col-md-offset-3 col-md-9">
							<button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i>Registrar</button>

						</div>
				</form>
				<?php echo resultBlock($errors); ?>
			</div>
		</div>
	</div>



</div>


<?php
require('include/parte_inferior.php');
?>