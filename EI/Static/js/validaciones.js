var expreNomyApe =/^[a-zA-ZÀ-ÿ\s]{1,40}$/;
var expreDir =/^[a-zA-Z0-9À-ÿ\s]{1,40}$/;
var expreTel =/^\d{7,14}$/;
var expreEmail =/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
var expreComen = /^.{20,128}$/;

function validacion() {
    var nombre = document.frm.nombre;
    if(!expreNomyApe.test(nombre.value)){
        nombre.focus();
        nom.style.display="";
        return false;
    }
    nom.style.display = "none";

    var apellidos = document.frm.apellido;
    if(!expreNomyApe.test(apellidos.value)){
        apellidos.focus();
        app.style.display="";
        return false;
    }
    app.style.display = "none";

    var dire = document.frm.direccion;
    if(!expreDir.test(dire.value)){
        dire.focus();
        dir.style.display="";
        return false;
    }
    dir.style.display = "none";

    var tele = document.frm.telefono;
    if((tele.value.trim().length<10) || (!expreTel.test(tele.value))){
        tele.focus();
        tel.style.display="";
        return false;
    }
    tel.style.display = "none";

    var ma = document.frm.email;
    if((ma.value.trim().length<10) || (!expreEmail.test(ma.value))){
        ma.focus();
        mail.style.display="";
        return false;
    }
    mail.style.display = "none";

    if(document.frm.lsexo.value=="") {
        s.style.display="";  
        return false;      
    }
    s.style.display="none";

    var come = document.frm.comentario;
    if(!expreComen.test(come.value)){
        com.focus();
        com.style.display="";
        return false;
    }
    com.style.display = "none";
    
    btn.style.display="";
}