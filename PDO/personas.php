<?php
/* Creamos un if donde nos permitirar saber si ahi o no informacion */
if (isset($_GET['id'])) {
    get_persons($_GET['id']);
} else {
    die("Solicitud no válida.");
}
//Creamos funcion ya nombrada en el ifes para crear una coneccion a la base de datosy de esta forma poder extraer la informacion
function get_persons($id)
{
//Try Catch, asi nos aseguramos que si funciones el codigo
    try {
//Informacion para crear la conexion
        $dsn = null;
        $dbserver = "localhost";
        $dbuser = "root";
        $password = "";
        $dbname = "estonosir";
        //Conexion ya creada
        $dsn = "mysql:host=" . $dbserver . ";dbname=" . $dbname;
        $database = new PDO($dsn, $dbuser, $password);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        //Transformar los datosobatenidos con el array();
        $jsondata = array();

        //Extracción informacion
        if (is_array($id)) {
            //Obtener información para varios Id
            $id = array_map('intval', $id);
            $querywhere = 'WHERE ID IN (' . implode(',', $id) . ')';
        } //En caso de que solo sea un Id
        else {
            $id = intval($id);
            $querywhere = 'WHERE ID = ' . $id;
        }
        //Consulta de toda la incormacion requerida segun la condicion anterior "$querywhere"
        $consulta = 'SELECT * FROM prueba_users ' . $querywhere;
        //Convertimos los datos a query
        $select = $database->query($consulta);
        //Pedimos todos los datos
        $result = $select->fetchAll(PDO::FETCH_ASSOC);
        //Creamos if
        if ($result) {
            //Si hay un resultado me recolecte y me muestre toda la información
            $jsondata["success"] = true;
            $jsondata["data"]["message"] = sprintf("Se han encontrado %d usuarios", count($result));
            $jsondata["data"]["users"] = array();
            //Creamos el foreach para solucionar o resaltar errores basicos al cambiar de variable
            foreach ($result as $users) {
                $jsondata["data"]["users"][] = $users;
            }
            //while( $row = $result->fetch_object() ) {
            //$jsondata["data"]["users"][] es un array no asociativo. Tendremos que utilizar JSON_FORCE_OBJECT en json_enconde
            //si no queremos recibir un array en lugar de un objeto JSON en la respuesta
            //ver http://www.php.net/manual/es/function.json-encode.php para más info
            //$jsondata["data"]["users"][] = $users;
            //}
        } else {
            //Si no hay información, me muestre un mensaje: "No se encontró ningún resultado."
            $jsondata["success"] = false;
            $jsondata["data"] = array(
                'message' => 'No se encontró ningún resultado.',
            );
        }
    } /*Ponemos el catch en caso de que encuentre algun error*/ catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
}
exit();
