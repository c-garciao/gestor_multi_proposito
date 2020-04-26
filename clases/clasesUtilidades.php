<?php

header('Content-Type: text/html; charset=UTF-8');

$dbContenido = "bd_contenido";

class insertaContenido {

    public $fecha;
    public $titulo;
    public $estado;
    public $recurso;
    public $comentario;

    public function insertaContenidoBd($param1, $param2, $param3, $param4, $param5) {
        global $dbContenido;
        try {
            global $dbRPG;
            //$db = conectarDb();
            $conn = new PDO("mysql:host=localhost;charset=UTF8;dbname=$dbContenido", MYSQL_USUARIO, MYSQL_PASSWORD);
            echo "BD: " . $dbContenido;
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("INSERT INTO $dbContenido.tdat_contenidos (fecha, titulo, estado, recurso, descripcion) VALUES ('$param1', '$param2','$param3', '$param4','$param5')");
            echo 'Fecha: ' . $param1 . '<br/>Titulo: ' . strval($param2) . '<br/>Estado: ' . strval($param3) . '<br/>Recurso: ' . strval($param4) . '<br/>Contenido: ' . strval($param5);
            header('Location:./insertarContenido.php');
        } catch (PDOException $e) {
            echo "<br/>Error: <br>";
            echo "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    public function insertaContenido2() {
        echo 'Holaa';
    }
    public function muestraContenido(){
        
    }

}
