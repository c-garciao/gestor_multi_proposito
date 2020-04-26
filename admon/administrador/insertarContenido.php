<?php
include_once '../../recursos/funciones.php';
include_once '../../clases/clasesUtilidades.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insertar contenido</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>-->
        <script src="validarContenido.js" type="text/javascript"></script>
        <link type="text/css" rel="stylesheet" href="../../recursos/estiloRecursos.css"/>

    </head>
    <body>
        <header>
            <nav></nav>
        </header>
        <div id="contenedor">
            <h1>Añadir elemento</h1>
            <div id="txt_error"><i class="fa fa-warning"></i></div>
            <form method="POST" action="agregarContenido.php" id="form_contenido" onsubmit="return validarFormulario()">
                <label>Fecha</label><input type="date" id="txt_fecha" name="valor_txt_fecha"/>
                <label>Título</label><input type="text" id="txt_titulo" name="valor_txt_titulo"/>
                <label>Estado:</label><select id="txt_select_opc" name="valor_txt_select_opc">
                    <option>Válido</option>
                    <option>En construcción</option>
                    <option>Obsoleto</option>
                </select>
                <label>Recurso</label><input type="text" id="txt_recurso" name="valor_txt_recurso"/>
                <label>Descripción</label><textarea rows="10" cols="60" id="txt_desc" maxlength ="500" oninput="cuentaCaracteres('txt_desc','txt_num_carac')" name="valor_txt_desc"></textarea><span id="txt_num_carac"></span>
                <input type="submit"value="Añadir"/>
            </form>
        </div>
        <?php
        ?>
    </body>
</html>