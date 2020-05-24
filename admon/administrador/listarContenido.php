<?php
include_once '../../recursos/funciones.php';
include_once '../../clases/clasesUtilidades.php';
?>
<!DOCTYPE html>
<html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="description" content=""/>
            <title>Listar contenido</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>-->
            <script src="../../recursos/scripts/validarContenido.js" type="text/javascript"></script>
            <script src="../../recursos/scripts/estilos.js" type="text/javascript"></script>
            <link type="text/css" rel="stylesheet" href="../../recursos/estilos/estiloComun.css"/>
            <!--<link type="text/css" rel="stylesheet" href="../../recursos/estiloRecursos.css"/>-->
            <link type="text/css" rel="stylesheet" href="../../recursos/estilos/estiloRecursosII.css"/>
        </head>
        <body>
            <h1>Listado de contenido</h1>
            <header>
                <nav id="menu">
                    <ul>
                        <li id="menu1"><a href="../../index.php">Inicio</a></li>
                        <li id="menu2"><a href="../../utilidades/listaCompra.php">Lista de la compra</a></li>
                        <li id="menu3"id="seleccionado">Gestor de contenido
                            <ul>
                                <li ><a href="insertarContenido.php">Insertar</a></li>
                                <li>Modificar/Eliminar</li>
                                <li id="seleccionado"><a href="#">Ver</a></li>
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
            </header>
            <section>
                <?php
                $objeto = new insertaContenido();
                $valores = $objeto->muestraContenido(1000);
                $contador = 1;
                foreach ($valores as $i) {
                    //print $contador . "] ";
                    print "<article>";

                    //print "<tr><td>$i[id_recurso]</td>"; No es necesario mostrarlo(por el momento)
                    print $contador . "] <tr><td>$i[fecha]</td>";
                    print "<h2>" . $i['titulo'] . "</h2>";
                    print "<h3>" . $i['estado'] . "</h3>";
                    //print htmlspecialchars_decode($i['recurso']);
                    if (strpos(htmlspecialchars_decode($i['recurso']), "<iframe") === 0) {
                        print htmlspecialchars_decode($i['recurso']);
                    } else {
                        print '<a href="' . $i['recurso'] . '" target="_blank">Prueba</a>';
                    }
                    //print htmlspecialchars_decode($i['recurso']);
                    print "<textarea disabled=\"true\">$i[descripcion]</textarea>";
                    print "<br/>";
                    print "<br/>";
                    print "<br/>";
                    print "</article>";
                    $contador++;
                }
                ?>
            </section>
        </body>
    </html>
