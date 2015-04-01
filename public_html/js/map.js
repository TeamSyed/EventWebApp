

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
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer();
    directionsDisplay.setMap(map);
    calcRoute();


    function calcRoute() {
        var start = stavanger;
        var end = amsterdam;
        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                map.fitBounds(response.routes[0].bounds);
                createPolyline(response);
                
            }
        });
    }
    function createPolyline(directionResult) {
        var line = new google.maps.Polyline({
            path: directionResult.routes[0].overview_path,
            strokeColor: 'blue',
            strokeOpacity: 0.5,
            strokeWeight: 4
        });

        line.setMap(map);

        for (var i = 0; i < line.getPath().length; i++) {
            var marker = new google.maps.Marker({
                icon: { path: google.maps.SymbolPath.CIRCLE, scale: 1 },
                position: line.getPath().getAt(i),
                map: map
            });
        }
    }

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
    

}

google.maps.event.addDomListener(window, 'load', initialize);