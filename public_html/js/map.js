

function initialize() {
    var startLong = document.getElementById("long").textContent;
    var startLat = document.getElementById("lat").textContent;
    var endLong = document.getElementById("endLong").textContent;
    var endLat = document.getElementById("endLat").textContent;
    var stavanger = new google.maps.LatLng(startLong, startLat);
    var amsterdam = new google.maps.LatLng(endLat, endLong);
    
        
    
    //console.log(startLat, startLong, stavanger);
    
    var mapProp = {
        center: stavanger,
        zoom: 15,
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
    var markerStart = new google.maps.Marker({
        position: stavanger,
        animation: google.maps.Animation.BOUNCE
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