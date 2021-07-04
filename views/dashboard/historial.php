<?php require_once "vistas/parte_superior.php" ?>
<!--INICIO del cont principal-->
<div class="container ">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="MostrarHistorial" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Ver Historial</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Historial" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-header  ">
                    <h5 class="modal-title"> </h5>
                    <button type="button" id="x" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-content overflow-auto" style="max-width: 100%; max-height: 700px;">
                
                <ol class="list-group list-group-numbered" id="HistorialPaciente">
                    <!-- <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                            Cras justo odio
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li> -->
                    
                </ol>

            </div>
        </div>
    </div>
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php" ?>