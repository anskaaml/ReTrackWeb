@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    Maps
@endsection

@section('content')
<?php
    function getAddress($lat,$lng)
    {
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&key=AIzaSyB1JkAkXXIIS0UWKlJQt9fsO-v6sg4Cdug';
        $json = @file_get_contents($url);
        $data = json_decode($json);
        $status = $data->status;
        
        if ($status == "OK")
            return $data->results[0]->formatted_address;
        else
            return false;
    }
?>
<div class="maps" id="maps"> 
</div> 
{{ Form::open(['route' => 'case_entry.store', 'class' => 'wrap-map' ]) }}
    <input class="input-assign" type="text" name="lokasi" disabled="true" value="<?php
        if($case_entry->case_latitude && $case_entry->case_longitude) {
            echo(getAddress($case_entry->case_latitude, $case_entry->case_longitude));
        } else {
            echo "Location";
        }
    ?>">
    <br>
    <input class="input-assign" type="text" name="category" disabled="true" value="<?php
        if($case_entry->category_id) {
            echo($case_entry->category->category_name);
        } else {
            echo "Category";
        }
    ?>">
    <br>
    {{ Form::select('total_car', [null=>'Jumlah Mobil'] + $chooseTotal, Request::old('total_car'), ['class' => 'select-assign']) }}
    <br>
    <textarea class="input-deskripsi" name="deskripsi" placeholder="Deskripsi" disabled="true">{{ $case_entry-> case_description }}</textarea>
    <br>
    <br>
    <button class="assign-btn">Assign Tugas</button>
{{ Form::close() }}

    <script>
        var map;
        var markerList = [];
        var gmapMarkers = [];

        setInterval(function () {
            reloadMarker();
        }, 10000);

        function isMarkerExist(data){
            var found = false;

            for (var i = 0 ; i < markerList.length ; i++){
                if (markerList[i].history_id == data.history_id) {
                    found = true;
                    break;
                } else if (markerList[i].team_id == data.team_id) {
                    markerList.splice(i, 1);
                    gmapMarkers[i].setMap(null);
                    gmapMarkers.splice(i, 1);
                    break;
                }
            }

            if (!found){
                markerList.push(data);
            }

            return found;
        }
        
        function addMarker(data){
            var exist = isMarkerExist(data);
            
            if (!exist){
                var dateTime = new Date(data.history_datetime + ' UTC');
                var contentString = 
                    '<div id="content">'+
                        '<div id="siteNotice">'+'</div>'+
                        '<div id="bodyContent">'+
                            '<p> User :' + data.user.user_employee_id +'</p>'+
                            '<p> Team :' + data.team_id +'</p>'+
                            '<p> Long :' + data.history_longitude +'</p>'+
                            '<p> Lat :' + data.history_latitude +'</p>'+
                            '<p> Time :' + dateTime +'</p>'+
                        '</div>'+
                    '</div>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                var marker = new google.maps.Marker({
                    // draggable: true,
                    map : map,
                    position:
                    {
                        lat: parseFloat(data.history_latitude),
                        lng: parseFloat(data.history_longitude)
                    },
                    //label: location.user.user_employee_id,
                    icon: '{{ asset('assets/img/police-car.png') }}'
                })
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
                
                marker.setMap(map);
                gmapMarkers.push(marker);
            }

        }

        function attachMapEvent(map){
            google.maps.event.addListener(map, 'click', function(){
                //alert("A");
            });
        }

        function reloadMarker(){
            $.ajax({
                url: 'https://api.retrack-app.site/history/latest',
                crossDomain: true,
                async: false,
                type: 'GET',
                contentType: 'json',
                headers: {
                    'Authorization': 'Bearer <?php echo Session::get('token');?>'
                },
                success: function (result) {
                    for (let i = 0; i < result.length; i++) {
                        addMarker(result[i]);
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function initMap(){
            var el = document.getElementById('maps');

            map = new google.maps.Map(el, getMapOption());

            attachMapEvent(map)
        }

        function getMapOption(){    
            var loc = {lat: -7.27674670, lng: 112.79474210};
            var opt =  {
                zoom: 18, 
                center: loc,
                scaleControl: true
            };
            
            return opt;
        }
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>	
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1JkAkXXIIS0UWKlJQt9fsO-v6sg4Cdug&callback=initMap"></script>
@endsection