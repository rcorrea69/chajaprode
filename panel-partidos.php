<?php
require('include/parte_superior.php');
?>


<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table"></i> Partidos
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaPartidos" class="table table-striped table-bordered table-condensed table-sm" style="width:100%">
                            <thead class="text-center thead-dark ">
                                <tr>
                                    <th>id</th>
                                    <th>Fecha</th>
                                    <th>id_L</th>
                                    <th>Equipo L</th>
                                    <th>id_V</th>
                                    <th>Equipo V</th>
                                    <th>Grupo</th>
                                    <th>Carga</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formRubros">
                <div class="modal-body">
                    <div class="form-row">
                        <!-- <div class="form-group col-2">
                            <label for="rubro" class="col-form-label">Rubros:</label>
                            <input type="text" class="form-control" id="rubro">
                        </div> -->
                        <div class="form-group col-12">
                            <label for="nombre" class="col-form-label">Descripción de Rubro:</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require('include/parte_inferior.php');

?>
<script src="js/panel-partidos.js"></script>