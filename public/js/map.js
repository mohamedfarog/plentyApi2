//map.js

//Set up some of our variables.
var map; //Will contain map object.
var marker = false; ////Has the user plotted their location marker? 
var splat;
var splong;
var x = document.getElementById("demo");
//Function called to initialize / create the map.
//This is called when the page has loaded.
function initMap() {
    var centerOfMap = new google.maps.LatLng(24.481012487789346, 54.36327190812389);




    //Map options.
    var options = {
        center: centerOfMap, //Set center.
        zoom: 14 //The zoom value.
    };
    infoWindow = new google.maps.InfoWindow;
    //Create the map object.
    map = new google.maps.Map(document.getElementById('map'), options);
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            infoWindow.setPosition(pos);
            infoWindow.setContent('You are here:<br>Lat: ' + pos.lat + '<br>Long: ' + pos.lng);
            marker = new google.maps.Marker({
                position: pos,
                map: map
            });

            infoWindow.open(map, marker);
            map.setCenter(pos);
            $('#lat').val(position.coords.latitude);
            $("#lng").val(position.coords.longitude);

        }, function () {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
    google.maps.event.addListener(map, "click", function (e) {
        latLng = e.latLng;
        $("#latitude").val(e.latLng.lat());
        $('input[name=longitude]').val(e.latLng.lng());

        // if marker exists and has a .setMap method, hide it
        if (marker && marker.setMap) {
            marker.setMap(null);
        }
        marker = new google.maps.Marker({
            position: latLng,
            map: map
        });
        infoWindow.setPosition(latLng);
        infoWindow.setContent('You have selected:<br>Lat: ' + e.latLng.lat() + '<br>Long: ' + e.latLng.lng());
        infoWindow.open(map, marker);
        $('#lat').val(e.latLng.lat());
        $("#lng").val(e.latLng.lng());
    });


}
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}

function getLocation() {
 
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {

                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                console.log(pos.lat);
                console.log(pos.lng);
                infoWindow.setPosition(pos);
                infoWindow.setContent('You are here:<br>Lat: ' + pos.lat + '<br>Long: ' + pos.lng);
                if (marker && marker.setMap) {
                    marker.setMap(null);
                }

                marker = new google.maps.Marker({
                    position: pos,
                    map: map
                });
                $('#lat').val(pos.lat);
                $("#lng").val(pos.lng);

                infoWindow.open(map, marker);
                map.setCenter(pos);

            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
 
}



//This function will get the marker's current location and then add the lat/long
//values to our textfields so that we can save the location.
function markerLocation() {
    //Get location.
    var currentLocation = marker.getPosition();
    //Add lat and lng values to a field that we can save.
    document.getElementById('lat').value = currentLocation.lat(); //latitude
    document.getElementById('lng').value = currentLocation.lng(); //longitude
}

function getsaloonloc(){
   
        var addeditlat = parseFloat($('#lat').val());
        var addeditlng = parseFloat($("#lng").val());
        var posy = {
            lat: addeditlat,
            lng: addeditlng
        };
        infoWindow.setPosition(posy);
        infoWindow.setContent('Salon here:<br>Lat: ' + posy.lat + '<br>Long: ' + posy.lng);
        if (marker && marker.setMap) {
            marker.setMap(null);
        }
        marker = new google.maps.Marker({
            position: posy,
            map: map
        });
        infoWindow.open(map, marker);
        map.setCenter(posy);
    
}


//Load the map when the page has finished loading.
google.maps.event.addDomListener(window, 'load', initMap);