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
        setInterval(function () {
            refreshMarkers(map);
            clusterMarkers(map, markers);
        }, 20000);

        var map;
        var markers = [];
        function initMap(){
            var loc = {lat: -7.27674670, lng: 112.79474210};
            map = new google.maps.Map(
                document.getElementById('maps'), {
                    zoom: 14, 
                    center: loc
                });
            refreshMarkers(map);
            clusterMarkers(map, markers);
        }

        function clusterMarkers(map, markers) {
            var markerCluster = new MarkerClusterer(map, markers, 
                {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
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
                    for (let i = 0; i < result.length; i++) {
                            locations.push(result[i]);
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
            markers = locations.map(function(location){
                return new google.maps.Marker({
                    position:
                    {
                        lat: parseFloat(location.history_latitude),
                        lng: parseFloat(location.history_longitude)
                    },
                });
            });
        }
    </script>
@endsection