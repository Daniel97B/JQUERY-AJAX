<?php
/*Requiere coneccion de base de datos
 */
require 'db_config.php';
/*Guarda variable metodo post */
$post = $_POST;

/*Inserta informacion en las variables  */
$sql = "INSERT INTO items (title,description)
    	VALUES ('" . $post['title'] . "','" . $post['description'] . "')";

/*Conveirte la informacion a query */
$result = $mysqli->query($sql);

/*Seleciona toda la informacion en un orden desendente */
$sql = "SELECT * FROM items Order by id desc LIMIT 1";

/*seleciona toda la informacion anterior y la convierten en query*/
$result = $mysqli->query($sql);

/*Convierte toda la información en filas */
$data = $result->fetch_assoc();

/* Retorna un datos en json  */
echo json_encode($data);
