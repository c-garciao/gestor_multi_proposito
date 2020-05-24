/*
 * Devuelve la fecha actual
 * @returns {String}
 */
function fechaActual() {
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
    var fCompleta = fecha.getFullYear() + '-' + mes + '-' + dia;
    return fCompleta;
}
/**
 * Aplica la fecha actual una vez ha cargado el documento
 */
$(document).ready(function () {
    fecha = fechaActual();
    $("#txt_fecha").val(fecha);
});
/*
 * Cuenta el número de letras restantes
 * @param {StrString} origen: id del elemento del que tomará los datos de los valores máximos
 * @param {StrString} destino: id del elemnto en el que se mostraran el número de letras restantos
 * @returns {null}
 */
function cuentaCaracteres(origen, destino) {
    var x = document.getElementById(origen).value;
    var y = x.length;
    var numero = parseInt($('#' + origen).attr("maxLength"));
    console.log(origen);
    console.log(numero);
    document.getElementById(destino).innerHTML = (numero - y) + " palabras restantes";
}
/*Comprobamos que los datos introducidos por el usuario tengan un formato específico
 * @returns {Boolean} 
 */
function validarFormulario() {
    var fecha, titulo, descripcion, recurso, icono;
    fecha = document.getElementById('txt_fecha').value;
    titulo = document.getElementById('txt_titulo').value;
    descripcion = document.getElementById('txt_desc').value;
    recurso = document.getElementById('txt_recurso').value;
    ;
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
    } else if (!/^([A-ZÑÁÉÍÓÚÜa-zñáéíóúü0-9]+\s?)+$/.test(titulo)) {
        $("#txt_error").html(icono + "Error. El título solo puede contener letras");
        $("#txt_error").show();
        return false;
    } else if ($("#selectorFicheros").val() || $("#txt_recurso").val() !== "") {
        //!/^(<[a-z][\s\S]*>)$/.test(recurso)
        if ($("#selectorFicheros").val()) {

            return true;
            //} else if (!/^(<[a-z][\s\S]*>)$/.test(recurso)) {
        } else if (recurso) {
            alert("Texto");
            return true;
        } else {
            $("#txt_error").html(icono + "Error. ");
            $("#txt_error").show();
        }
        console.log(recurso);
        return false;
    } else {
        return true;
    }
}
/*IMPLEMENTACION 24/05/2020*/
/*Capturamos los cambios que se realizan. En función de los mismos, habilitamos/deshabilitamos una u otra opción*/
/**
 * @returns {Int} 
 */
$(document).on('change paste keyup ', function compruebaFicheros() {
    var longitud = $("#txt_recurso").val().length;
    if (($("#txt_recurso").val() === "" && !$("#selectorFicheros").val())) {
        $("#selectorFicheros").prop("disabled", false);
        $("#txt_recurso").prop("disabled", false);
        $('#imgBorra img').hide();
        console.log('a');
    } else if ($("#selectorFicheros").val() || $("#txt_recurso").val() === "") {
        $("#selectorFicheros").prop("disabled", false);
        $("#txt_recurso").prop("disabled", true);
        console.log('b');
        $("#selectorFicheros").attr("name", "valor_txt_recurso");
        $("#txt_recurso").attr("name", "");
        $('#imgBorra img').show();
        return 0;
    } else if (longitud > 0) {
        $("#txt_recurso").prop("disabled", false);
        $("#selectorFicheros").prop("disabled", true);
        console.log('c');
        $("#txt_recurso").attr("name", "valor_txt_recurso");
        $("#selectorFicheros").attr("name", "");
        $('#imgBorra img').hide();
        return 1;
    }
});
/*
 * Permite eliminar el fichero adjunto al hacer click sobre una imagen. Se utiliza también para dejar libres los campos cuando se pulsa en restablecer
 */
function borraAdjunto() {
    $("#formularioInsercionContenido").trigger("reset");
    $("#selectorFicheros").val('');
    $("#selectorFicheros").prop("disabled", false);
    $("#txt_recurso").prop("disabled", false);
    $('#imgBorra img').hide();
    fecha = fechaActual();
    $("#txt_fecha").val(fecha);
    $("#txt_error").add("#txt_correcto").hide();
}
function aplicaFechaReset() {
    fecha = fechaActual();
    $("#txt_fecha").val(fecha);
    //document.getElementById('txt_fecha').value = fecha;
}/*
 * Comprobamos que todos los datos cumplen los requisitos. De ser así, pasaría a ejecutar la parte PHP
 * @returns {Boolean}
 */
function validarFormularioAdjuntos() {
    var elemento = document.getElementsByName('valor_txt_recurso')[0];
    if (!elemento || elemento === "") {
        alert("Error. No ha seleccionado nada");
        return false;
    }
    switch ((elemento.type)) {
        case 'file':
            //En caso de ser un fichero, obtenemos la extensión así como los tipos admitidos del prpio HTML (ya que éste no los valida, solamente da pistas al SO sobre los tipos de ficheros)
            //Remplazamos los espacios en blanco que vienen de la operación de extraer las extensiones, de no hacerlo, a la hora de buscarlas en el array, devolverá false
            var tipos = ((elemento.accept).replace(/\s/g, "")).split(','); //Author: Quentin (Stack Overflow: https://stackoverflow.com/users/19068/quentin) - 24/05/2020 [Replace all whitespace characters - https://stackoverflow.com/questions/6507056/replace-all-whitespace-characters]
            //Authors: Mark Coleman, Mosh Feu (StackOverflow) - [https://stackoverflow.com/questions/5555518/split-variable-from-last-slash-jquery]
            var nombre = (elemento.value).substring((elemento.value).lastIndexOf("\\") + 1, (elemento.value).length);
            var extension = '.' + (nombre.split('.')[1]).toLowerCase();
            if ((!tipos.includes(extension))) {
                alert("\tError.\n" + extension + " no es una extensión soportada");
                console.log(tipos);
                console.log(extension);
                return false;
            } else if(document.getElementById('selectorFicheros').files[0].size > 20971520){
                alert ("Error. Los ficheros adjuntos no pueden superar los 20MB");
                return false;
            }else {
                console.log(elemento);
                return true;
            }
            alert(tipos + nombre);
            break;
        case 'text':
            break;
        default:
            alert("Error. No es válido");
            return false;
            break;
    }

    //var tipo = document.getElementsByName('valor_txt_recurso')[0].type;
    //console.log($("input[name = 'valor_txt_recurso']").prev().prop('nodeName'));
    console.log(typeof ($(elemento)));
    //return true;
}