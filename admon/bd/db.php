<?php
include_once '../../recursos/funciones.php';

$dbCONTENIDO = "bd_contenido";
$consulta = "CREATE DATABASE $dbCONTENIDO
CHARACTER SET UTF8mb4
COLLATE utf8mb4_unicode_ci";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Creacion BBDD</title>
    </head>
    <body>
        <?php
        conectaDb();
        crear_BD($consulta);
        exit();
        ?>
    </body>
</html>
