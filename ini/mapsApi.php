
<script>
    var map;
    var marker;

    function initMap() {
        var mapOptions = {
            center: { lat: 14.991209, lng: -89.717088 },
            zoom: 17,
            mapTypeId: 'satellite'
        };

        map = new google.maps.Map(document.getElementById('map'), mapOptions);

        google.maps.event.addListener(map, 'click', function(event) {
            if (marker) {
                marker.setMap(null);
            }

            marker = new google.maps.Marker({
                position: event.latLng,
                map: map
            });

            document.getElementById('latitude').value = event.latLng.lat();
            document.getElementById('longitude').value = event.latLng.lng();
        });

        document.getElementById('center-map-button').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    map.setCenter(userLocation);
                    
                    if (marker) {
                        marker.setMap(null);
                    }

                    marker = new google.maps.Marker({
                        position: userLocation,
                        map: map
                    });

                    document.getElementById('latitude').value = userLocation.lat;
                    document.getElementById('longitude').value = userLocation.lng;
                
                });
            } else {
                alert('La geolocalización no está disponible en este navegador.');
            }
        });
    }
</script>