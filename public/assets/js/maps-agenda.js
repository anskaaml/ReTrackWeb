
var map;
function initMap(){
                // var loc = {lat: -7.27674670, lng: 112.79474210};
                // var map = new google.maps.Map(
                //     document.getElementById('maps-agenda'), {
                //         zoom: 15, 
                //         center: loc
                //         });
                // var marker = new google.maps.Marker({
                //     position: loc,
                //     map: map
                // });
                // var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                // var markers = locations.map(function(location, i){
                //     return new google.maps.Marker({
                //         position: location,
                //         label: labels[i % labels.length]
                //     });
                // });
                // var markerCluster = new MarkerClusterer(map, markers, 
                //     {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

  var myLatlng = new google.maps.LatLng(-7.27674670,112.79474210);
  var myOptions = {
    zoom: 15,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(document.getElementById("maps-agenda"), myOptions);

  google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(event.latLng);
  });

  google.maps.event.addListener(map,'click',function(event) {   
    var i=0;
      ++i;             
        document.getElementById('latclicked')[i].innerHTML = event.latLng.lat();
        document.getElementById('longclicked')[i].innerHTML =  event.latLng.lng();
    });
}

function placeMarker(location) {
  var marker = new google.maps.Marker({
      position: location, 
      map: map
  });

  map.setCenter(location);
}
            