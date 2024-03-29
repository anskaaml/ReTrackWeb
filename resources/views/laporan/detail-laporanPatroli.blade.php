@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    Patrol Report > Details
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
            <span class="form-title">Details Patrol Report</span>
            <br>
              <strong>Police Name</strong>
            <br>
              @if($patrol_report->user)
                {{ $patrol_report->user->user_name }}
              @endif
            <br>
            <br>
              <strong>Datetime</strong>
            <br>
            {{ \Carbon\Carbon::parse($patrol_report->patrol_date)->format('d M Y') }}
            {{ $patrol_report->patrol_time }}
            <br>
            <br>
              <strong>Location</strong>
            <br>
              @if($patrol_report->patrol_latitude && $patrol_report->patrol_longitude)
                <?php 
                  $data = getAddress($patrol_report-> patrol_latitude, $patrol_report-> patrol_longitude); echo ($data);
                ?>
              @endif
            <br>
            <br>
            <strong>Description</strong>
            <br>
              {{ $patrol_report->patrol_description }}
            <br>
            <br>
            <strong>Photo</strong>
            <br>
            @if($patrol_report->patrol_photo)
              <img src="<?= "https://api.retrack-app.site".$patrol_report->patrol_photo ?>" height="120px">
            @endif
            <br>
            <br>
            <strong>Status</strong>
            <br>
              <?php 
                if($patrol_report->patrol_status == 0)
                  echo("Aman");
                else if($patrol_report->patrol_status == 0)
                  echo("Rawan");
              ?>
            <br>
            <br>

            <div class="container-details-btn">
              <a href="{{ route('patrol_report') }}">
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