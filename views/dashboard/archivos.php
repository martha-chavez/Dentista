<?php require_once "vistas/parte_superior.php" ?>
<?php print_r($_FILES); ?>

<!--INICIO del cont principal-->
<div class="container">
    <div class="mx-5">
        <form action="archivo.php" method="post" enctype="multipart/form-data" target="_blank">            
            <div class="card border-primary mx-auto mt-5" style="max-width: 100%;">
                <div class="card-body text-primary">
                    <h5 class="card-title">Subir archivo</h5>
                    <!-- <textarea type="text" class="form-control" aria-label="With textarea" id="contenido" placeholder="Escribe tu notificació o recordatorio" autocomplete="off" required></textarea> -->
                </div>
                <div class="card-footer bg-transparent border-primary">
                    <div>
                        <label for="formFileLg" class="form-label">Agregue nuevo archivo</label>
                        <input class="form-control form-control-lg" id="formFileLg" type="file" accept="application/pdf, .doc, .docx, .odf">
                   

                <button class="btn btn-primary m-3 p-2" type="submit" class="btn btn-outline-primary btn-lg">Guardar</button>
                    </div></div>
            </div>
        </form>
    </div>
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php" ?>