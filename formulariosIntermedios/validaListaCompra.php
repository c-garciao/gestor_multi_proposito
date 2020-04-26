<?php

include_once '../recursos/funciones.php';
session_name("lista_compra");
session_start();
$accion = recoge("accion");
/**
 * Tenemos dos botones de tipo submit. Aquí comprobamos qué opción se ha escogido (añadir registros o borrar los existentes)
 */

switch ($accion) {
    case "Añadir":
        $valor = recoge("producto_lista");
        if (!empty($valor)) {
            $_SESSION["datos"][] = $valor;
        }
        header("Location:../utilidades/listaCompra.php");
        break;
    case "Borrar":
        destruye_sesion("lista_compra", "../utilidades/listaCompra.php");
        break;
}

