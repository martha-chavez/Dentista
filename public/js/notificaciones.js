
$(document).ready(function () {
    pacientes();
    let cantidad = document.getElementById('cantidad');
    //Agregar notificaciones
    
    $("#formNotificacion").submit(function (e) {
        e.preventDefault();
        contenido = document.getElementById('contenido');
        fecha = document.getElementById('myLocalDate');
        pas = document.getElementById('pacientes').value;
        id_paciente = pas.split('-');
        // console.log("manda el id" + id[0]);
        let datos = new FormData();
        datos.append("contenido", contenido.value);
        datos.append("fecha", fecha.value);
        datos.append('id_paciente' ,id_paciente[0]);
        datos.append("opcion", 1)

        console.log("manda", fecha.value, contenido.value);
        fetch('../../controllers/notificaciones.php', {
            method: 'POST',
            body: datos
        }).then(res => res.json())
            .then((agregado) => {
                // console.log(agregado, cantidad)
                if (agregado.agregado === 1) {
                    console.log("se agrego");
                    swal("Agregado!", "Se guardo correctamente la notificacion", "success");
                    cantidad.innerHTML = agregado.cantidad;
                    $("#formNotificacion").trigger("reset");

                } else {
                    alert("Oops!", "Tu datos son incorrectos, intenta de nuevo.", "error");
                }

            });
        // location.reload(true); 
    });
  
    function pacientes() {
        var select = document.getElementById('pacientes');

        let datos = new FormData();
        datos.append("opcion", 4);
        fetch('../../controllers/notificaciones.php', {
            method: 'POST',
            body: datos
        }).then(res => res.json())
            .then((datos) => {
                datos.forEach(function (data, index) {
                    id = data.id_paciente;
                    nombre = data.nombre;
                    paterno = data.paterno;
                    materno = data.materno;
                    var option = document.createElement("option"); //Creamos la opcion
                    option.innerHTML =id+"- "+ nombre + " " + paterno; //Metemos el texto en la opción
                    select.appendChild(option);
                    // tablaAdministradores.row.add([id, nombre, usuario]).draw();

                })
        })


    }
// });

})