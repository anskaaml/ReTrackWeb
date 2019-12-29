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
      <div class="card-header">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <form method="POST">
          {{ Form::select('car_id', [null=>'Select Cars'] + $cars, Request::old('car_id'), ['class' => 'form-agenda']) }}
          <div class="card-body">
            <div class="table-responsive">
            <p class="sub-title">Add Checkpoints</p>
              <table class="table" id="dynamicTable">
                <thead class="text-primary">
                  <th>Date</th>
                  <th>Time</th>
                  <th>Location</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th></th>
                </thead>
                <tbody>
                  <tr>
                    <td><input class="form-agenda-dynamic" type="date" name="addmore[0][date]" placeholder="Date"></td>
                    <td><input class="form-agenda-dynamic2"  type="time" name="addmore[0][time]" placeholder="Time"></td>
                    <td></td>
                    <td><div id="latclicked"></div></td>
                    <td><div id="longclicked"></div></td>
                    <td><button class="btn btn-success" style="border-radius:15px;" type="button" name="add" id="addmore">Add</button></td>
                  </tr>
                </tbody>
              </table>
              <button type="submit" class="done-btn">Submit</button>
              <!-- <div class="maps-agenda" id="maps-agenda"></div> -->
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var i = 0;
  $("#addmore").click(function(){
      ++i;
      $("#dynamicTable")
          .append(
          '<tr>' +
            '<td>' +
              '<input class="form-agenda-dynamic" type="date" name="addmore['+i+'][date]" placeholder="Date"/>' +
            '</td>' +
            '<td>' +
              '<input class="form-agenda-dynamic2" type="time" name="addmore['+i+'][time]" placeholder="Time"/>' +
            '</td>' +
            '<td></td>' +
            '<td><div id="latclicked"></div></td>' +
            '<td><div id="longclicked"></div></td>' +
            '<td>' +
              '<button type="button" class="btn btn-danger remove-tr" style="border-radius:15px;">Remove</button>' +
            '</td>' +
          '</tr>');
  });

  $(document).on('click', '.remove-tr', function(){  
      $(this).parents('tr').remove();
  });  

  $(document).on('click', 'add-member', function(){
      return view('agenda.add-member');
  });
</script>
<!-- <script src="../assets/js/maps-agenda.js"></script> -->
<!-- <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script> -->
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1JkAkXXIIS0UWKlJQt9fsO-v6sg4Cdug&callback=initMap"></script> -->
@endsection