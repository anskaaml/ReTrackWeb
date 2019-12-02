@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Admin history
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card card-plain">
                <p class="sub-title">Data History</p>
              <div class="card-header">
              </div>
                <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table">
                    <thead class="text-primary">
                      <th>#</th>
                      <th>Police Name</th>
                      <th>Location( Longitude , Latitude )</th>
                      <th>Date</th>
                    </thead>
                    <tbody id="myTable">
              @if($histories)
                @foreach($histories as $history)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $history-> user-> user_name }}</td>
                    <td>{{ $history-> history_longitude }}   , {{ $history-> history_latitude }}</td>
                    <td>{{ $history-> history_datetime }}</td>
                  </tr>
                @endforeach
              @else
                <p class="text-center text-primary">No History Created Yet!</p>
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
@endsection