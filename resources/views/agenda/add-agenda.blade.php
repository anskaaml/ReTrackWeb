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
                <form method="POST">
                <select class="form-agenda" name="pick-car">
                    <option>Pick a Car</option>
                    <option value="car-1">Car-1</option>
                    <option value="car-2">Car-2</option>
                    <option value="car-3">Car-3</option>
                    <option value="car-4">Car-4</option>
                    <option value="car-5">Car-5</option>
                </select>   
                &emsp;             
                    <input class="form-agenda" type="text" onfocus="(this.type='date')"  name="date" placeholder="Date">
                &emsp;                  
                    <input class="form-agenda" type="text" onfocus="(this.type='time')"  name="time" placeholder="Time">  
              </div>
              <div class="card-body">
                <a style="display:inline;">Latitude : </a><div id="latclicked" style="display:inline;"></div>&emsp;
                <a style="display:inline;">Longitude : </a><div id="longclicked" style="display:inline;"></div>
                
                <div class="maps-agenda" id="maps-agenda"></div>

                <button class="tambah-agenda-btn">Add Member</button>
                <button type="submit" class="done-btn">Done</button>
             </div>
           </form>
        </div>
    </div>
</div>

<script src="../assets/js/search.js"></script>
<script src="../assets/js/maps-agenda.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1JkAkXXIIS0UWKlJQt9fsO-v6sg4Cdug&callback=initMap"></script>
@endsection

