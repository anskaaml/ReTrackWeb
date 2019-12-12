@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    Report > Patrol Report
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
                <p class="sub-title">Data Patrol Reports</p>
                <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table">
                    <thead class="text-primary">
                      <th>#</th>
                      <th>Police</th>
                      <th>Location</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Action</th>
                    </thead>
                    <tbody id="myTable">
                    @if($patrol_reports)
                      @foreach($patrol_reports as $patrol_report)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $patrol_report->user->user_name }}</td>
                        <td>
                        @if($patrol_report->patrol_latitude && $patrol_report->patrol_longitude)
                          <?php 
                            $data = getAddress($patrol_report-> patrol_latitude, $patrol_report-> patrol_longitude); echo ($data);
                          ?>
                        @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($patrol_report->patrol_date)->format('d M Y') }}</td>
                        <td>{{ $patrol_report->patrol_time }}</td>
                        <td>
                          <a href="{{ route('patrol_report.show', ['id' => $patrol_report->patrol_report_id]) }}">
                            <button class="details-btn" type="button">Details</button>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                      @else
                        <p class="text-center text-primary">No Patrol Report Created Yet!</p>
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/js/search.js"></script>
<script src="../assets/js/form-popup.js"></script>
@endsection