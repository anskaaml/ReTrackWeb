@extends('layouts.index')

@section('title')
  ReTrack
@endsection

@section('name')
  Agenda > Create Agenda
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-plain">
    <p class="sub-title">Add Checkpoints</p>
      <div class="card-header">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        {{ Form::open(['route' => 'agenda.store']) }}
          {{ Form::select('car_id', [null=>'Select Cars'] + $cars, Request::old('car_id'), ['class' => 'form-agenda']) }}
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="dynamicTable">
                <thead class="text-primary">
                  <th>Date</th>
                  <th>Time</th>
                  <th>Longitude</th>
                  <th>Latitude</th>
                  <th></th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <input class="form-agenda-dynamic" type="date" name="checkpoint_date[]" placeholder="Date">
                    </td>
                    <td>
                      <input class="form-agenda-dynamic2"  type="time" name="checkpoint_time[]" placeholder="Time">
                    </td>
                    <td>
                      <input id="checkpoint_longitude-0" placeholder="Longitude" readonly name="checkpoint_longitude[]" type="text" class="input-form">
                    </td>
                    <td>
                      <input id="checkpoint_latitude-0" placeholder="Latitude" readonly name="checkpoint_latitude[]" type="text" class="input-form">
                    </td>
                    <td>
                      <button class="btn btn-success" style="border-radius:15px;" type="button" name="add" id="addmore">
                        Add
                      </button>
                    </td>
                  </tr>
              </table>
              <div class="maps-agenda" id="maps-agenda"></div>
              <button type="submit" class="done-btn pull-right">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="../assets/js/add-input.js"></script>
<script src="../assets/js/maps-agenda.js"></script>
<!-- <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script> -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1JkAkXXIIS0UWKlJQt9fsO-v6sg4Cdug&callback=initMap"></script>
@endsection