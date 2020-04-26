<?php

include_once '../../recursos/funciones.php';
include_once '../../clases/clasesUtilidades.php';

$fecha = strval(recoge('valor_txt_fecha'));
$titulo = strval(recoge('valor_txt_titulo'));
$estado = strval(recoge('valor_txt_select_opc'));
$recurso = addslashes(recoge('valor_txt_recurso'));
$descripcion = strval(recoge('valor_txt_desc'));
//echo $fecha . '<br/>' . $titulo . '<br/>' . $estado . '<br/>' . $recurso . '<br/>' . $descripcion;
$objeto = new insertaContenido();
/*$objeto -> fecha = $fecha;
$objeto -> titulo = $titulo;
$objeto -> estado = $estado;
$objeto -> recurso = $recurso;
$objeto -> comentario = $descripcion;*/
$objeto ->insertaContenidoBd ($fecha, $titulo, $estado, $recurso,$descripcion);