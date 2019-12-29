@extends('layouts.index')

@section('title')
  ReTrack
@endsection

@section('name')
  Case Report > Details
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
            <span class="form-title">Detail Case Reports</span>
            <br>
            <strong>Police Name</strong>
            <br>
            @if($case_report-> user)
              {{ $case_report-> user-> user_name }}
            @endif
            <br>
            <br>
            <strong>Case</strong>
            <br>
            @if($case_report-> case_entry)
              @if($case_report-> case_entry-> category)
                {{ $case_report-> case_entry-> category-> category_name }}
              @endif

              @if($case_report->case_entry->case_date)
                {{ \Carbon\Carbon::parse($case_report->case_entry-> case_date)-> format('d M Y') }}
              @endif

              {{ $case_report-> case_entry->case_time}}
              
              @if($case_report->case_entry->case_latitude && $case_report->case_entry->case_longitude)
                <?php 
                  $data = getAddress($case_report->case_entry->case_latitude, $case_report->case_entry->case_longitude);
                  echo ($data);
                ?>
              @endif
            @endif
            <br>
            <br>
            <strong>Case Report Datetime & Location</strong>
            <br>
            @if($case_report->case_report_date)
              {{ \Carbon\Carbon::parse($case_report->case_report_date)-> format('d M Y') }}
            @endif

            {{ $case_report-> case_report_time}}

            @if($case_report->case_report_latitude && $case_report->case_report_longitude)
              <?php 
                $data = getAddress($case_report->case_report_latitude, $case_report->case_report_longitude);
                echo ($data);
              ?>
            @endif
            <br>
            <br>
            <strong>Description</strong>
            <br>
            {{ $case_report-> case_report_description}}
            <br>
            <br>
            <strong>Status</strong>
            <br>
            <?php
              if($case_report-> case_report_status == 0)
                echo("Invalid");
              else if($case_report-> case_report_status == 1)
                echo("Not Done");
              else if($case_report-> case_report_status == 2)
                echo("Done");
            ?>
            <br>
            <br>
            <strong>Photo</strong>
            <br>
              @if($case_report->case_report_photo)
                <img src="<?= "https://api.retrack-app.site".$case_report->case_report_photo ?>" height="120px">
              @endif
            <br>
            <br>

            <div class="container-details-btn">
                <button type="button" class="crud-btn">Delete</button>
              &emsp;

                <button type="button" class="crud-btn">Update</button>
              &emsp;
                <button type="button" class="crud-btn">Cancel</button>
            </div>
        </div>
      </div>
            </div>
        </div>
    </div>
</div>
@endsection