@extends('layouts.index')

@section('title')
  ReTrack
@endsection

@section('name')
  Data Histories
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
      <p class="sub-title">Data Histories</p>
      <div class="card-header">
    </div>
    <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table" id="table">
          <thead class="text-primary">
            <th>#</th>
            <th>Police Name</th>
            <th>Location</th>
            <th>Accuracy</th>
            <th>Datetime</th>
          </thead>
          <tbody id="myTable">
            @if($histories)
              @foreach($histories as $history)
                <tr>
                  <td>{{ $loop->iteration + $perPage * ($currentPage - 1) }}</td>
                  <td>{{ $history-> user-> user_name }}</td>
                  <td>
                    @if($history->history_latitude && $history->history_longitude)
                      <?php 
                        $data = getAddress($history-> history_latitude, $history-> history_longitude); echo ($data);
                      ?>
                    @endif
                  </td>
                  <!-- <td>{{ $history-> history_longitude }}   , {{ $history-> history_latitude }}</td> -->
                  <td>{{ $history-> history_accuracy }}</td>
                  <td>{{ date("Y-m-d H:i:s T", strtotime($history-> history_datetime.' UTC')) }}</td>
                </tr>
              @endforeach
            @else
              <p class="text-center text-primary">No History Created Yet!</p>
            @endif
          </tbody>
        </table>
        <div class="pull-right">
        {{ $histories->links() }}
        </div> 
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/js/search.js"></script>
@endsection