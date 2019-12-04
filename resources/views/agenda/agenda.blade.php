@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    Agenda
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-plain">
      <div class="card-header">
        <a href="{{ route('agenda.create') }}">
          <button class="agenda-btn" type="button">Create Agenda</button>
        </a>
      </div>
      <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="table">
            <thead class=" text-primary">
              <th>#</th>
              <th>Member Name</th>
              <th>Car</th>  
              <th>Date</th>
              <th>Action</th>    
            </thead>
            <tbody id="myTable">
              @if($teams)
                @foreach($teams as $team)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      @foreach($team->users as $user)
                        {{ $user->user_name }},
                      @endforeach
                    </td>
                    @if($team->car)
                    <td>{{ $team->car->car_number }}</td>
                    @else
                    <td></td>
                    @endif
                    <td>{{ \Carbon\Carbon::parse($team->agenda->agenda_date)->format('d M Y') }}</td>
                    <td>
                      <a href="{{ route('agenda.show', ['id' => $team->team_id]) }}">
                        <button class="details-btn" id="myBtn-agenda" type="button">Details</button>
                      </a>
                    </td>
                  </tr>
                @endforeach
              @else
                <p class="text-center text-primary">No Agenda Created Yet!</p>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <div id="myModal-agenda" class="modal-agenda">
  <div class="modal-content-agenda">
    <span class="form-title-agenda">Agenda Details</span>
      <a style="padding:100px;">Member</a>
      <a style="padding:100px;">Car</a>
      <a style="padding:70px;">Date</a>
      <br>
      <br>
      <br>
    <div class="maps-agenda2" id="maps-agenda2"></div>  
  </div>
</div> -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="../assets/js/search.js"></script>
<!-- <script src="../assets/js/popup-agenda.js"></script> -->
<!-- <script src="../assets/js/maps-agenda2.js"></script> -->
@endsection

