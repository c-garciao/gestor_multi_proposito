<?php
include_once '../clases/clasesUtilidades.php';
include_once '../clases/funciones.php';
/*Comprobamos si está iniciada o no la sesión (por defecto se inicia en el index.php), puede que accedan directamente a alguna página sin pasar por la principal*/
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

if (isset($_SESSION["datos"])) {
    print_r($_SESSION["datos"]);
}
//Necesario para poder utilizar caracteres como ñ
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content=""/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="../recursos/scripts/validaciones.js"></script>
        <script type="text/javascript" src="../recursos/scripts/estilos.js"></script>
        <link rel="stylesheet" type="text/css" href="../recursos/estilos/estiloComun.css" />
        <link rel="stylesheet" type="text/css" href="../recursos/estilos/estiloListaCompra.css" />
        <title>Lista de la compra</title>
    </head>
    <body>
        <header>
            <h1>Lista de la compra</h1>
            <nav id="menu">
                <ul>
                    <li id="menu1"><a href="../index.php">Inicio</a></li>
                    <li id="menu2" id="seleccionado"><a href="#">Lista de la compra</a></li>
                    <li id="menu3">Gestor de contenido
                        <ul>
                            <li><a href="../admon/administrador/insertarContenido.php" title="Insertar contenido">Insertar</a></li>
                            <li>Modificar/Eliminar</li>
                            <li><a href="../admon/administrador/listarContenido.php" title="Listar contenido">Ver</a></li>
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
            <article><?php
                if (isset($_COOKIE['listaCompra'])) echo $_COOKIE['listaCompra'];
                ?>
                <form method="POST" action="../formulariosIntermedios/validaListaCompra.php" accept-charset="UTF-8">
                    <fieldset>
                        <input type="text" required autofocus  placeholder="Elemento de la lista" id="txt_elemento"name="producto_lista" >
                        <input type="submit" name="accion" value="Añadir" id="btn_guardar" >
                        <input type="submit"  name="accion" value="Borrar" id="btn_borrar" onclick="return confirma()">

                        <br/>
                        <br/>
                        <div id="listado">
                            <?php
                            if (isset($_SESSION["datos"])) {
                                
                                //print_r  ($_SESSION["datos"];
                                $j = 1;
                                /* foreach ($_SESSION["datos"] as $i) {
                                  print "<p name=\"txt_elemento_lista\" class=\"txt_elemento_lista_estilo\" id=\"texto_" . $j . "\"><label><input name=\"elemento_lista\" class=\"chk_estilo\" id=\"checkbox_" . $j . "\" onclick=\"tachar_elementos('texto_" . $j . "','checkbox_" . $j . "')\" type=\"checkbox\">" . $i . "</p></label>";
                                  $j++;
                                  } */
                                sort($_SESSION["datos"]); //Ordenamos alfabéticamente los elementos del Array
                                for ($i = 0; $i < sizeof($_SESSION["datos"]); $i++) {
                                    print "<p name=\"txt_elemento_lista\" class=\"txt_elemento_lista_estilo\" id=\"texto_" . $i . "\"><label><input name=\"elemento_lista\" class=\"chk_estilo\" id=\"checkbox_" . $i . "\" onclick=\"tachar_elementos('texto_" . $i . "','checkbox_" . $i . "')\" type=\"checkbox\">" . $_SESSION["datos"][$i] . "</p></label>";
                                    
                                }
                                
                            }
                            /* $objeto1 = new insertaContenido();
                              $objeto1 -> fecha = '13/04/2020';
                              $objeto1 -> titulo = 'Convertir a pdf';
                              $objeto1 -> estado = 'activo';
                              $objeto1 -> recurso = '../documentos/convertir_pdf.pdf';
                              $objeto1 -> comentario ='En este tutorial se verá como compartir a pdf cualquier documento';
                              $objeto1 ->insertaContenidoBd('13/04/2020','Convertir a pdf' ,'activo', '"../documentos/convertir_pdf.pdf"', 'En este tutorial se vera como compartir a pdf cualquier documento'); */
                            ?>
                        </div>
                    </fieldset>

                </form>
            </article>
        </section>
    </body>
</html>
