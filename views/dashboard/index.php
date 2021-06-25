<?php require_once "vistas/parte_superior.php" ?>
<!--INICIO del cont principal-->
<div class="container ">

    <?php
    // include_once '../../models/coneccion.php';
    // $consulta = "SELECT fecha, nombre, pais, ventas FROM personas";
    // $data = mysqli_query($conexion, $consulta);
    ?>
    <!-- <div class="container d-flex  flex-row-reverse justify-content-end">
        <div class="row">
            <div class="col-3">
                <button id="btnNuevo" type="button" class="btn btn-outline-success btn-lg " data-toggle="modal">Nuevo</button>
            </div>
            
            
        </div>
        <div class="mx-auto " >
                <h3> Citas proximas
                </h3>
            </div>
    </div> -->
   
    <div class="container ">
    <div class="mx-2 text-center ">
        <h1 class="  titulos-Dentista"> Dentista Nombre </h1>
        <h3 class="titulos-Dentista"> Bienvenido </h3>
    </div>
        <div class="row mt-n4">
            <div class="col-lg  ">
                <center>
                    <img src="../../public/img/diente.png" alt="Dentista" class="index">
                </center>
            </div>
        </div>
    </div>

    <!--Modal para CRUD-->
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formPersonas">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre" class="col-form-label">Fecha y hora:</label>
                            <input type="datetime-local" class="form-control" id="fecha-evento">
                        </div>
                        <div class="form-group">
                            <label for="pais" class="col-form-label">Lugar:</label>
                            <input type="text" class="form-control" id="pais">
                        </div>
                        <div class="form-group">
                            <label for="ventas" class="col-form-label">Descripcion del evento:</label>
                            <input type="text" class="form-control" id="ventas">
                        </div>
                        <div class="form-group">
                            <label for="nota" class="col-form-label">Observaciones:</label>
                            <input type="text" class="form-control" id="nota">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-outline-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php" ?>