/**
 * Created with JetBrains PhpStorm.
 * User: Rafael Fonseca
 * Date: 20/07/13
 * Time: 00:47
 * To change this template use File | Settings | File Templates.
 */

var map;
var infowindow;
var inativo = 'images/i12.png';
var ativo = 'images/i11.png';

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
    };

    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

    var request = {
        location: cidade,
        radius: 2600,
        types: ['restaurant']
    };

    infowindow = new google.maps.InfoWindow();

    var estabelecimentos = $.ajax({
        url: 'index.php/site/procuraEstabelecimento',
        type: "POST",
        error: function(xhr,tStatus,e){
            if(!xhr){
                alert(" We have an error ");
                alert(tStatus+"   "+e.message);
            }else{
                alert("else: "+e.message); // the great unknown
            }
        },
        success: function(data){
            data = jQuery.parseJSON(data);
            for (var i = 0; i < data.length; i++) {
                createMarker(jQuery.parseJSON(data[i]).jsonDataSource);
            }
        }
    });

    /*var service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);*/
}


function createMarker(estabelecimento) {
    /*var placeLoc = place.geometry.location;*/
    var texto = '';
    var marker = new MarkerWithLabel({
        map: map,
        position: new google.maps.LatLng(estabelecimento.attributes.latitude, estabelecimento.attributes.longitude),
        title: estabelecimento.attributes.nome,
        labelContent: estabelecimento.attributes.nome,
        labelClass: "labels"
    });
    var novidades = estabelecimento.relations.novidades;

    if (novidades.length > 0) {
        texto = estabelecimento.relations.novidades[0].texto;
        marker.setIcon(ativo);
    } else {
        marker.setIcon(inativo);
    }

    google.maps.event.addListener(marker, 'click', function() {
        if (texto === ''){
            texto = 'Desculpe, mas não temos nenhuma novidade do dia hoje.';
        }
            infowindow.setContent(
                "<div class=''>" +
                    "<div class='page-header'>" +
                    "<h3>" + estabelecimento.attributes.nome + "</h3>" +
                    "</div>" +
                    "<address>" +
                    "<strong>" + estabelecimento.attributes.nome + "</strong><br>" +
                    estabelecimento.attributes.endereco + "<br>" + 
                    "<abbr>Telefone:</abbr>" + estabelecimento.attributes.telefone +
                    "</address>" +
                    "<div class='row-fluid'>" +
                        "<div class='span12'>" +
                            "<blockquote>" +
                                "<p>" + texto + "</p>" +
                            "</blockquote>" +
                        "</div>" +
                    "</div>" +
                    "<div class='form-actions'>" +
                        "<p>" +
                            "<strong>Compartilhe essa novidade e convide seus amigos para aproveitarem!</strong>" +
                        "</p>" +
                        "<img src='images/social/fb.png'/>" +
                        "<img src='images/social/g.png'/>" +
                        "<img src='images/social/twt.png'/>" +
                    "</div>" +
                "</div>"
            );

    infowindow.open(map, this);
    });
}

google.maps.event.addDomListener(window, 'load', initialize);