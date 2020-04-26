<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
/**
 * Devuelve el valor de un dato el cual especificaremos mediante la etiqueta name.
 */
define("MYSQL_HOST", "mysql:host=localhost");
define("MYSQL_USUARIO", "root");
define("MYSQL_PASSWORD", "");
$dbRPG = "bd_contenido";
function recoge($var) {

    $tmp = (isset($_REQUEST[$var])) ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8")) : "";
    return $tmp;
}
function conectaDb(){
    try {
        $tmp = new PDO(MYSQL_HOST, MYSQL_USUARIO, MYSQL_PASSWORD);
        $tmp->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $tmp->exec("set names utf8mb4");
        return($tmp);
    } catch (PDOException $e) {
        print "      <p>Error: No puede conectarse con la base de datos.</p>\n";
        print "\n";
        print "      <p>Error: " . $e->getMessage() . "</p>\n";
        print "\n";

        exit();
    }
}
function crear_BD($consultaCreaDb) {
    try {
        $conn = new PDO(MYSQL_HOST, MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec($consultaCreaDb);
        echo "Se ha creado correctamenta la BD<br>";
    } catch (PDOException $e) {
        echo "Error. No se ha creado la BD:<br>";
        echo $consultaCreaDb . "<br>" . $e->getMessage();
    }

    $conn = null;
}
/**
 * Elimina una sesión pasada por parámetro y devuelve a la página desde la que se ha llamado a esta función.
 * 
 * @param string $nombre nombre de la sesión que se va a destruir. Se pide confirmación mediante JavaScript
 * @param string $url dirección desde la que se ha llamado a esta función
 */
function destruye_sesion($nombre, $url) {

    session_start($nombre);
    session_destroy();
    header("Location:" . $url);
}
