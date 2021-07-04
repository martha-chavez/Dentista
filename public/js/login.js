
let formulario = document.getElementById('login');
let usuario = document.getElementById('usuario');
let password =  document.getElementById('password');
$("#alertNo").hide();

function data() {
    let datos = new FormData();
    datos.append("usuario", usuario.value);
    datos.append("password", password.value);
    console.log("manda",usuario.value,password.value);
    fetch('controllers/login.php',{
        method: 'POST',
        body: datos
    }).then(res => res.json())
    .then(({success}) => {
        if (success === 1) {
            location.href = 'views/dashboard/index.php';
        } else {
            // swal("Oops!", "Tu datos son incorrectos, intenta de nuevo.", "error");
            const alert = 'Tu datos son incorrectos, intenta de nuevo';
            const Speech = new SpeechSynthesisUtterance(alert);
            Speech.volume = 1;
            Speech.rate =1;
            Speech.pitch = 1;
            Speech.lang = 'es-ES';
            window.speechSynthesis.speak(Speech);
        }
    });
    
}
formulario.addEventListener('submit',(e)=>{
    e.preventDefault();

    data();
});

