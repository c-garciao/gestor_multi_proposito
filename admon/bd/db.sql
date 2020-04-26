$dbCONTENIDO = "bd_contenido";
"CREATE DATABASE $dbCONTENIDO
CHARACTER SET UTF8mb4
COLLATE utf8mb4_unicode_ci"
/*$tabla_Jugadores = "CREATE TABLE jugadores (
    id_p INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30),
    ataque INT(3),
    defensa INT(3),
    enemigos_matados INT(3),
    puntuacion INT(3),
    PRIMARY KEY(id_p)
    )";*/
CREATE TABLE tdat_contenidos (
    id_recurso  INT UNSIGNED AUTO_INCREMENT,
    fecha DATE,
    titulo VARCHAR(31),
    estado VARCHAR(15),
    recurso VARCHAR(300),
    descripcion VARCHAR(500),
    PRIMARY KEY (id_recurso),
    CONSTRAINT CHK_ESTADO_CONTENIDOS CHECK (estado IN ('Válido', 'En construcción', 'Obsoleto','En revisión'))
);