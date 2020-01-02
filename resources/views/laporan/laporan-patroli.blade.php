@extends('layouts.index')

@section('title')
  ReTrack
@endsection

@section('name')
  Report > Patrol Reports
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
              <th>Datetime</th>
              <th>Photo</th>
              <th>Status</th>
              <th>Action</th>
            </thead>
            <tbody id="myTable">
              @if($patrol_reports)
                @foreach($patrol_reports as $patrol_report)
                  <tr>
                    <td>{{ $loop->iteration + $perPage * ($currentPage - 1) }}</td>
                    <td>
                    @if($patrol_report->user)
                      {{ $patrol_report->user->user_name }}
                    @endif
                    </td>
                    <td>
                      @if($patrol_report->patrol_latitude && $patrol_report->patrol_longitude)
                        <?php 
                          $data = getAddress($patrol_report-> patrol_latitude, $patrol_report-> patrol_longitude); echo ($data);
                        ?>
                      @endif
                    </td>
                    <td>
                      @if($patrol_report->patrol_date)
                        {{ \Carbon\Carbon::parse($patrol_report->patrol_date)->format('d M Y') }}
                      @endif
                      {{ $patrol_report->patrol_time }}
                    </td>
                    <td>
                      @if($patrol_report->patrol_photo)
                        <img src="<?= "https://api.retrack-app.site".$patrol_report->patrol_photo ?>" width="150px">
                      @endif
                    </td>
                    <td>
                      <?php 
                      if($patrol_report->patrol_status == 0)
                        echo("Aman");
                      else if($patrol_report->patrol_status == 1)
                        echo("Rawan");
                      ?>
                    </td>
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
        <div class="pull-right">
        {{ $patrol_reports->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/js/search.js"></script>
<script src="../assets/js/form-popup.js"></script>
@endsection