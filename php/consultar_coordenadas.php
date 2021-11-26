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

while($mostrar = mysqli_fetch_array($result)){
    echo $mostrar['latitud'];
    echo '<br>';
    echo $mostrar['longitud'];
    echo '<br>';
}

$sql2 = "SELECT latitud, longitud FROM Coordenadas WHERE id_gps = 1";

$result2 = mysqli_query($conn, $sql2);

while($mostrar = mysqli_fetch_array($result2)){
    echo $mostrar['latitud'];
    echo '<br>';
    echo $mostrar['longitud'];
}

$conn->close();
?>