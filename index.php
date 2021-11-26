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

$sql = "UPDATE INTO Coordenadas (id_gps, latitud, longitud)
VALUES ($idGps, $latitud, $longitud) WHERE id_gps = 1";

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

// echo "$km Km";

$cont = 0;

if ($km < 0.0015) {
    $cont++;
}

// echo '<br>';
// echo $cont;

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>

        <!-- PLUGINS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- ICONOS -->
        <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/all.min.css">
        <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->

        <!-- ESTILOS -->
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body id="body-pd">
        <div class="l-navbar" id="nav-bar" style="padding-right: 0px;">
            <nav class="nav">
                <div>
                    <a href="#" class="nav__logo">
                        <span class='bx nav__logo-icon'></span>
                    </a>

                    <div class="nav__list">
                        <a href="#" class="nav__link active" onclick="datos()">
                            <i class='bx bx cil-chart nav__icon' ></i>
                            <span class="nav__name">Datos Generales</span>
                        </a>

                        <a href="#" class="nav__link" onclick="notif()">
                            <i class='bx bx cil-bell nav__icon' ></i>
                            <span class="nav__name">Notificaciones</span>
                        </a>
                    </div>
                </div>

                <div>
                    <a href="#" class="nav__link">
                        <i class='bx cil-account-logout nav__icon' ></i>
                        <span class="nav__name">Cerrar Sesión</span>
                    </a>

                    <div class="nav__user">
                        <img class='bx nav__user-img' src="assets/img/img_usuario.png">
                        <div class="nav__user-info">
                            <span class="nav__user-name">Tienda Benavides</span>
                            <span class="nav__user-company">Supermercado Wong</span>
                        </div>
                    </div>
                </div>
            </nav>
            
            <i class='bx bx nav__icon open' id="openMenu" onclick="openMenu()">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.1401 17.7803L10.0795 16.7197L14.7991 12L10.0795 7.28032L11.1401 6.21973L16.9204 12L11.1401 17.7803Z" fill="#333333"/>
                </svg>
            </i>
        </div>

        <!-- DATOS GENERALES -->
        <div id="datosGenerales">
            <!-- TABS -->
            <header class="header" id="header">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" 
                                id="pills-home-tab" 
                                data-bs-toggle="pill" 
                                data-bs-target="#pills-home"
                                type="button"
                                role="tab"
                                aria-controls="pills-home"
                                aria-selected="true">Primer nivel</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" 
                                id="pills-profile-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-profile"
                                type="button"
                                role="tab"
                                aria-controls="pills-profile"
                                aria-selected="false">Segundo nivel</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link"
                                id="pills-contact-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-contact"
                                type="button"
                                role="tab"
                                aria-controls="pills-contact"
                                aria-selected="false">Tercer Nivel</button>
                    </li>
                </ul>
            </header>
            
            <!-- CONTENIDO TABS -->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active"
                     id="pills-home"
                     role="tabpanel"
                     aria-labelledby="pills-home-tab">
                     <div class="container-fluid p-0">
                         <div class="row g-0"> 
                             <div class="col-6">
                                <div class="row g-0 d-flex align-items-stretch" style="margin-right: 16px;">
                                    <div class="col-6">
                                        <div class="card-custom acercamientos-total">
                                            <h2>Acercamientos en total</h2>
                                            <div class="value">
                                                <span class="number"><?php echo $cont?></span>
                                                <div class="caption">
                                                    <span class="percent">
                                                        <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.7073 0V1.16231H13.0458L6.27146 8.04075L3.69582 5.42555L0 9.1781L0.809465 10L3.69582 7.06927L6.27146 9.68447L13.8553 1.98421V4.35866H15V0H10.7073Z" fill="#333333"/>
                                                        </svg>
                                                        12%
                                                    </span>
                                                    <p>comparativa con el día anterior</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="card-custom promedio-acercamientos">
                                            <h2>Promedio de acercamientos</h2>
                                            <div class="value">
                                                <span class="number">32</span>
                                                <div class="caption">
                                                    <p>acercamientos por hora</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-0" style="margin-right: 16px;">
                                    <div class="col-12 card-custom acercamientos-hora">
                                        <h2>Acercamientos por Hora</h2>
                                        <canvas id="myChart" width="553" height="244"></canvas>
                                        <button type="button" class="btn download"><i class="cil-data-transfer-down"></i>Descargar datos</button>
                                    </div>
                                </div>
                             </div>

                             <div class="col-6">
                                <div class="card-custom acercamientos-sectores">
                                    <h2>Acercamientos por Sectores</h2>

                                    <!-- Tab de Sectores -->
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-todos-tab" data-bs-toggle="pill" data-bs-target="#pills-todos" type="button" role="tab" aria-controls="pills-todos" aria-selected="true">Todos los sectores</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-sectorA-tab" data-bs-toggle="pill" data-bs-target="#pills-sectorA" type="button" role="tab" aria-controls="pills-sectorA" aria-selected="false">Sector A</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-sectorB-tab" data-bs-toggle="pill" data-bs-target="#pills-sectorB" type="button" role="tab" aria-controls="pills-sectorB" aria-selected="false">Sector B</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-sectorC-tab" data-bs-toggle="pill" data-bs-target="#pills-sectorC" type="button" role="tab" aria-controls="pills-sectorC" aria-selected="false">Sector C</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-sectorD-tab" data-bs-toggle="pill" data-bs-target="#pills-sectorD" type="button" role="tab" aria-controls="pills-sectorD" aria-selected="false">Sector D</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-sectorE-tab" data-bs-toggle="pill" data-bs-target="#pills-sectorE" type="button" role="tab" aria-controls="pills-sectorE" aria-selected="false">Sector E</button>
                                        </li>
                                    </ul>

                                    <!-- Contenido Tab de Sectores -->
                                    <div class="tab-content" id="pills-tabContent">

                                        <!-- Contenido tab "Todos los Sectores" -->
                                        <div class="tab-pane fade show active" id="pills-todos" role="tabpanel" aria-labelledby="pills-todos-tab">
                                            
                                            <!-- Imagen todos los Sectores -->
                                            <div class="contenedor-mapa-sectores">
                                                <img src="assets/img/todosSectores.png">
                                                <div class="zoom">
                                                    <button class="rounded-circle"><i class="cil-plus"></i></button>
                                                    <button class="rounded-circle"><i class="cil-minus"></i></button>
                                                </div>
                                            </div>

                                            <div class="container-data">
                                        
                                                <!-- Data Sector A -->
                                                <div class="data-bar">
                                                    <p><strong>Sector A</strong> - 210 acercamientos
                                                        <span class="percent">
                                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.7073 0V1.16231H13.0458L6.27146 8.04075L3.69582 5.42555L0 9.1781L0.809465 10L3.69582 7.06927L6.27146 9.68447L13.8553 1.98421V4.35866H15V0H10.7073Z" fill="#333333"/>
                                                            </svg>
                                                            20%
                                                        </span>
                                                    </p>
                                                    <div class="bar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span>42%</span>
                                                    </div>
                                                </div>

                                                <!-- Data Sector B -->
                                                <div class="data-bar">
                                                    <p><strong>Sector B</strong> - 50 acercamientos
                                                        <span class="percent">
                                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.7073 0V1.16231H13.0458L6.27146 8.04075L3.69582 5.42555L0 9.1781L0.809465 10L3.69582 7.06927L6.27146 9.68447L13.8553 1.98421V4.35866H15V0H10.7073Z" fill="#333333"/>
                                                            </svg>
                                                            2%
                                                        </span>
                                                    </p>
                                                    <div class="bar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span>10%</span>
                                                    </div>
                                                </div>

                                                <!-- Data Sector C -->
                                                <div class="data-bar">
                                                    <p><strong>Sector C</strong> - 110 acercamientos
                                                        <span class="percent">
                                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.7073 0V1.16231H13.0458L6.27146 8.04075L3.69582 5.42555L0 9.1781L0.809465 10L3.69582 7.06927L6.27146 9.68447L13.8553 1.98421V4.35866H15V0H10.7073Z" fill="#333333"/>
                                                            </svg>
                                                            12%
                                                        </span>
                                                    </p>
                                                    <div class="bar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span>22%</span>
                                                    </div>
                                                </div>

                                                <!-- Data Sector D -->
                                                <div class="data-bar">
                                                    <p><strong>Sector D</strong> - 40 acercamientos
                                                        <span class="percent">
                                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: scaleY(-1);">
                                                                <path d="M10.7073 0V1.16231H13.0458L6.27146 8.04075L3.69582 5.42555L0 9.1781L0.809465 10L3.69582 7.06927L6.27146 9.68447L13.8553 1.98421V4.35866H15V0H10.7073Z" fill="#333333"/>
                                                            </svg>
                                                            4%
                                                        </span>
                                                    </p>
                                                    <div class="bar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span>8%</span>
                                                    </div>
                                                </div>

                                                <!-- Data Sector E -->
                                                <div class="data-bar">
                                                    <p><strong>Sector E</strong> - 90 acercamientos
                                                        <span class="percent">
                                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.7073 0V1.16231H13.0458L6.27146 8.04075L3.69582 5.42555L0 9.1781L0.809465 10L3.69582 7.06927L6.27146 9.68447L13.8553 1.98421V4.35866H15V0H10.7073Z" fill="#333333"/>
                                                            </svg>
                                                            8%
                                                        </span>
                                                    </p>
                                                    <div class="bar">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span>18%</span>
                                                    </div>
                                                </div>

                                            </div>

                                            <p class="caption">comparativa con el día anterior</p>
                                            <button type="button" class="btn download"><i class="cil-data-transfer-down"></i>Descargar datos</button>
                                        </div>

                                        <!-- Contenido tabs sector por sector -->
                                        <div class="tab-pane fade" id="pills-sectorA" role="tabpanel" aria-labelledby="pills-sectorA-tab">Sector A</div>
                                        <div class="tab-pane fade" id="pills-sectorB" role="tabpanel" aria-labelledby="pills-sectorB-tab">Sector B</div>
                                        <div class="tab-pane fade" id="pills-sectorC" role="tabpanel" aria-labelledby="pills-sectorC-tab">Sector C</div>
                                        <div class="tab-pane fade" id="pills-sectorD" role="tabpanel" aria-labelledby="pills-sectorD-tab">Sector D</div>
                                        <div class="tab-pane fade" id="pills-sectorE" role="tabpanel" aria-labelledby="pills-sectorE-tab">Sector E</div>
                                    </div>
                                 </div>
                            </div>    
                         </div>
                     </div>
                </div>

                <div class="tab-pane fade"
                     id="pills-profile"
                     role="tabpanel"
                     aria-labelledby="pills-profile-tab">
                    <p>Puto uwu</p>
                </div>

                <div class="tab-pane fade"
                     id="pills-contact"
                     role="tabpanel"
                     aria-labelledby="pills-contact-tab">
                    <p>GA</p>
                </div>
            </div>
        </div>

        <!-- NOTIFICACIONES -->
        <div id="notificaciones">
            <!-- TABS -->
            <header class="header" id="header">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation" style="width: 180px;">
                        <button class="nav-link active" 
                                style="width: 100%;"
                                id="pills-home-tab" 
                                data-bs-toggle="pill" 
                                data-bs-target="#pills-home"
                                type="button"
                                role="tab"
                                aria-controls="pills-home"
                                aria-selected="true">
                                <div class="row">
                                    <div class="col-8" style="text-align: end; padding-right: 0;">
                                        Primer nivel
                                    </div>
                                    <div class="col-2">
                                        <div class="rounded-circle" style="color: #333333; font-weight: 500; font-size: 12px; background-color: #F1C400; width: 20px; height: 20px;">4</div>
                                    </div>
                                </div>
                        </button>  
                    </li>
                    <li class="nav-item" role="presentation" style="width: 200px;">
                        <button class="nav-link" 
                                style="width: 100%;"
                                id="pills-profile-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-profile"
                                type="button"
                                role="tab"
                                aria-controls="pills-profile"
                                aria-selected="false">
                                <div class="row">
                                    <div class="col-8" style="text-align: end; padding-right: 0;">
                                        Segundo nivel
                                    </div>
                                    <div class="col-2">
                                        <div class="rounded-circle" style="color: #333333; font-weight: 500; font-size: 12px; background-color: #F1C400; width: 20px; height: 20px;">1</div>
                                    </div>
                                </div>
                            </button>
                    </li>
                    <li class="nav-item" role="presentation" style="width: 180px;">
                        <button class="nav-link"
                                style="width: 100%;"
                                id="pills-contact-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-contact"
                                type="button"
                                role="tab"
                                aria-controls="pills-contact"
                                aria-selected="false">
                                <div class="row">
                                    <div class="col-8" style="text-align: end; padding-right: 0;">
                                        Tercer nivel
                                    </div>
                                    <div class="col-2">
                                        <div class="rounded-circle" style="color: #333333; font-weight: 500; font-size: 12px; background-color: #F1C400; width: 20px; height: 20px;">1</div>
                                    </div>
                                </div>
                            </button>
                    </li>
                </ul>
            </header>

            <!-- CONTENIDO TABS -->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active"
                     id="pills-home"
                     role="tabpanel"
                     aria-labelledby="pills-home-tab">
                     <div class="container-fluid p-0">
                         <div class="row g-0"> 
                             <div class="col-4">
                                <div class="row g-0 d-flex align-items-stretch notificaciones" style="margin-right: 16px; height: calc(100vh - 104px); overflow: auto;">
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total" style="border: solid 1px; border-color: #EF426F;">
                                            <div class="row">
                                                <div class="col-1" style="position: relative;">
                                                    <div class="rounded-circle" style="background-color: #F1C400; width: 8px; height: 8px; position: absolute; top: 14px; left: 5px;"></div>
                                                </div>
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #666666;">Hay clientes que han permanecido a menos de 1.5 metros de distancia por más de 30 segundos.</h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-1" style="position: relative;">
                                                    <div class="rounded-circle" style="background-color: #F1C400; width: 8px; height: 8px; position: absolute; top: 14px; left: 5px;"></div>
                                                </div>
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector C</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">12:45 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-1" style="position: relative;">
                                                    <div class="rounded-circle" style="background-color: #F1C400; width: 8px; height: 8px; position: absolute; top: 14px; left: 5px;"></div>
                                                </div>
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">12:23 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-1" style="position: relative;">
                                                    <div class="rounded-circle" style="background-color: #F1C400; width: 8px; height: 8px; position: absolute; top: 14px; left: 5px;"></div>
                                                </div>
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector E</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">11:58 AM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector B</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" style="margin-bottom: 20px;">
                                        <div class="card-custom acercamientos-total">
                                            <div class="row">
                                                <div class="col-12" style="margin: 10px;">
                                                    <h2 style="font-weight: 700px; font-size: 16px; color: #333333;">Se han detectado acercamientos en el <strong>Sector D</strong></h2>
                                                    <h2 style="font-weight: 500px; font-size: 14px; color: #333333; margin-bottom: 0;">1:24 PM</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                             </div>

                             <div class="col-8" style="position: relative; background: #ffffff; height: calc(100vh - 135px); border-radius: 10px;">
                                <img src="assets/img/sectoresNotif.png" style="position: absolute; left: 35%; top: 18%;">
                                <div style="position: absolute;right: 24px; bottom: 24px; width: 32px; height: 72px;">
                                    <div class="rounded-circle" style="border: solid 1px; border-color: #E9E6EE; width: 32px; height: 32px; margin-bottom: 8px; position: relative; cursor: pointer;">
                                        <i class="cil-plus" style="color: #333333; position: absolute; top: 7px; left: 7px;"></i>
                                    </div>
                                    <div class="rounded-circle" style="border: solid 1px; border-color: #E9E6EE; width: 32px; height: 32px; position: relative; cursor: pointer;">
                                        <i class="cil-minus" style="color: #333333; position: absolute; top: 7px; left: 7px;"></i>
                                    </div>
                                </div>
                            </div>    
                         </div>
                     </div>
                </div>

                <div class="tab-pane fade"
                     id="pills-profile"
                     role="tabpanel"
                     aria-labelledby="pills-profile-tab">
                    <p>Puto uwu</p>
                </div>

                <div class="tab-pane fade"
                     id="pills-contact"
                     role="tabpanel"
                     aria-labelledby="pills-contact-tab">
                    <p>GA</p>
                </div>
            </div>
        </div>

        <!-- PLUGINS -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- CUSTOM --> 
        <script src="assets/js/main.js"></script>
    </body>
</html>