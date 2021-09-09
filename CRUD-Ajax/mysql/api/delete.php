<?php
/*Requiere coneccion de base de datos
 */
require 'db_config.php';

/*llama variable con metodo post */
$id = $_POST["id"];

/*elimina el id selecionado */
$sql = "DELETE FROM items WHERE id = '" . $id . "'";

/* Resultado se guarda en una variable  */
$result = $mysqli->query($sql);

/*Se muestra Id borrado */
echo json_encode([$id]);
