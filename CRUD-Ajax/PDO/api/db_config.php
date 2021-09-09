<?php
//Informacion para crear la conexion
$hostname = 'localhost';
$database = 'crud';
$username = 'root';
$password = "";
$dsn = "mysql:host=$hostname;dbname=$database;charset=UTF8";
//Try Catch, asi nos aseguramos que si funciones el codigo
try {
    $mysql = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} /*Ponemos el catch en caso de que encuentre algun error*/ catch (PDOException $e) {
    echo 'Excepción capturada: ', $e->getMessage(), self::$mysql, "\n";
}
