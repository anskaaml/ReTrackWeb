@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
  Report > Case Report
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
      </div>
      <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="table">
            <thead class="text-primary">
              <th>#</th>
              <th>Police Name</th>
              <th>Case</th>
              <th>Photo</th>
              <th>Status</th>
            </thead>
            <tbody id="myTable">
              @if($case_reports)
                @foreach($case_reports as $case_report)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      @if($case_report-> user)
                        {{ $case_report-> user-> user_name }}
                      @endif
                    </td>
                    <td>
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
                    </td>
                    <td>
                      @if($case_report->case_report_photo)
                        <img src="<?= "https://api.retrack-app.site".$case_report->case_report_photo ?>" height="120px">
                      @endif
                    </td>
                    <td>
                      <?php
                        if($case_report-> case_report_status == 0)
                          echo("Invalid");
                        else if($case_report-> case_report_status == 1)
                          echo("Not Done");
                        else if($case_report-> case_report_status == 2)
                          echo("Done");
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
        {{ $case_reports->links() }}
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/js/search.js"></script>
<script src="../assets/js/form-popup.js"></script>
@endsection