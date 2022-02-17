$(document).ready(function(){

    var urlPrimerGps = 'https://distanciometro.d2interfaces.com/php/consultar_coordenadas.php?id=0';
    var urlSegundoGps = 'https://distanciometro.d2interfaces.com/php/consultar_coordenadas.php?id=1';

    var latitudPrimerGps, longitudPrimerGps, latitudSegundoGps, longitudSegundoGps, latitudDistancia, longitudDistancia;

    var cont = 0;
    var pi80 = Math.PI / 180;
    var r = 6378.10;

    function acercamientosTotales() {

        $.getJSON(urlPrimerGps, function(datos) {

            latitudPrimerGps = pi80 * datos.latitud;
            longitudPrimerGps = pi80 * datos.longitud;

        })

        $.getJSON(urlSegundoGps, function(datos) {
            
            latitudSegundoGps = pi80 * datos.latitud;
            longitudSegundoGps = pi80 * datos.longitud;

        })
        
        console.log('Latitud Primer GPS: ' + latitudPrimerGps + ' Longitud Primer GPS: ' + longitudPrimerGps);
        console.log('Latitud Segundo GPS: ' + latitudSegundoGps + ' Longitud Segundo GPS: ' + longitudSegundoGps);

        latitudDistancia = latitudSegundoGps - latitudPrimerGps;
        longitudDistancia = longitudSegundoGps - longitudPrimerGps;

        var a = Math.pow(Math.sin(latitudDistancia / 2), 2) + Math.cos(latitudPrimerGps) * Math.cos(latitudSegundoGps) * Math.pow(Math.sin(longitudDistancia / 2), 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var km = r * c;

        console.log(km);

        if(km < 0.0015) {
            cont++;
        }

        $('#acercamientos_totales').html(cont);

    }

    setInterval(acercamientosTotales, 1000);

});

