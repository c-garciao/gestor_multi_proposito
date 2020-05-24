<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content=""/>
        <link rel="stylesheet" type="text/css" href="recursos/estilos/estiloComun.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="recursos/scripts/estilos.js" type="text/javascript"></script>
        <title>Inicio</title>
    </head>
    <body>
        <h1>Utilidades</h1>
        <nav id="menu">
            <ul>
                <li id="menu1" id="seleccionado">Inicio</li>
                <li id="menu2"><a href="utilidades/listaCompra.php">Lista de la compra</a></li>
                <li id="menu3">Gestor de contenido<!--<img src="recursos/imagenes/iconos/down.svg" alt="Icono despliegue menú"/>-->
                    <ul>
                        <li><a href="admon/administrador/insertarContenido.php" title="Insertar contenido">Insertar</a></li>
                        <li>Modificar/Eliminar</li>
                        <li><a href="admon/administrador/listarContenido.php" title="Listar contenido">Ver</a></li>
                    </ul>
                </li>
                <li id="menu4">Incidencias
                    <ul>
                        <li>Crear</li>
                        <li>Estado</li>
                        <li>Contacto</li>
                    </ul>
                </li>
            </ul>
        </nav>
    </body>
</html>
