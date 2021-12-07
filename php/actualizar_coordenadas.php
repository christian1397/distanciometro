<?php

header("Cache-Control: no-cache");

$servername = "localhost";
$username = "ukbf28narptj6";
$password = "`3uJ%t%I#R2?";
$dbname = "dbplpofgki7nv6";

// Obtenemos los datos por medio del método GET
$latitud = $_GET['latitud'];
$longitud = $_GET['longitud'];

// Creacion de la conexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificacion de la conexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$actualizar = "INSERT INTO Coordenadas (latitud, longitud) VALUES ($latitud, $longitud)";

if ($conn->query($actualizar) === TRUE) {

    // Si la actualización es exitosa mostramos las coordenadas que se han actualizado
    echo "Se actualizaron las coordenadas";

    echo "<br><br>Coordenadas enviadas: ";
    echo $latitud . "," . $longitud;

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>