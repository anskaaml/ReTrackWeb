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
                <p class="sub-title">Data Case Report</p>
              <div class="card-header">
              <!-- <a href="{{ route('location.create') }}">
                <button class="data-lokasi-btn">Create Location</button>
              </a>  -->
              </div>
                <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table">
                    <thead class="text-primary">
                      <th>#</th>
                      <th>Name Reporter</th>  
                      <th>Name Police</th>
                      <th>Case Report Date</th>
                      <th>Category</th>
                      <th>Case Report Status</th>
                    </thead>
                    <tbody id="myTable">
                      @if($)
                        @foreach($case_reports as $case_report)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $case_report-> case_entry-> case_reporter }}</td>
                        <td>{{ $case_report-> user-> user_name }}</td>
                        <td>{{ $case_report-> case_report_date }}</td>
                        <td>{{ $case_report-> case_entry-> category-> category_name }}</td>
                        <td>{{ $case_report-> case_status }}</td>
                        <td>
                            <?php 
                              $data = getAddress($location-> location_latitude, $location-> location_longitude); echo ($data);
                            ?>
                          </td> 
                        <td>
                        <a href="{{ route('case_report.show', ['id' => $case_report-> case_report_id]) }}">
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
              </div>
            </div>
          </div>
      </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/js/popup-details.js"></script>
<script src="../assets/js/search.js"></script>
<script src="../assets/js/form-popup.js"></script>
@endsection