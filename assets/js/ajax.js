$(document).ready(function(){

    var urlPrimerGps = 'https://distanciometro.d2interfaces.com/php/consultar_coordenadas.php?id=0';
    var urlSegundoGps = 'https://distanciometro.d2interfaces.com/php/consultar_coordenadas.php?id=1';

    var lat1, lng1, lat2, lng2;

    var cont = 0;
    var estadoAcercamiento = 0; // 0 es igual a sin acercamiento y 1 es igual a en acercamiento
    var r = 6378137; // Radio de la tierra en metros

    function aRadianes(coordenada) {
        return coordenada * Math.PI / 180;
    }

    function calcularDistancia(){
        $.getJSON(urlPrimerGps, function(datos) { // Obtenemos las coordenadas del primer GPS
            lat1 = datos.latitud;
            lng1 = datos.longitud;
        })

        $.getJSON(urlSegundoGps, function(datos) { // Obtenemos las coordenadas del segundo GPS
            lat2 = datos.latitud;
            lng2 = datos.longitud;
        })

        var diferenciaLat = aRadianes(lat2 - lat1);
        var diferenciaLng = aRadianes(lng2 - lng1);

        var a = Math.sin(diferenciaLat / 2)
                *
                Math.sin(diferenciaLat / 2)
                +
                Math.cos(aRadianes(lat1))
                *
                Math.cos(aRadianes(lat2))
                *
                Math.sin(diferenciaLng / 2)
                *
                Math.sin(diferenciaLng / 2);

        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var distancia = r * c;

        console.log(distancia);

        if(estadoAcercamiento == 0 && distancia <= 10) {
            cont++;
            estadoAcercamiento = 1;
        } else if(estadoAcercamiento == 1 && distancia > 10) {
            estadoAcercamiento = 0;
        }

        console.log(estadoAcercamiento);

        $('#acercamientos_totales').html(cont);
    }

    setInterval(calcularDistancia, 1000);

});

