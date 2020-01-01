@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    Report > Case Entry
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
              <th>Reporter</th>
              <th>Case</th>
              <th>Photo</th>
              <th>Action</th>
            </thead>
            <tbody id="myTable">
              @if($case_entries)
                @foreach($case_entries as $case_entry)
                  <tr>
                    <td>{{ $loop->iteration + $perPage * ($currentPage - 1) }}</td>
                    <td>{{ $case_entry-> case_reporter }}</td>
                    <td>
                      @if($case_entry->category)
                        {{ $case_entry-> category-> category_name}}
                      @endif

                      @if($case_entry->case_date)
                        {{ \Carbon\Carbon::parse($case_entry-> case_date)-> format('d M Y') }}
                      @endif

                      {{ $case_entry-> case_time}}
                      @if($case_entry->case_latitude && $case_entry->case_longitude)
                        <?php 
                          $data = getAddress($case_entry->case_latitude, $case_entry->case_longitude); echo ($data);
                        ?>
                      @endif
                    </td> 
                    <!-- <td>{{ $case_entry-> case_longitude }} , {{ $case_entry-> case_latitude }}</td> -->
                    <td>
                      @if($case_entry->case_photo)
                        <img src="<?= "https://api.retrack-app.site".$case_entry->case_photo ?>" width="200px">
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('case_entry.show', ['id' => $case_entry->case_id]) }}">
                        <button class="details-btn" type="button">Details</button>
                      </a>
                      <a href="{{ route('case_entry.handle', ['id' => $case_entry->case_id]) }}">
                        <button class="tangani-btn" type="button">Handle</button>
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
        <div class="pull-right">
        {{ $case_entries->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/js/search.js"></script>
<script src="../assets/js/form-popup.js"></script>
@endsection