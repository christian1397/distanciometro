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

$actualizar = "UPDATE Coordenadas SET latitud = $latitud, longitud = $longitud WHERE id_gps = 0";

if ($conn->query($actualizar) === TRUE) {

    // Si la actualización es exitosa mostramos las coordenadas que se han actualizado
    echo "Se actualizaron las coordenadas";

    $consultarCoordenadas = "SELECT latitud, longitud FROM Coordenadas WHERE id_gps = 0";

    $resultado = mysqli_query($conn, $consultarCoordenadas);
    $mostrar = mysqli_fetch_array($resultado);

    echo "<br><br>Coordenadas actualizadas: ";
    echo $mostrar['latitud'] . "," . $mostrar['longitud'];

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>