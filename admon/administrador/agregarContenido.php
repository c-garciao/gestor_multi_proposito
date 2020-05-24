<?php

include_once '../../recursos/funciones.php';
include_once '../../clases/clasesUtilidades.php';

$fecha = strval(recoge('valor_txt_fecha'));
$titulo = strval(recoge('valor_txt_titulo'));
$estado = strval(recoge('valor_txt_select_opc'));
//$recurso = addslashes(recoge('valor_txt_recurso'));
//$recurso = recoge('valor_txt_recurso');
$descripcion = strval(recoge('valor_txt_desc'));
echo $fecha . '<br/>' . $titulo . '<br/>' . $estado . '<br/>' . $recurso . '<br/>' . $descripcion;


$objeto = new insertaContenido();
/* $objeto -> fecha = $fecha;
  $objeto -> titulo = $titulo;
  $objeto -> estado = $estado;
  $objeto -> recurso = $recurso;
  $objeto -> comentario = $descripcion; */
print_r($objeto);
$recurso = $objeto -> insertaContenido2('valor_txt_recurso','../../subidas/');
print "VALOR: " .  $a;
$objeto ->insertaContenidoBd ($fecha, $titulo, $estado, strval($recurso),$descripcion);
