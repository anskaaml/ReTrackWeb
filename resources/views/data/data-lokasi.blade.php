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
                <p class="sub-title">Data Locations</p>
              <div class="card-header">
              <a href="{{ route('location.create') }}">
                <button class="data-lokasi-btn">Create Location</button>
              </a> 
              </div>
                <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table">
                    <thead class="text-primary">
                      <th>#</th>
                      <th>Location Name</th>  
                      <th>Address</th>
                      <th>Action</th>
                    </thead>
                    <tbody id="myTable">
                      @if($locations)
                        @foreach($locations as $location)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $location->location_name }}</td>
                        <td>
                            <?php 
                              $data = getAddress($location-> location_latitude, $location-> location_longitude); echo ($data);
                            ?>
                          </td> 
                        <td>
                        <a href="{{ route('location.show', ['id' => $location->location_id]) }}">
                          <button class="details-btn">Details</button>
                        </a>
                        </td>
                      </tr>
                      @endforeach
                  @else
                    <p class="text-center text-primary">No Location Created Yet!</p>
                  @endif
                    </tbody>
                  </table>
                </div>
                {{ $locations->links() }}
              </div>
            </div>
          </div>
      </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/js/popup-details.js"></script>
<script src="../assets/js/search.js"></script>
<script src="../assets/js/form-popup.js"></script>
@endsection