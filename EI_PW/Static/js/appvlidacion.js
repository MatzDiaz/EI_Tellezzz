
function validarNombre() {
    var no = /^[A-Za-z0-9#&@]{4,8}$/;
    var nomS = document.getElementById("nombreS");
    var nom = document.getElementById("nom");
    var nomValida = no.test(nomS.value.trim());

    if (!nomValida) {
        nom.style.display = "block";
        return false;
    } else {
        nom.style.display = "none";
        return true;
    }
}

function validarPrecio() {
    var vaP = /^[0-9]$/;
    var precio = document.getElementById("precio");
    var pre = document.getElementById("pre");
    var preValido = vaP.test(precio.value.trim());

    if (!(preValido && precio.value >0)){
        pre.style.display = "block";
        return false;
    } else {
        pre.style.display = "none"; 
        return true;
    }
}

function validarCampos() {
    var resNom = validarNombre();
    var resPre = validarPrecio();
    var Envi = document.getElementById("btnEnviar");

    if (resCor && resPas) {
        Envi.style.display = "block";
    } else {
        Envi.style.display = "none";
        alert("Por favor, completa los campos correctamente antes de enviar.");
    }
}