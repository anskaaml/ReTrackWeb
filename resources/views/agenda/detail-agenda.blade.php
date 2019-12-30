@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    Agenda
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header"></div>
            <div class="card-body">
                <div id="myModal-agenda" class="modal-agenda">
                    <div class="modal-content-agenda">
                        <a href="{{ route('agenda') }}"> 
                            <span class="close" onclick="hide(); return false">&times;</span>
                        </a>
                        
                        <span class="form-title-agenda">Agenda Details</span>              
                        <strong>Member</strong>
                        <br>
                        @foreach($team->users as $user)
                            {{ $user->user_name }},
                        @endforeach
                        <br>
                        <strong>Car</strong>
                        <br>
                        @if($team->car)
                            {{ $team->car->car_number }}
                        @endif
                        <br>
                        <strong>Date</strong>
                        <br>
                        {{ \Carbon\Carbon::parse($team->agenda->agenda_date)-> format('d, M Y') }}
                        <br>
                        @if($team->agenda->checkpoints)
                            <div class="maps-agenda2" id="maps-agenda2"></div>  
                        @else
                            <div style="text-align:center">Map Not Rendered Because Checkpoints Isn't Created Yet</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    if($team->agenda->checkpoints) {
        $avgLong;
        $totalLong = 0;
        $avgLat;
        $totalLat = 0;
        $checkpoints = $team->agenda->checkpoints;
        $startLat = $checkpoints[0]->checkpoint_latitude;
        $endLat = $checkpoints[count($checkpoints) - 1]->checkpoint_latitude;
        $startLong = $checkpoints[0]->checkpoint_longitude;
        $endLong = $checkpoints[count($checkpoints) - 1]->checkpoint_longitude;
        foreach ($checkpoints as $checkpoint) {
            $totalLong += $checkpoint->checkpoint_longitude;
            $totalLat += $checkpoint->checkpoint_latitude;
        }
        $avgLong = $totalLong/count($checkpoints);
        $avgLat = $totalLat/count($checkpoints);
?>

<script>
    function initMap(){
        var waypts = [];
        <?php
            for ($i=1; $i < count($checkpoints) - 1; $i++) { 
        ?>
            waypts.push({
                location: 
                    new google.maps.LatLng(
                        <?= $checkpoints[$i]->checkpoint_latitude ?>, 
                        <?= $checkpoints[$i]->checkpoint_longitude ?>
                    ),
                stopover: true
            });
        <?php
            }
        ?>
        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer();
        var start = new google.maps.LatLng(<?= $startLat ?>, <?= $startLong ?>);
        var end = new google.maps.LatLng(<?= $endLat ?>, <?= $endLong ?>);
        var map = new google.maps.Map(
            document.getElementById('maps-agenda2'), {
                zoom: 15, 
                center: {
                    lng: <?= $avgLong ?>, lat: <?= $avgLat ?>
                }
            });
        directionsService.route(
            {
                origin: start,
                destination: end,
                waypoints: waypts,
                optimizeWaypoints: false,
                travelMode: 'DRIVING'
            },
            function(response, status) {
                if (status === 'OK') {
                    directionsRenderer.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            }
        );
        directionsRenderer.setMap(map);
    }
    <?php
    }
    ?>
</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>	
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1JkAkXXIIS0UWKlJQt9fsO-v6sg4Cdug&callback=initMap"></script>
@endsection