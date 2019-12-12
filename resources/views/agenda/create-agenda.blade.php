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
                <p class="sub-title">Add Checkpoints</p>
              <div class="card-header">
              <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <form method="POST">
                <select class="form-agenda" name="pick-car">
                    <option>Pick a Car</option>
                    <option value="car-1">Car-1</option>
                    <option value="car-2">Car-2</option>
                    <option value="car-3">Car-3</option>
                    <option value="car-4">Car-4</option>
                    <option value="car-5">Car-5</option>
                </select>                  
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dynamicTable">
                        <thead class="text-primary">
                            <th>Date</th>
                            <th>Time</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input  class="form-agenda-dynamic" type="date" name="addmore[0][date]" placeholder="Date"></td>
                                <td><input  class="form-agenda-dynamic2"  type="time" name="addmore[0][time]" placeholder="Time"></td>
                                <td><div id="latclicked"></div></td>
                                <td><div id="longclicked"></div></td>
                                <td><a href="{{ route('agenda.add-member') }}"><button class="btn btn-success" style="border-radius:15px;background-color:#3c78d8" type="button" name="addmember">Add Member</button></a></td>
                                <td><button class="btn btn-success" style="border-radius:15px;" type="button" name="add" id="addmore">Add</button></td>
                            </tr>
                    </table>
                      <div class="maps-agenda" id="maps-agenda"></div>
                    <button type="submit" class="done-btn">Submit</button>
                </div>
           </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../assets/js/add-input.js"></script>
<script src="../assets/js/maps-agenda.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1JkAkXXIIS0UWKlJQt9fsO-v6sg4Cdug&callback=initMap"></script>
@endsection

