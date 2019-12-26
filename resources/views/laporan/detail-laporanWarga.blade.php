@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
  Case Entry > Details
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
            <span class="form-title">Details Laporan Warga</span>
            <br>
            <strong>Case Reporter</strong>
            <br>
            <?= $case_entry->case_reporter ?>
            <br>
            <br>
            <strong>Case</strong>
            <br>
            @if($case_entry->category_id)
              <?= $case_entry->category->category_name ?>
            @endif
            
            @if($case_entry->case_date)
              {{ \Carbon\Carbon::parse($case_entry-> case_date)-> format('d M Y') }}
            @endif
            <?=$case_entry->case_time?>

            @if($case_entry->case_latitude && $case_entry->case_longitude)
            <?php 
              $data = getAddress($case_entry-> case_latitude, $case_entry-> case_longitude); echo ($data);
            ?>
            @endif
            
            <br>
            <br>
            <strong>Case Description</strong>
            <br>
            <?= $case_entry->case_description?>
            <br>
            <br>
            <strong>Case Photo</strong>
            <br>
            @if($case_entry->case_photo)
              <img src="<?= "https://api.retrack-app.site".$case_entry->case_photo ?>" height="100px">
            @endif
            <br>
            <br>
            <div class="container-details-btn">
              <a href="{{ route('case_entry.delete', ['id' => $case_entry->case_id]) }}">
                <button type="button" class="crud-btn">Delete</button>
              </a>
              &emsp;
              <a href="{{ route('case_entry.edit', ['id' => $case_entry->case_id]) }}">
                <button type="button" class="crud-btn">Update</button>
              </a>
              &emsp;
              <a href="{{ route('case_entry') }}">
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