/*Comprobar que la lista esté vacía (se guarda en una sesión de PHP y en este caso, también en una cookie), la cual comprobamos. 
 * En caso de estar vacía, deshabilitamos el botón de borrar
 * */
var sesionCompra  = getCookie('listaCompra');
$(document).ready(function (){
    console.log(sesionCompra.length);
    if(sesionCompra.length == 0){
        $('#btn_borrar').prop('disabled',true);
        $('#btn_borrar').css('cursor','not-allowed');
    }
});
/*Funcion de W3Schools: https://www.w3schools.com/js/js_cookies.asp
 * Title: getCookie
 * Author: W3 Schools
 * Date: 23/05/2020
 * @returns {} 
 * */
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
/***
 * Pide confirmación al usuario y dependiendo si la confirma o no, deshabilita y vuelve a habilitar el elemento del formulario como requerido. La confirmación borra la sesión (PHP)
 * @returns {Boolean}
 */
function confirma() {
    var requerido = document.getElementById('txt_elemento');
    requerido.required = false;
    if (confirm("Se van a borrar todos los elementos, ¿continuar?")) {
        return true;
    } else {
        requerido.required = true;
        return false;
    }
}
/***
 * Si seleccionamos el texto, lo tacha.Si se vuelve a desmarcar, se queda como estaba.
 * @param {string} texto
 * @param {string} id_chk
 */
function tachar_elementos(texto, id_chk) {
    console.log(texto);
    console.log(id_chk);
    p = document.getElementById(id_chk);
    if (p.checked === true) {
        document.getElementById(texto).style.setProperty("text-decoration", "line-through");
        document.getElementById(texto).style.setProperty("color", "red");

    } else if (p.checked === false) {
        document.getElementById(texto).style.setProperty("text-decoration", "none");
        document.getElementById(texto).style.setProperty("color", "black");
    }
}