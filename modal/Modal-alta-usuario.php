


<!-- Modal -->
<div class="modal fade" id="Modal-alta-usuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary bg-gradient">
                <h5 class="modal-title" id="exampleModalLabel">Formulario de Alta de Usuarios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmUsuario" name="frmUsuario" autocomplete="off">
                    <div id="resultados_ajax"></div>
                    <div id="loader"></div>
                    <div class="form-group">
                        <label for="nombres" class="control-label">Apellidos y Nombres</label>
                        <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres" required autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label for="usuario" class="control-label">Nickname</label>
                        <input type="text" class="form-control" name="usu" id="usu" placeholder="Usuario" required autocomplete="off" />
                    </div>
                    <input type="hidden" class="form-control" name="responsable" id="responsable" value="<?php echo $_SESSION['id_usuario']; ?>"  />
                    <!-- <div class="form-group">
                        <label for="Password" class="control-label">Contraseñas</label>
                        <input type="password" class="form-control" name="Pass" id="Pass" placeholder="Contraseña" required autocomplete="off" />
                    </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="guardar_datos">Grabar</button>
                </form>
            </div>
        </div>
    </div>
</div>