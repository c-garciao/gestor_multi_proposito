<?php
include_once '../../recursos/funciones.php';
include_once '../../clases/clasesUtilidades.php';
//session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content=""/>
        <title>Insertar contenido</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>-->
        <script src="../../recursos/scripts/validarContenido.js" type="text/javascript"></script>
        <script src="../../recursos/scripts/estilos.js" type="text/javascript"></script>
        <link type="text/css" rel="stylesheet" href="../../recursos/estilos/estiloComun.css"/>
        <link type="text/css" rel="stylesheet" href="../../recursos/estilos/estiloRecursos.css"/>

    </head>
    <body>
        <h1>Insertar contenido</h1>
        <header>
            <nav id="menu">
                <ul>
                    <li id="menu1"><a href="../../index.php">Inicio</a></li>
                    <li id="menu2"><a href="../../utilidades/listaCompra.php">Lista de la compra</a></li>
                    <li id="menu3"id="seleccionado">Gestor de contenido
                        <ul>
                            <li id="seleccionado"><a href="#">Insertar</a></li>
                            <li>Modificar/Eliminar</li>
                            <li><a href="listarContenido.php">Ver</a></li>
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
        <div id="contenedor">
            <h1>Añadir elemento</h1>
            <?php
            if (isset($_SESSION['insercionOk'])) {
                $insercionOk = $_SESSION['insercionOk'];
                if ($insercionOk == 1) {
                    echo "<div id=\"txt_correcto\"><i class=\"fa fa-check\"></i>Se ha insertado el registro correctamente.</div>";
                } else if ($insercionOk == -1) {
                    echo "<div class=\"success-msg\"><i class=\"fa fa-warning\"></i>Error. No se ha insertado ningún registro.</div>";
                }
                $_SESSION['insercionOk'] = 0;
            }
            ?>
            <div id="txt_error"><i class="fa fa-warning"></i></div>
            <form method="POST" id="formularioInsercionContenido" action="agregarContenido.php" id="form_contenido" onsubmit="return (validarFormulario() && validarFormularioAdjuntos())" enctype="multipart/form-data">
                <label>Fecha</label><input type="date" id="txt_fecha" name="valor_txt_fecha"/>
                <label>Título</label><input type="text" id="txt_titulo" name="valor_txt_titulo"/>
                <label>Estado:</label><select id="txt_select_opc" name="valor_txt_select_opc">
                    <option>Válido</option>
                    <option>En construcción</option>
                    <option>Obsoleto</option>
                </select>
                <label>Recurso</label><input type="text" id="txt_recurso"/><span></span>
                <input type="file" id="selectorFicheros" accept=".png, .svg, .jpg, .pdf, .mp4, .ogg" ><span id="imgBorra"><img src="../../recursos/imagenes/borrarRegistro.svg" onclick="borraAdjunto()"></span>
                <br/><label>Descripción</label><textarea rows="10" cols="60" id="txt_desc" maxlength ="500" oninput="cuentaCaracteres('txt_desc','txt_num_carac')" name="valor_txt_desc"></textarea><span id="txt_num_carac"></span>
                <input type="submit"value="Añadir"/>
                <input type="button" id="restablecer" onclick="borraAdjunto()" value="Borrar">
            </form>
        </div>
        <?php
        ?>
    </body>
</html>