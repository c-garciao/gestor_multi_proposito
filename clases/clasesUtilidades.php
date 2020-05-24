<?php

session_start();
header('Content-Type: text/html; charset=UTF-8');

$dbContenido = "bd_contenidotest";

class insertaContenido {

    public $fecha;
    public $titulo;
    public $estado;
    public $recurso;
    public $comentario;

    public function insertaContenidoBd($param1, $param2, $param3, $param4, $param5) {
        global $dbContenido;
        //define("MYSQL_USUARIO", "root");
        //define("MYSQL_PASSWORD", "");
        try {
            //$db = conectarDb();
            $conn = new PDO("mysql:host=localhost;charset=UTF8;dbname=$dbContenido", MYSQL_USUARIO, MYSQL_PASSWORD);
            //echo "BD: " . $dbContenido;
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("INSERT INTO $dbContenido.tdat_contenidos (fecha, titulo, estado, recurso, descripcion) VALUES ('$param1', '$param2','$param3', '$param4','$param5')");
            echo 'Fecha: ' . $param1 . '<br/>Titulo: ' . strval($param2) . '<br/>Estado: ' . strval($param3) . '<br/>Recurso: ' . strval($param4) . '<br/>Contenido: ' . strval($param5); //$insercionOk = 1;
            $_SESSION['insercionOk'] = 1;
            header('Location:./insertarContenido.php');
            exit();
        } catch (PDOException $e) {
            $_SESSION['insercionOk'] = -1;
            echo "<br/>Error: <br>";
            echo "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    //Ficheros:
    public function insertaContenido2($recurso, $ruta) {
        if (isset($_FILES[$recurso])) {
            $fichero = $_FILES[$recurso];
//print_r($fichero);
            $nombreFichero = $fichero["name"];
            $tmpFichero = $fichero["tmp_name"];
            $tamanioFichero = $fichero["size"];
            $errorFichero = $fichero["error"];

            // $extensionArchivoI = explode('.', $nombreFichero);
            // $extensionArchivo = strtolower(end($extensionArchivoI));
            if ($errorFichero === 0) {
                if ($tamanioFichero < 41943040) {
                    $directorioSubidas = $ruta . $nombreFichero;
                    if (move_uploaded_file($tmpFichero, $directorioSubidas)) {
                        return $directorioSubidas;
                        // print "<a href=\"" . $directorioSubidas . ">aasdf</a>";
                        // echo '<a href="' . $directorioSubidas . '">Prueba</a>';
                        //print "<h2>" . $i['titulo'] . "</h2>";
                    }
                } else {
                    echo 'Error. No se permiten ficheros de más de 20MB';
                    return false;
                }
                //$nombreNuevo = uniqid('', true) . '.' . $extensionArchivo;
            } else if ($errorFichero === 2) {
                echo 'Error. No se permiten ficheros de más de 20MB';
                $_SESSION['seleccionOk'] = -1;
                return false;
            }
        }
    }

    public function muestraContenido($numFilas) {
        global $dbContenido;
        try {
            $conn = new PDO("mysql:host=localhost;charset=UTF8;dbname=$dbContenido", MYSQL_USUARIO, MYSQL_PASSWORD);
            $consulta = "SELECT id_recurso, date_format(fecha, '%d/%m/%Y') as fecha, titulo, estado, recurso, descripcion FROM tdat_contenidos order by id_recurso LIMIT $numFilas";
            //$key = md5( "SELECT id_recurso, date_format(fecha, '%d/%m/%Y') as fecha, titulo, estado, recurso, descripcion FROM tdat_contenidos order by id_recurso LIMIT $numFilas" );
            $resultado = $conn->query($consulta);
            //  wincache_ucache_add($key, $resultado,3600);//Guardamos los resultados de la consulta durante 1 hora
            return $resultado;
        } catch (PDOException $e) {
            $_SESSION['seleccionOk'] = -1;
            echo "<br/>Error: <br>";
            echo "<br>" . $e->getMessage();
        }
        $conn = null;
    }

    private function pruebas() {
        try {
            $act = strval('<a href="www.google.com">Google</a>');
            $conn = new PDO("mysql:host=localhost;charset=UTF8;dbname=$dbContenido", MYSQL_USUARIO, MYSQL_PASSWORD);
            $consulta = "UPDATE tdat_contenidos SET recurso=";
            $resultado = $conn->query($consulta);
            wincache_ucache_add($consulta, $resultado, 3600); //Guardamos los resultados de la consulta durante 1 hora
            return $resultado;
        } catch (PDOException $e) {
            $_SESSION['seleccionOk'] = -1;
            echo "<br/>Error: <br>";
            echo "<br>" . $e->getMessage();
        }
    }

}
