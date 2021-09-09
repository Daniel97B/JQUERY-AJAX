<?php
/*Requiere coneccion de base de datos
 */
try {
    require 'db_config.php';
} catch (PDOException $e) {
    echo 'Excepción capturada: ', $e->getMessage(), self::$mysql, "\n";
}

/*llama variable con metodo post */
$id = $_POST["id"];

/*Guarda variable metodo post */
$post = $_POST;

/*Modifica el id selecionado */
$sql = "UPDATE items SET title = '" . $post['title'] . "'
    ,description = '" . $post['description'] . "'
    WHERE id = '" . $id . "'";

/* se guarda modificaion en una varaible  */
$result = $mysql->query($sql);

/*Seleciona nueva informacion  */
$sql = "SELECT * FROM items WHERE id = '" . $id . "'";

/* guarda en una variable nueva mente */
$result = $mysql->query($sql);

/*Solicitamos que nos muestre todos los datos */
$data = $result->fetch(PDO::FETCH_ASSOC);

/* Retorna un datos en json  */
echo json_encode($data);
