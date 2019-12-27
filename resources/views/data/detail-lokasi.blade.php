@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Data Locations
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
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header"></div>
    <div class="card-body">
    <div id="myModal-details" class="modal-details">
    <div class="modal-content-details">
      <span class="form-title">Details Location</span>
      <br>
        <strong>Location Name</strong>
      <br>
        <?= $location->location_name ?>
      <br>
      <br>
        <strong>Location Longitude</strong>
      <br>
        <?= $location->location_longitude ?>
      <br>
      <br>
        <strong>Location Latitude</strong>
      <br>
        <?= $location->location_latitude ?>
      <br>
      <br>
        <strong>Address</strong>
      <br>
        @if($location->location_latitude && $location->location_longitude)
          <?php 
            $data = getAddress($location-> location_latitude, $location-> location_longitude); echo ($data);
          ?>
        @endif
      <br>
      <br>
      <div class="container-details-btn">
      <a href="{{ route('location.delete', ['id' => $location->location_id]) }}">
          <button type="button" class="crud-btn">Delete</button>
      </a>
        &emsp;
      <a href="{{ route('location.edit', ['id' => $location->location_id]) }}">
          <button type="button" class="crud-btn">Update</button>
      </a>
        &emsp;
      <a href="{{ route('location') }}">
          <button type="button" class="crud-btn">Cancel</button>
      </a>
      </div>
  </div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection