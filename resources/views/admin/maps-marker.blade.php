@extends('layouts.maps')

@section('title')
    ReTrack
@endsection

@section('name')
    Maps
@endsection

@section('content')
    <div id="maps">
    </div> 
    <form class="wrap-map">
        <input class="input-assign" type="text" name="lokasi" placeholder="Lokasi Tujuan">
        <br>
        <select class="select-assign" name="kategori">
            <option value="kategori">Kategori</option>
            <option value="kebakaran">Kebakaran</option>
            <option value="pembunuhan">Pembunuhan</option>
            <option value="kecelakaan">Kecelakan</option>
            <option value="pemerkosaan">Pemerkosaan</option>
        </select>
        <br>
        <input class="input-assign" type="text" name="mobil" placeholder="Jumlah Mobil">
        <br>
        <textarea class="input-deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
        <br>
        <input class="input-assign" type="text" name="upload-foto" placeholder="Upload Foto">
        <br>
        <button class="assign-btn">Assign Tugas</button>
    </form>

    <script>
        var map;
        var markerList = [];

        setInterval(function () {
            reloadMarker();
        }, 1000);

        function isMarkerExist(id){
            var found = false;

            for (i in markerList){
                var idx = markerList[i];
                if (idx == id){
                    found = true;
                    break;
                }
            }

            if (!found){
                markerList.push(id);
            }

            return found;
        }


        function addMarker(data){
            var exist = isMarkerExist(data.history_id);
            
            if (!exist){
                var marker = new google.maps.Marker({
                    draggable: true,
                    map : map,
                    position:
                    {
                        lat: parseFloat(data.history_latitude),
                        lng: parseFloat(data.history_longitude)
                    },
                    //label: location.user.user_employee_id,
                    // icon: 'https://maps.google.com/mapfiles/kml/shapes/parking_lot_maps.png'
                })
            }

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

        function attachMapEvent(map){
            google.maps.event.addListener(map, 'click', function(){
                //alert("A");
            });
        }

        function reloadMarker(){
            $.ajax({
                url: 'https://api.retrack-app.site/history',
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


        /*
        setInterval(function () {
            refreshMarkers(map);
        }, 60000);

        var map;
        var markers = [];
        var initLocations = [];
        function initMap(){
            var loc = {lat: -7.27674670, lng: 112.79474210};
            map = new google.maps.Map(
                document.getElementById('maps'), {
                    zoom: 18, 
                    center: loc,
                    scaleControl: true
                });
            initMarkers(map);
        }

        function initMarkers(map) {
            // Usually will be blocked by CORS, need some configuration in server and/or client
            $.ajax({
                url: 'https://api.retrack-app.site/history/distinct/today',
                crossDomain: true,
                async: false,
                type: 'GET',
                contentType: 'json',
                headers: {
                    'Authorization': 'Bearer <?php echo Session::get('token');?>'
                },
                success: function (result) {
                    for (let i = 0; i < result.length; i++) {
                        initLocations.push(result[i]);
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
            initLocations.forEach(showMarker);
            function showMarker(location) {
                var marker = new google.maps.Marker({
                    map : map,
                    position:
                    {
                        lat: parseFloat(location.history_latitude),
                        lng: parseFloat(location.history_longitude)
                    },
                    label: location.user.user_employee_id,
                    // icon: 'https://maps.google.com/mapfiles/kml/shapes/parking_lot_maps.png'
                })
            }
        }
        
        function refreshMarkers(map) {            
            var locations = [];
            // Usually will be blocked by CORS, need some configuration in erver and/or client
            $.ajax({
                url: 'https://api.retrack-app.site/history/distinct/today',
                crossDomain: true,
                async: false,
                type: 'GET',
                contentType: 'json',
                headers: {
                    'Authorization': 'Bearer <?php echo Session::get('token');?>'
                },
                success: function (result) {
                    if(result.length > initLocations.length) {
                        for (let i = initLocations.length ; i < result.length; i++) {
                            initLocations.push(result[i]);
                            locations.push(result[i]);
                        }
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
            console.log(locations);
            console.log(initLocations);
            locations.forEach(showMarker);
            function showMarker(location) {
                var marker = new google.maps.Marker({
                    map : map,
                    position:
                    {
                        lat: parseFloat(location.history_latitude),
                        lng: parseFloat(location.history_longitude)
                    },
                    label: location.user.user_employee_id,
                    // icon: 'https://maps.google.com/mapfiles/kml/shapes/parking_lot_maps.png'
                })
            }
        }
        */


    </script>
@endsection