var fecha = new Date();
var mes, dia;
if (fecha.getMonth() + 1 < 10) {
    mes = '0' + (fecha.getMonth() + 1);
} else {
    mes = (fecha.getMonth() + 1);
}
if (fecha.getDate() < 10) {
    dia = '0' + (fecha.getDate());
} else {
    dia = fecha.getDate();
}
var patata = fecha.getFullYear() + '-' + mes + '-' + dia;

$(document).ready(function () {
    $("#txt_fecha").val(patata);
});
function cuentaCaracteres(origen, destino) {
    var x = document.getElementById(origen).value;
    var y = x.length;
    var numero = parseInt($('#' + origen).attr("maxLength"));
    console.log(origen);
    console.log(numero);
    document.getElementById(destino).innerHTML = (numero - y) + " palabras restantes";
}
function validarFormulario() {
    var fecha, titulo, descripcion,recurso, icono;
    fecha = document.getElementById('txt_fecha').value;
    titulo = document.getElementById('txt_titulo').value;
    descripcion = document.getElementById('txt_desc').value;
    recurso=document.getElementById('txt_recurso').value;;
    icono = '<i class=\"fa fa-times-circle\"></i>';
    if (!/^([A-ZÑÁÉÍÓÚÜa-zñáéíóúü]+\s?)+$/.test(titulo) && !/^([A-ZÑÁÉÍÓÚÜa-zñáéíóúü]+\s?)+$/.test(descripcion)) {
        $("#txt_error").html(icono + "Error.Ninguno de los campos es válido");
        $("#txt_error").show();
        return false;
    } else if (!/^\d{4}-\d{2}-\d{2}$/.test(fecha)) {
        $("#txt_error").html(icono + "Error. La fecha no es válida");
        $("#txt_error").show();
        return false;
    } else if (!/^([A-ZÑÁÉÍÓÚÜa-zñáéíóúü0-9,.]+\s?)+$/.test(descripcion)) {
        $("#txt_error").html(icono + "Error. La descripción no es válida, solo puede contener letras, números y el \".\"");
        $("#txt_error").show();
        return false;
    }else if(!/^([A-ZÑÁÉÍÓÚÜa-zñáéíóúü]+\s?)+$/.test(titulo)){
        $("#txt_error").html(icono + "Error. El título solo puede contener letras");
        $("#txt_error").show();
        return false;
    } else if(!/^(<[a-z][\s\S]*>)$/.test(recurso)){
        $("#txt_error").html(icono + "Error. El recurso no puede contener ñ");
        $("#txt_error").show();
        return false;
    }else {
        return true;
    }
}