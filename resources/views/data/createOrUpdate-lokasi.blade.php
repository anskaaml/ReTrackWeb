@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Create Location
@endsection

@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header"></div>
            <div class="card-body">
                <div id="myModal-form" class="modal-form">
                    <div class="modal-content">
                    @if(isset($location))
                        <span class="form-title">Update Location</span>
                        {{ Form::model($location, ['route' => ['location.update', $location->location_id], 'method' => 'post']) }}
                    @else
                        <span class="form-title">Create Location</span>
                        {{ Form::open(['route' => 'location.store']) }}
                    @endif
                        {{ Form::text('location_name', Request::old('location_name'), ['class' => 'input-form', 'placeholder' => 'Location Name']) }}
                    <br>
                        <input id="autocomplete_search" name="autocomplete_search" type="text" class="input-form" autocomplete="on" runat="server" placeholder="Location Reference"/>
                    <br>
                        {{ Form::text('location_longitude', Request::old('location_longitude'), ['class' => 'input-form', 'id' => 'location_longitude', 'placeholder' => 'Location Longitude', 'readonly']) }}
                    <br>
                        {{ Form::text('location_latitude', Request::old('location_latitude'), ['class' => 'input-form', 'id' => 'location_latitude', 'placeholder' => 'Location Latitude', 'readonly']) }}
                    <br>
                        <div class="container-form-btn">
                            <button type="submit" class="form-btn">Done</button>
                        </div>
                    {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1JkAkXXIIS0UWKlJQt9fsO-v6sg4Cdug&libraries=places"></script>
<script>
    function initialize() {
        var input = document.getElementById('autocomplete_search');

        var defaultBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(-7.291979, 112.782211),
            new google.maps.LatLng(-7.271099, 112.757982)
        );

        var autocomplete = new google.maps.places.Autocomplete(input, {
            bounds: defaultBounds,
            types: ['establishment']
        });

        google.maps.event.addListener(autocomplete,'place_changed', function () {
            var place = autocomplete.getPlace();
            // place variable will have all the information you are looking for.
            document.getElementById('location_latitude').value = place.geometry.location.lat();
            document.getElementById('location_longitude').value = place.geometry.location.lng();
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>