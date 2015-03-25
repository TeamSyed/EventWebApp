var x = new google.maps.LatLng(52.395715, 4.888916);
var stavanger = new google.maps.LatLng(58.983991, 5.734863);
var amsterdam = new google.maps.LatLng(52.395715, 4.888916);
var london = new google.maps.LatLng(51.508742, -0.120850);

function initialize() {
    var mapProp = {
        center: x,
        zoom: 5,
        panControl: true,
        zoomControl: true,
        mapTypeControl: true,
        scaleControl: true,
        streetViewControl: true,
        overviewMapControl: true,
        rotateControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("gooogleMap"), mapProp);

    var myTrip = [stavanger, amsterdam];
    var flightPath = new google.maps.Polyline({
        path: myTrip,
        strokeColor: "#0000FF",
        strokeOpacity: 0.8,
        strokeWeight: 2
    });
    var markerStart=new google.maps.Marker({
        position:stavanger,
        animation:google.maps.Animation.BOUNCE
    });
    var markerEnd = new google.maps.Marker({
        position: amsterdam,
        animation: google.maps.Animation.BOUNCE
    });

    markerStart.setMap(map);
    markerEnd.setMap(map);


    flightPath.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);