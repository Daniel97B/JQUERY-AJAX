<?php
/*Requiere coneccion de base de datos
 */
try {
    require 'db_config.php';
} catch (PDOException $e) {
    echo 'Excepción capturada: ', $e->getMessage(), self::$mysql, "\n";
}
/*Creamos una variable que nos permita mostrr el numero de objetos que vamos a ver en la pagina*/
$num_rec_per_page = 5;

/*Creamos el if para asegurarnos de que pueda ejecutar la visualización */
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}
/*En caso de que no se encuentre ningun datos solo se desplegra una pagina */ 
 else {
    $page = 1;
};

/* Mostrar pagina  */
$start_from = ($page - 1) * $num_rec_per_page;

/*Selecionamos todos los datos para mostrarlos en pagina  */
$sqlTotal = "SELECT * FROM items";

/* Selecionamos todos los datos segun las codicion $start_from, $num_rec_per_page */
$sql = "SELECT * FROM items Order By id desc LIMIT $start_from, $num_rec_per_page";

/*Convertimos todos los datos en query */
$stmt = $mysql->query($sql);

/*Solicitamos que nos muestre todos los datos */
$result = $stmt->fetchall(PDO::FETCH_ASSOC);

foreach ($result as $fila) {
    $json[] = $fila;
}

/* Nos devuelve el numero de filas ofectadas por una sentencia */
$stmt->execute();

/* llamamos todos los datos en una variable data */
$data['data'] = $json;

/*Convertimos todos los datos en query */
$resulta = $mysql->query($sqlTotal);

/* Nos devuelve el numero de filas ofectadas por una sentencia */
$resulta->execute();

/* Nos cuente el numero de filas que hay */
$resultar = $resulta->rowCount();

/* guardamos la informacion en una variable */
$data['total'] = $resultar;

/* Retorna un datos en json  */
echo json_encode($data);
