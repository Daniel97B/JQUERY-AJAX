<?php
/*Requiere coneccion de base de datos
 */
require 'db_config.php';

/*llama variable con metodo post */
$id = $_POST["id"];
/*Guarda variable metodo post */
$post = $_POST;
/*Modifica el id selecionado */
$sql = "UPDATE items SET title = '" . $post['title'] . "'
    ,description = '" . $post['description'] . "'
    WHERE id = '" . $id . "'";

/* se guarda modificaion en una varaible con formato query*/
$result = $mysqli->query($sql);

/*Seleciona nueva informacion  */
$sql = "SELECT * FROM items WHERE id = '" . $id . "'";

/* guarda en una variable nueva mente */
$result = $mysqli->query($sql);

/*Convierte toda la información en filas */
$data = $result->fetch_assoc();

/* Retorna un datos en json  */
echo json_encode($data);
