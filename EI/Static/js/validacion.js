function validarCorreo() {
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
}