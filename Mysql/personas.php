<?php
/* Creamos un if donde nos permitirar saber si ahi o no informacion */
if (isset($_GET['id'])) {
    get_persons($_GET['id']);
} else {
    die("Solicitud no válida.");
}
//Creamos funcion ya nombrada en el if para crear una coneccion a la base de datosy de esta forma poder extraer la información
function get_persons($id)
{
    //Información para crear la conexion
    $dbserver = "localhost";
    $dbuser = "root";
    $password = "";
    $dbname = "estonosir";
    //Conexion ya creada
    $database = new mysqli($dbserver, $dbuser, $password, $dbname);
    //Verificamos si se hizo la conexion de la base de datos
    if ($database->connect_errno) {
        die("No se pudo conectar a la base de datos");
    }
    //Transformar los datos obtenidos con el array();
    $jsondata = array();
    //Extracción de informacion
    if (is_array($id)) {
        //Obtener información para conjunto de informacion
        $id = array_map('intval', $id);
        $querywhere = "WHERE `ID` IN (" . implode(',', $id) . ")";
    } //En caso de que solo sea un Id
    else {

        $id = intval($id);
        $querywhere = "WHERE `ID` = " . $id;
    }
    //Creamos un if donde encontremos la consulta
    if ($result = $database->query("SELECT * FROM `prueba_users` " . $querywhere)) {
//si hay un resultado nos hará el siguiente proceso
        if ($result->num_rows > 0) {
            $jsondata["success"] = true;
            $jsondata["data"]["message"] = sprintf("Se han encontrado %d usuarios", $result->num_rows);
            $jsondata["data"]["users"] = array();
            while ($row = $result->fetch_object()) {
                //$jsondata["data"]["users"][] es un array no asociativo. Tendremos que utilizar JSON_FORCE_OBJECT en json_enconde
                //si no queremos recibir un array en lugar de un objeto JSON en la respuesta
                //ver http://www.php.net/manual/es/function.json-encode.php para más info
                $jsondata["data"]["users"][] = $row;
            }
        } else {
            //Si no hay información me muestre un mensaje de No se encontró ningún resultado.
            $jsondata["success"] = false;
            $jsondata["data"] = array(
                'message' => 'No se encontró ningún resultado.',
            );
        }
        $result->close();
    } /*Ponemos el else en caso de que encuentre algun error*/else {
        $jsondata["success"] = false;
        $jsondata["data"] = array(
            'message' => $database->error,
        );
    }
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    $database->close();
}
exit();
