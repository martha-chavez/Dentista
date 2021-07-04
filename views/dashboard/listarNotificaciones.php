<?php require_once "vistas/parte_superior.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="listarNotificaciones" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Paciente</th>
                            <th>Fecha</th>
                            <th>Notificacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="contenidoNotificacion"> 
                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

    <div class="modal fade" id="modalEditarCita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formCita">
                            <div class="modal-body">
                                <h5 class="text-primary title">Datos del paciente:</h5>
                                <div class="row mt-3">
                                    <input class="form-control-lg col-9 mx-3" type="text" id="nombre" disabled>
                                    <!-- <select class="form-control-lg col-9 mx-3" aria-label="Default select example" id="pacientes">
                                        <option selected>Nombre del paciente</option>
                                    </select> -->
                                    <!-- <a class="btn btn-outline-success btn-lg align-bottom" href=""> Nuevo paciente</a> -->
                                </div>
                                <br>
                                <h5 class="text-primary title">Datos de la cita:</h5>
                                <div class="row mt-3">
                                    <textarea type="text" class="form-control-lg mx-3 " aria-label="With textarea" id="contenido" placeholder="Información de la cita.." autocomplete="off" required></textarea>
                                </div>
                                <br>
                                <div class="row mt-3">
                                    <h5 class="text-primary title mx-3">Hora y fecha :</h5>
                                    <input class="form-control-lg  mx-3" type="datetime-local"   id="myLocalDate">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                                <button type="submit" id="btnGuardar" class="btn btn-outline-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</div>

<?php require_once "vistas/parte_inferior.php" ?>