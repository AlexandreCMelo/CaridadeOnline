var myLatLng;
$(document).ready(function () {


    function geoLocationInit(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(success,fail);
        }else{
            alert('old browser');
        }
    }


    function success(position){
        var latval = position.coords.latitude;
        var lngval = position.coords.longitude;

       myLatLng = new google.maps.LatLng(latval,lngval);
       createMap(myLatLng);
    }

    function fail(){
        alert('ops');
    }


    function createMap(myLatLng) {
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 8
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
        });
    }

    function createMarker(latlng, icn) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon: icn,
            title: 'Ohboy'
        });
    }

    var request = {
        location: myLatLng,
        radius: '1500',
        type: ['charity']
    };

    var service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);

    function callback(results, status) {


        if (status == google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
                var place = results[i];
                latlng = place.geometry.location;
                icn = place.icon;

                createMarker(latlng, icn);
            }
        }
    }

    geoLocationInit();
});

