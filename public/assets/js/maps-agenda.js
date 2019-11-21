function initMap(){
                var loc = {lat: -7.27674670, lng: 112.79474210};
                var map = new google.maps.Map(
                    document.getElementById('maps-agenda'), {
                        zoom: 15, 
                        center: loc
                        });
                var marker = new google.maps.Marker({
                    position: loc,
                    map: map
                });
                var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                var markers = locations.map(function(location, i){
                    return new google.maps.Marker({
                        position: location,
                        label: labels[i % labels.length]
                    });
                });
                var markerCluster = new MarkerClusterer(map, markers, 
                    {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
                
        }
            var locations = [
                {lat: -7.1243529 , lng: 112.56474210 },
                {lat: -7.0876776 , lng: 113.43549640 },
                {lat: -3.4649609 , lng: 112.45684954 },
                {lat: -2.1243529 , lng: 111.56474210 },
            ]