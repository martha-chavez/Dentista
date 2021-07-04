<?php require_once "vistas/parte_superior.php" ?>

<!--INICIO del cont principal-->
<div class="container">
    <div class="mx-5">
        <form method="POST" id="formNotificacion">
            <div class="container ">
                <h1 class="titulos text-center"> Agendar cita</h1>
                <h5 class="text-primary title">Datos del paciente:</h5>
                <div class="row mt-3">
                    <select class="form-control-lg col-9 mx-3" aria-label="Default select example" id="pacientes">
                        <option selected>Nombre del paciente</option>
                    </select>
                    <a class="btn btn-outline-success btn-lg align-bottom" href=""> Nuevo paciente</a>
                </div>
                <br>
                <h5 class="text-primary title">Datos de la cita:</h5>
                <div class="row mt-3">
                    <textarea type="text" class="form-control-lg mx-3 col-6" aria-label="With textarea" id="contenido" placeholder="Información de la cita.." autocomplete="off" required></textarea>
                </div>
                <br>
                <div class="row mt-3">
                    <h5 class="text-primary title mx-3">Hora y fecha :</h5>
                    <input class="form-control-lg col-3 mx-3" type="datetime-local" id="myLocalDate">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-outline-primary btn-lg align-bottom mx-3 mt-3">Guardar</button>

            
            <!-- <div class="card border-primary mx-auto mt-5" style="max-width: 28rem;">
                <div class="card-body text-primary">
                    <h5 class="card-title">Nueva Notificacion</h5>
                    <textarea type="text" class="form-control" aria-label="With textarea" id="contenido" placeholder="Escribe tu notificació o recordatorio" autocomplete="off" required></textarea>
                </div>
                <div class="card-footer bg-transparent border-primary">
                    <label class="card-text text-primary fw-bold">Fecha</label>
                    <input type="datetime-local" id="myLocalDate">
                </div>

                <button class="btn btn-primary" style="max-width: 28rem;" type="submit" class="btn btn-outline-primary btn-lg">Guardar</button>
            </div> -->
        </form>
    </div>
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php" ?>