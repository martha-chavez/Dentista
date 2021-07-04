MostrarHistorial = $("#MostrarHistorial").DataTable({
    "columnDefs": [{
        "targets": -1,
        "data": null,
        "defaultContent": "<div class='text-center'><button class='btn btn-success mx-4 btnVerPaciente'><i class='far fa-eye'></i></button></div>"
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
Mostrarhis();
//listar MostrarHistorial
function Mostrarhis() {
    let datos = new FormData();
    datos.append("opcion", 1);
    fetch('../../controllers/historial.php', {
        method: 'POST',
        body: datos
    }).then(res => res.json())
        .then((datos) => {
            console.log("DATOS", datos)
            datos.forEach(data => {
                id_paciente = data.id_paciente;
                nombre = data.nombre +' ' +data.paterno +' '+ data.materno;
                telefono = data.telefono;
                MostrarHistorial.row.add([id_paciente, nombre, telefono]).draw();

            });
        });
}

//Mostrar historial
$(document).on("click", ".btnVerPaciente", function () {
    // $("#Historial").trigger("reset");
    // document.getElementById('HistorialPaciente').value = '';
    $("#HistorialPaciente").empty();

    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    let datos = new FormData();
    datos.append("opcion", 2);
    datos.append("id", id);
    nombre = fila.find('td:eq(1)').text();
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Historial de "+nombre);
    $("#Historial").modal("show");


    fetch('../../controllers/historial.php', {
        method: 'POST',
        body: datos
    }).then(res => res.json())
        .then((datos) => {
            console.log("DATOS", datos)
           
            datos.forEach(data => {
                id_paciente = data.id_paciente;
                notificacion = data.notificacion;
                fecha = data.fecha;
                paso = data.paso;
                mensaje = data.mensaje;

               
                // let span ='<span class="badge bg-danger rounded-pill">14</span>';
                var li = document.createElement('li');
                // li.setAttribute('id',  id_paciente)
                li.setAttribute('class', 'list-group-item d-flex justify-content-between align-items-start')
                li.innerHTML = 
                     '<div class="ms-2 me-auto">'+
                           ' <div class="fw-bold">'+ fecha+'</div>'+
                                '<p>'+ notificacion+'</p>'+
                           '</div>'+
                            '<span class="badge bg-'+paso+' rounded-pill">'+mensaje+' </span>';
              
                document.getElementById('HistorialPaciente').append(li);

            });
        });
   


});
$(document).on("click", ".x", function () {
    // $("#Historial").trigger("reset");
    // document.getElementById('Historial').reset();

});