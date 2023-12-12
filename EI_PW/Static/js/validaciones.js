var expreNomyApe =/^[a-zA-ZÀ-ÿ\s]{1,40}$/;
var expreDir =/^[a-zA-Z0-9À-ÿ\s]{1,40}$/;
var expreTel =/^\d{7,14}$/;
var expreEmail =/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
var expreComen = /^.{20,128}$/;

function validacionAgenda(){
    var fecha = document.getElementById('fecha').value;

  if (fecha == '') {
    alert('Por favor, ingrese una fecha.');
    return false;
  }
  
  return true;
}

var sexo = document.getElementsByName('lsexo')

for (var i = 0; i < sexo.length; i++) {
    sexo[i].addEventListener('input', validarSexo);
}

function validarNombre() {
    var expNom = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s']+$/;
    var no = document.getElementById('nom');
    var nombre = document.getElementById('nombre');
    nombre.addEventListener('input', validarNombre);

    if (!expNom.test(nombre.value)) {
        nombre.value = ''; 
        nombre.focus(); 
        no.style.display = "block";
        return false;
    }else{
        no.style.display = "none";
        return true;
    }
}

function validarApellido() {
    var expApe = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/;
    var ap = document.getElementById('app');
    var apellido = document.getElementById('apellido');
    apellido.addEventListener('input', validarApellido);

    if (!expApe.test(apellido.value)) {
        apellido.value = '';
        apellido.focus();
        ap.style.display = "block";
        return false;
    }else{
        ap.style.display = "none";
        return true;
    }
}

function validarTelefono() {
    var expTel = /^[0-9]{10}$/;
    var te = document.getElementById('tel');
    var telefono = document.getElementById('telefono');

    if (!expTel.test(telefono.value)) {
        te.style.display = "block";
        return false;
    } else {
        te.style.display = "none";
        return true;
    }
}


function validarEmail() {
    var expEm = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var em = document.getElementById('mail');
    var email = document.getElementById('email');
    

    if (!expEm.test(email.value)) {
        email.value = ''; 
        email.focus();
        em.style.display = "block";
        return false;
    }else{
        em.style.display = "none";
        return true;
    }
}

function validarContrasena() {
    var paswo = /^[A-Za-z0-9#&@]{4,8}$/;
    var contrasena = document.getElementById('contrasena');
    var errorPas = document.getElementById('contra');

    if (!paswo.test(contrasena.value)) {
        contrasena.value = ''; 
        contrasena.focus();
        errorPas.style.display = "block";
        return false;
    } else {
        errorPas.style.display = "none";
        return true;
    }
}


function validarGenero() {
    var generoRadios = document.getElementsByName('genero');
    var errorGenero = document.getElementById('errorGenero');
    var seleccionado = false;

    for (var i = 0; i < generoRadios.length; i++) {
        if (generoRadios[i].checked) {
            seleccionado = true;
            break;
        }
    }

    if (!seleccionado) {
        errorGenero.style.display = "block";
        return false;
    } else {
        errorGenero.style.display = "none";
        return true;
    }
}


function validarFromularioRegistro(){
    var generoRadios = document.getElementsByName('lsexo');
    var errorGenero = document.getElementById('s');
    var seleccionado = false;

    for (var i = 0; i < generoRadios.length; i++) {
        if (generoRadios[i].checked) {
            seleccionado = true;
            break;
        }
    }

    if (!seleccionado) {
        errorGenero.style.display = "block";
        return false;
    } else {
        errorGenero.style.display = "none";
        
    }


    var paswo = /^[A-Za-z0-9#&@]{4,8}$/;
    var contrasena = document.getElementById('contrasena');
    var errorPas = document.getElementById('contra');

    if (!paswo.test(contrasena.value)) {
        contrasena.value = ''; 
        contrasena.focus();
        errorPas.style.display = "block";
        return false;
    } else {
        errorPas.style.display = "none";
        
    }

    var expEm = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var em = document.getElementById('mail');
    var email = document.getElementById('email');
    

    if (!expEm.test(email.value)) {
        email.value = ''; 
        email.focus();
        em.style.display = "block";
        return false;
    }else{
        em.style.display = "none";
        
    }

    var expTel = /^[0-9]{10}$/;
    var te = document.getElementById('tel');
    var telefono = document.getElementById('telefono');

    if (!expTel.test(telefono.value)) {
        te.style.display = "block";
        return false;
    } else {
        te.style.display = "none";
        
    }

    var expApe = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/;
    var ap = document.getElementById('app');
    var apellido = document.getElementById('apellido');
    apellido.addEventListener('input', validarApellido);

    if (!expApe.test(apellido.value)) {
        apellido.value = '';
        apellido.focus();
        ap.style.display = "block";
        return false;
    }else{
        ap.style.display = "none";
        
    }
    var expNom = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s']+$/;
    var no = document.getElementById('nom');
    var nombre = document.getElementById('nombre');
    nombre.addEventListener('input', validarNombre);

    if (!expNom.test(nombre.value)) {
        nombre.value = ''; 
        nombre.focus(); 
        no.style.display = "block";
        return false;
    }else{
        no.style.display = "none";
       
    }

    return true;
}