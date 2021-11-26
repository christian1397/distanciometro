<?php

header("Cache-Control: no-cache");

$servername = "localhost";
$username = "ukbf28narptj6";
$password = "`3uJ%t%I#R2?";
$dbname = "dbplpofgki7nv6";

// Obtenemos los datos a consultar por medio del método GET
//$idGps = $_GET['id'];

// Creacion de la conexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificacion de la conexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT latitud, longitud FROM Coordenadas WHERE id_gps = 0";

$result = mysqli_query($conn, $sql);
$mostrar1 = mysqli_fetch_array($result);

// while($mostrar = mysqli_fetch_array($result)){
//     echo $mostrar['latitud'];
//     echo '<br>';
//     echo $mostrar['longitud'];
//     echo '<br>';
// }

$sql2 = "SELECT latitud, longitud FROM Coordenadas WHERE id_gps = 1";

$result2 = mysqli_query($conn, $sql2);
$mostrar2 = mysqli_fetch_array($result2);

// while($mostrar = mysqli_fetch_array($result2)){
//     echo $mostrar1['latitud'];
//     echo '<br>';
//     echo $mostrar1['longitud'];
//     echo '<br>';
//     echo $mostrar2['latitud'];
//     echo '<br>';
//     echo $mostrar2['longitud'];
// }

$pi80 = M_PI / 180;
$lat1 = $pi80 * $mostrar1['latitud'];
$lat2 = $pi80 * $mostrar2['latitud'];
$lon1 = $pi80 * $mostrar1['longitud'];
$lon2 = $pi80 * $mostrar2['longitud'];
$lat = $lat2 - $lat1;
$lon = $lon2 - $lon1;
$r = 6372.797;

$a = sin($lat / 2) * sin($lat / 2) + cos($lat1) * cos($lat2) * sin($lon / 2) * sin($lon / 2); 
$c = 2 * atan2(sqrt($a), sqrt(1 - $a)); 
$km = $r * $c; 

echo "$km Km";

$conn->close();
?>