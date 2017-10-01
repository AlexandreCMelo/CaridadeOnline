$(document).ready(function () {
    function teste() {

        var myLatLng = new google.maps.LatLng(-23.6386439, -46.6663268);

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 8
        });


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
    }

    google.maps.event.addDomListener(window, "load", teste);
});

