<?php
session_start();
include_once '../recursos/funciones.php';
$accion = recoge("accion");

/**
 * Tenemos dos botones de tipo submit. Aquí comprobamos qué opción se ha escogido (añadir registros o borrar los existentes)
 */

switch ($accion) {
    case "Añadir":
        $valor = recoge("producto_lista");
        if (!empty($valor)) {
            $_SESSION["datos"][] = $valor;
            setcookie("listaCompra", json_encode($_SESSION["datos"]),false,'/', false);//Se crea una cookie con los datos. Se elimina al finalizar la sesión o al pulsar el botón borrar (el siguiente case)
        }
        header("Location:../utilidades/listaCompra.php");
        break;
    case "Borrar":
        setcookie("listaCompra", json_encode($_SESSION["datos"]),time()-3600,'/', false);
        destruye_sesion("lista_compra", "../utilidades/listaCompra.php");
        break;
}

