@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    Report > Case Report
@endsection

@section('content')
<!-- <?php
  function getAddress($lat,$lng)
  {
    $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&key=AIzaSyB1JkAkXXIIS0UWKlJQt9fsO-v6sg4Cdug';
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;
       
    if ($status == "OK") {
        return $data->results[0]->formatted_address;
    }
    else {
        return false;
    }
  }
?> -->
<div class="row">
          <div class="col-md-12">
            <div class="card card-plain">
                <p class="sub-title">Data Laporan Warga</p>
              <div class="card-header">
                <a href="{{ route('case_entry.create')}}">
                  <button class="data-btn" id="myBtn" type="button">Create Report</button> 
                </a>
              </div>
                <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table">
                    <thead class="text-primary">
                      <th>#</th>
                      <th>Case Reporter</th>
                      <th>Category Name</th>
                      <th>Case Location</th>
                      <th>Case Date</th>    
                      <th>Case Time</th>
                    </thead>
                    <tbody id="myTable">
                    @if($case_entries)
                      @foreach($case_entries as $case_entry)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $case_entry-> case_reporter }}</td>
                          @if($case_entry->category)
                           <td>{{ $case_entry-> category-> category_name}}</td>
                          @else
                          <td></td>
                          @endif
                          <!-- <td>
                            <?php 
                              $data = getAddress($case_entry-> case_latitude, $case_entry-> case_longitude); echo ($data);
                            ?>
                          </td>  -->
                          <td>{{ $case_entry-> case_longitude }} , {{ $case_entry-> case_latitude }}</td>
                          <td>{{ \Carbon\Carbon::parse($case_entry-> case_date)-> format('d M Y') }}</td>
                          <td>{{ $case_entry-> case_time}}</td>
                          <td>
                            <a href="{{ route('case_entry.show', ['id' => $case_entry->case_id]) }}">
                              <button class="details-btn" type="button">Details</button>
                            </a>
                          </td>
                        </tr>
                      @endforeach
                      @else
                        <p class="text-center text-primary">No Case Entry Created Yet!</p>
                      @endif
                    </td> 
                    <!-- <td>{{ $case_entry-> case_longitude }} , {{ $case_entry-> case_latitude }}</td> -->
                    <td>{{ \Carbon\Carbon::parse($case_entry-> case_date)-> format('d M Y') }}</td>
                    <td>{{ $case_entry-> case_time}}</td>
                    <td>
                      <a href="{{ route('case_entry.show', ['id' => $case_entry->case_id]) }}">
                        <button class="details-btn" type="button">Details</button>
                      </a>
                    </td>
                  </tr>
                @endforeach
              @else
                <p class="text-center text-primary">No Case Entry Created Yet!</p>
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