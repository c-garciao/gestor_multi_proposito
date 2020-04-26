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
    ;
}
/***
 * Si seleccionamos el texto, lo tacha.Si se vuelve a desmarcar, se queda como estaba.
 * @param {string} texto
 * @param {string} id_chk
 * @returns {undefined}
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

/* var elementos_seleccionados = document.getElementsByName('elemento_lista');
 var id_elemento = 'texto_';
 console.log(elementos_seleccionados.length);
 var j = 0;
 for (var i = 0; i < elementos_seleccionados.length; i++) {
 if (elementos_seleccionados[i].checked === true) {
 j++;
 
 
 console.log(id_elemento);
 //document.getElementById('texto_'[i]).style.setProperty("text-decoration") === "line-through";
 }
 id_elemento= id_elemento+j;
 console.log("j vale: " + j);
 }*/