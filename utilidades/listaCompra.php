<?php
include_once '../clases/clasesUtilidades.php';
session_name("lista_compra");
session_start();
if (isset($_SESSION["datos"])) {
    print_r($_SESSION["datos"]);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="../recursos/validaciones.js"></script>
        <link rel="stylesheet" type="text/css" href="../recursos/estiloComun.css" />
        <title>Lista de la compra</title>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="#">Lista de la compra</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <article>
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
                                }*/
                                sort($_SESSION["datos"]); //Ordenamos alfabéticamente los elementos del Array
                                for ($i= 0; $i<sizeof($_SESSION["datos"]);$i++) {
                                    print "<p name=\"txt_elemento_lista\" class=\"txt_elemento_lista_estilo\" id=\"texto_" . $i . "\"><label><input name=\"elemento_lista\" class=\"chk_estilo\" id=\"checkbox_" . $i . "\" onclick=\"tachar_elementos('texto_" . $i . "','checkbox_" . $i . "')\" type=\"checkbox\">" . $_SESSION["datos"][$i] . "</p></label>";
                                }
                            }
                            $objeto1 = new insertaContenido();
                            $objeto1 -> fecha = '13/04/2020';
                            $objeto1 -> titulo = 'Convertir a pdf';
                            $objeto1 -> estado = 'activo';
                            $objeto1 -> recurso = '../documentos/convertir_pdf.pdf';
                            $objeto1 -> comentario ='En este tutorial se verá como compartir a pdf cualquier documento';
                            $objeto1 ->insertaContenidoBd('13/04/2020','Convertir a pdf' ,'activo', '"../documentos/convertir_pdf.pdf"', 'En este tutorial se verá como compartir a pdf cualquier documento');
                            ?>
                        </div>
                    </fieldset>

                </form>
            </article>
        </section>
    </body>
</html>
