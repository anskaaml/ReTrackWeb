@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    Maps
@endsection

@section('content')
    <div class="maps" id="maps">
        <?= date('m/d/Y h:i:s a') ?> 
    </div> 
        <form class="wrap-map">
            <input class="input-assign-lokasi" type="text" name="lokasi" placeholder="Lokasi Tujuan">
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
            <input class="input-assign-upload" type="text" name="upload-foto" placeholder="Upload Foto">
        <br>
            <button class="assign-btn">Assign Tugas</button>
        </form>

            <script>
                function initMap(){
                var loc = {lat: -7.27674670, lng: 112.79474210};
                var map = new google.maps.Map(
                    document.getElementById('maps'), {
                        zoom: 4, 
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
            </script>

        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script async defer 
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1JkAkXXIIS0UWKlJQt9fsO-v6sg4Cdug&callback=initMap">
        </script>         
@endsection




