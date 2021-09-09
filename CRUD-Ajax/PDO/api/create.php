<?php
/*Requiere coneccion de base de datos
 */
try {
    require 'db_config.php';
} catch (PDOException $e) {
    echo 'Excepción capturada: ', $e->getMessage(), self::$mysql, "\n";
}

/*Guarda variable metodo post */
$post = $_POST;

/*Inserta informacion en las variables  */
$sql = "INSERT INTO items (title,description)
    	VALUES ('" . $post['title'] . "','" . $post['description'] . "')";

/*Conveirte la informacion a query */
$result = $mysql->query($sql);

/*Seleciona toda la informacion en un orden desendente */
$sql = "SELECT * FROM items Order by id desc LIMIT 1";

/*seleciona toda la informacion anterior y la convierten en query*/
$result = $mysql->query($sql);

/*Convierte toda la información en filas con un permiso en PDO*/
$data = $result->fetch(PDO::FETCH_ASSOC);

/* Retorna un datos en json  */
echo json_encode($data);
