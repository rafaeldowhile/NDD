/**
 * Created with JetBrains PhpStorm.
 * User: Rafael Fonseca
 * Date: 20/07/13
 * Time: 00:47
 * To change this template use File | Settings | File Templates.
 */

var map;
var infowindow
var inativo = 'images/i7.png';
var ativo = 'images/i8.png';

function initialize() {

    var cidade = new google.maps.LatLng(-30.103040, -51.254484);

    var mapOptions = {
        zoom: 16,
        mapTypeControl: true,
        center: cidade,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
        },
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL
        },
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

    var request = {
        location: cidade,
        radius: 2600,
        types: ['restaurant']
    };

    infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);
}

function callback(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
        }
    }
}

/*
 A cada novo marcador, será consultado no banco de dados se ele já existe.
 */
function createMarker(place) {
    var texto = "";
    var placeLoc = place.geometry.location;
    var marker = new MarkerWithLabel({
        map: map,
        position: place.geometry.location,
        title: place.name,
        labelContent: place.name,
        labelClass: "labels"
    });

    jQuery.ajax({
        // The url must be appropriate for your configuration;
        // this works with the default config of 1.1.11
        url: 'index.php?r=site/procuraEstabelecimento',
        type: "POST",
        data: {
            ajaxData: {
                latitude: marker.getPosition().lat(),
                longitude: marker.getPosition().lng(),
                title: place.name
            }
        },
        error: function(xhr,tStatus,e){
            if(!xhr){
                alert(" We have an error ");
                alert(tStatus+"   "+e.message);
            }else{
                alert("else: "+e.message); // the great unknown
            }
        },
        success: function(resp){
            texto = resp;

            if (texto === '') {
                marker.setIcon(inativo);
            } else {
                marker.setIcon(ativo);
            }
        }
    });

    google.maps.event.addListener(marker, 'click', function() {
        if (texto !== '') {
            infowindow.setContent("<h3 style='color: #3A4A9F'>" + place.name  + "</h3>"+ "<p><strong>Novidia: </strong>" + texto + "</p>");
        } else {
            infowindow.setContent("<h3 style='color: #1F231E'>" + place.name  + "</h3>"+ "<p><strong>Infelizmente não temos nenhuma novidade hoje.</strong></p>");
        }
        infowindow.open(map, this);
    });
}

google.maps.event.addDomListener(window, 'load', initialize);