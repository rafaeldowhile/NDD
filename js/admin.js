/**
 * Created with JetBrains PhpStorm.
 * User: Rafael Fonseca
 * Date: 23/07/13
 * Time: 00:24
 * To change this template use File | Settings | File Templates.
 */
var marker;

function placeMarker(location) {
    if ( marker ) {
        marker.setPosition(location);
    } else {
        marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }
}

google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(event.latLng);
});