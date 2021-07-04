// $(document).ready(function () {
listarNotificaciones();
// tablaPersonas = $("#tablaPersonas").DataTable({
//     "columnDefs": [{
//         "targets": -1,
//         "data": null,
//         "defaultContent": "<div class='text-center'><button class='btn btn-primary mx-4 btnEditar'><i class='far fa-edit'></i></button><button class='btn btn-danger btnBorrar'><i class='far fa-trash-alt'></i></button></div>"
//     }],

//     "language": {
//         "lengthMenu": "Mostrar _MENU_ registros",
//         "zeroRecords": "No se encontraron resultados",
//         "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//         "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
//         "infoFiltered": "(filtrado de un total de _MAX_ registros)",
//         "sSearch": "Buscar:",
//         "oPaginate": {
//             "sFirst": "Primero",
//             "sLast": "Último",
//             "sNext": "Siguiente",
//             "sPrevious": "Anterior"
//         },
//         "sProcessing": "Procesando...",
//     }
// });

// $("#btnNuevo").click(function () {
//     $("#formPersonas").trigger("reset");
//     $(".modal-header").css("background-color", "rgb(14 33 48) ");
//     $(".modal-header").css("color", "white");
//     $(".modal-title").text("Nuevo");
//     $("#modalCRUD").modal("show");
//     id = null;
//     opcion = 1; //alta
// });

// var fila; //capturar la fila para editar o borrar el registro

//botón EDITAR     
// $(document).on("click", ".btnEditar", function () {
//     fila = $(this).closest("tr");
//     id = parseInt(fila.find('td:eq(0)').text());
//     nombre = fila.find('td:eq(1)').text();
//     pais = fila.find('td:eq(2)').text();
//     ventas = parseInt(fila.find('td:eq(3)').text());

//     $("#nombre").val(nombre);
//     $("#pais").val(pais);
//     $("#ventas").val(ventas);
//     opcion = 2; //editar

//     $(".modal-header").css("background-color", "#4e73df");
//     $(".modal-header").css("color", "white");
//     $(".modal-title").text("Editar Persona");
//     $("#modalCRUD").modal("show"); 

// });

//botón BORRAR
// $(document).on("click", ".btnBorrar", function () {
//     fila = $(this);
//     id = parseInt($(this).closest("tr").find('td:eq(0)').text());
//     opcion = 3 //borrar
//     var respuesta = confirm("¿Está seguro de eliminar el registro: " + id + "?");
//     if (respuesta) {
//         $.ajax({
//             url: "../../controllers/ventas.php",
//             type: "POST",
//             dataType: "json",
//             data: { opcion: opcion, id: id },
//             success: function () {
//                 tablaPersonas.row(fila.parents('tr')).remove().draw();
//             }
//         });
//     }
// });

// $("#formPersonas").submit(function (e) {
//     e.preventDefault();
//     nombre = $.trim($("#nombre").val());
//     pais = $.trim($("#pais").val());
//     ventas = $.trim($("#ventas").val());

//     let datos = new FormData();
//     datos.append("nombre", nombre);
//     datos.append("pais", pais);
//     datos.append("ventas", ventas);
//     datos.append("id", id);
//     datos.append("opcion", opcion);

//     fetch('../../controllers/ventas.php', {
//         method: 'POST',
//         body: datos
//     }).then(res => res.json())
//         .then((data) => {
//             id = data[0].id;
//             nombre = data[0].nombre;
//             pais = data[0].pais;
//             ventas = data[0].ventas;
//             if (opcion == 1) {
//                 tablaPersonas.row.add([id, nombre, pais, ventas]).draw();
//                 swal("Agregado!", "Se agrego correctamente ", "success");
//             }
//             else {
//                 tablaPersonas.row(fila).data([id, nombre, pais, ventas]).draw();
//             }
//         });
//     $("#modalCRUD").modal("hide");

// });


// Notificaciones
function listarNotificaciones() {

    fetch("../../controllers/dashboard.php")
        .then(response => response.json())
        .then(datos => {
            if (datos.length === 0) {
                var div = document.createElement('div');
                div.innerHTML = '<span class="font-weight-bold dropdown-item d-flex align-items-center" >Sin Notificaciones</span>'
                document.getElementById('not').append(div);

            }
            else {
                datos.forEach(function (cita, index) {
                    document.getElementById("cantidad").innerHTML = cita.cantidad;
                    var div = document.createElement('div');
                    div.setAttribute('id', 'nt' + index)
                    div.innerHTML = '<a class="dropdown-item d-flex align-items-center" href="listarNotificaciones.php">' +
                        '<div class="mr-3">' +
                        ' <div class="icon-circle bg-info" id="warning">' +
                        '<i class="fas fa-tooth"></i>' +
                        '</div>' +
                        '</div>' +
                        '<div>' +
                        '<div class="small text-gray-800" id="fecha">'+cita.nombre+' -' + cita.fecha + '</div>' +
                        '<span class="font-weight-bold" id="notificacion ">' + cita.notificacion + '</span>' +
                        '</div>' +
                        '</a>';
                    document.getElementById('not').append(div);


                })
            }

        });
}


