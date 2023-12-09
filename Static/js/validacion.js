// validaciones.js

function validarCorreo() {
    var cor = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var conCo = document.getElementById("correo");
    var errorCor = document.getElementById("errorCor");
    var corValida = cor.test(conCo.value.trim());

    if (conCo.value.trim() === "") {
        errorCor.innerHTML = "El correo no puede estar vacío";
        errorCor.style.display = "block";
        return false;
    } else if (!corValida) {
        errorCor.innerHTML = "Formato de correo electrónico no válido";
        errorCor.style.display = "block";
        return false;
    } else {
        errorCor.style.display = "none";
        return true;
    }
}

function validarPass() {
    var paswo = /^[A-Za-z0-9#&@]{4,8}$/;
    var conPa = document.getElementById("password");
    var errorPas = document.getElementById("errorPas");
    var paswoValida = paswo.test(conPa.value.trim());

    if (!conPa.value.trim()) {
        errorPas.innerHTML = "La contraseña no puede estar vacía";
        errorPas.style.display = "block";
        return false;
    } else if (!paswoValida) {
        errorPas.innerHTML = "La contraseña debe tener de 4 a 8 caracteres y solo puede contener números, letras, # y @. No se permiten puntos ni guiones bajos.";
        errorPas.style.display = "block";
        return false;
    } else {
        errorPas.style.display = "none";
        return true;
    }
}

function validarCampos() {
    var resCor = validarCorreo();
    var resPas = validarPass();
    var Envi = document.getElementById("btnEnviar");

    if (resCor && resPas) {
        Envi.style.display = "block";
    } else {
        Envi.style.display = "none";
        alert("Por favor, completa los campos correctamente antes de enviar.");
    }
}


/*function validarCorreo() {
    var cor =/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]{3,14}$/;

    var conCo = document.getElementById("correo");
    var errorCor = document.getElementById("errorCor");
    var corValida = cor.test(conCo.value.trim());

    if (corValida) { 
        errorCor.style.display = "none";
        return true;
    } else {
        errorCor.style.display = "block";
        conCo.focus();
        return false;
    }
}

function validarPass() {
    var paswo = /^[A-Za-z0-9#&@]{3,14}$/;
    
    var conPa = document.getElementById("password");
    var errorPas = document.getElementById("errorPas");
    var paswoValida = paswo.test(conPa.value);

    if (paswoValida) { 
        errorPas.style.display = "none";
        return true;
    } else {
        errorPas.style.display = "block";
        conPa.focus();
        return false;
    }
}
function validarCampos(){
    var resCor = validarCorreo();
    var resPas = validarPass();
    var Envi = document.getElementById("btnEnviar");

    if (resCor && resPas) {
        Envi.style.display = "block";
    } else {
        Envi.style.display = "none";
    }
}
function validaEnviar() {
    
    var form = document.getElementById("formulario");
    form.submit();
}*/