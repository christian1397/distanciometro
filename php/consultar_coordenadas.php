<?php

header("Cache-Control: no-cache");

$servername = "localhost";
$username = "ukbf28narptj6";
$password = "`3uJ%t%I#R2?";
$dbname = "dbplpofgki7nv6";

// Obtenemos los datos a consultar por medio del método GET
$idGps = $_GET['id'];

// Creacion de la conexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificacion de la conexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT latitud, longitud FROM Coordenadas WHERE id_gps = $idGps";

$result = mysqli_query($conn, $sql);

$datos = array();

while($row = mysqli_fetch_array($result)) {

    $latitud = $row['latitud'];
    $longitud = $row['longitud'];

    $datos = array('latitud' => $latitud, 'longitud' => $longitud);

}

$conn->close();

$json_string = json_encode($datos);
echo $json_string;

?>