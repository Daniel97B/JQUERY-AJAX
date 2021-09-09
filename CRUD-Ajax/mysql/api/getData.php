<?php
/*Requiere coneccion de base de datos
 */

require 'db_config.php';
/*Creamos una variable que nos permita mostrr el numero de objetos que vamos a ver en la pagina*/
$num_rec_per_page = 4;
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
$result = $mysqli->query($sql);

while ($row = $result->fetch_assoc()) {

    $json[] = $row;
}
/* llamamos todos los datos en una variable data */

$data['data'] = $json;

/* procedemos a selecionar todos los tatos y almacenar todos los datos*/
$result = mysqli_query($mysqli, $sqlTotal);

/* En la variable total selecionamos la variable result donde hay toda la informacion */
$data['total'] = mysqli_num_rows($result);


/* Retorna un datos en json  */
echo json_encode($data);
