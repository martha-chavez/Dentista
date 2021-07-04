// (document).ready(function () {
listarNotificaciones = $("#listarNotificaciones").DataTable({
    "columnDefs": [{
        "targets": -1,
        "data": null,
        "defaultContent": "<div class='text-center'><button class='btn btn-primary mx-4 btnEditarCita'><i class='far fa-edit'></i></button><button class='btn btn-danger btnBorrarCita'><i class='far fa-trash-alt'></i></button></div>"
    }],

    "language": {
        "lengthMenu": "Mostrar _MENU_ notificaciones",
        "zeroRecords": "No se encontraron resultados",
        "info": "Mostrando notificaciones del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando notificaciones del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "sProcessing": "Procesando...",
    }
});
listarnotificaciones();
//listar administradores
function listarnotificaciones() {
    let datos = new FormData();
    datos.append("opcion", 2);
    fetch('../../controllers/notificaciones.php', {
        method: 'POST',
        body: datos
    }).then(res => res.json())
        .then((datos) => {
            // console.log("DATOS", datos)
            datos.forEach(data => {

                id = data.id_notificacion;
                fecha = data.fecha;
                notificacion = data.notificacion;
                nombre = data.nombre;
                listarNotificaciones.row.add([id, nombre, fecha, notificacion]).draw();

            });
        });
}

//Borrar
$(document).on("click", ".btnBorrarCita", function () {
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    let datos = new FormData();
    datos.append("opcion", 3)
    datos.append("id", id)
    var respuesta = confirm("¿Está seguro de eliminar el notificacion: " + id + "?");
    if (respuesta) {
        fetch('../../controllers/notificaciones.php', {
            method: 'POST',
            body: datos
        }).then(res => res.json())
            .then((datos) => {
                datos.forEach(data => {
                    id = data.id_notificacion;
                    fecha = data.fecha;
                    notificacion = data.notificacion;
                    nombre = data.nombre;
                    listarNotificaciones.row.add([id, nombre, fecha, notificacion]).draw();

                });
            });
    }
    location.reload(true);
});

//Editar
$(document).on("click", ".btnEditarCita", function () {
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    fecha =  fila.find('td:eq(2)').text();
    notificacion = fila.find('td:eq(3)').text();
    fecha = fecha.replace(' ', 'T')
    $("#id").val(id);
    $("#nombre").val(nombre);
    $("#myLocalDate").val(fecha);
    $("#contenido").val(notificacion);
    opcion = 5; //editar
    console.log('llega ' +fecha );

    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Cita");
    $("#modalEditarCita").modal("show");

});


$("#formCita").submit(function (e) {
    e.preventDefault();
    nombre = $.trim($("#nombre").val());
    fecha = $.trim($("#myLocalDate").val());
    notificacion = $.trim($("#contenido").val());

    let datos = new FormData();
    datos.append("nombre", nombre);
    datos.append("fecha", fecha);
    datos.append("notificacion", notificacion);
    datos.append("id", id);
    datos.append("opcion", opcion);

    fetch('../../controllers/notificaciones.php', {
        method: 'POST',
        body: datos
    }).then(res => res.json())
        .then((data) => {
            console.log(data);
            id = data[0].id_notificacion;
            fecha = data[0].fecha;
            notificacion = data[0].notificacion;
            nombre = data[0].nombre;
            
            listarNotificaciones.row(fila).data([id, nombre, fecha, notificacion]).draw();
           
        });
    $("#modalEditarCita").modal("hide");

});

// })