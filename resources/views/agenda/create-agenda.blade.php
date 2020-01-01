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
        {{ Form::open(['route' => 'agenda.store']) }}
          {{ Form::select('car_id', [null=>'Select Car'] + $cars, Request::old('car_id'), ['class' => 'form-agenda', 'required']) }}
          <div class="card-body">
            <div class="table-responsive">
              <p class="sub-title">Add Checkpoints</p>Click Map To Create & Click Marker To Delete
              <table class="table" id="dynamicTable">
                <thead class="text-primary">
                  <th>Date</th>
                  <th>Time</th>
                  <th>Longitude</th>
                  <th>Latitude</th>
                </thead>
                <tbody>
                </tbody>
              </table>
              <div class="maps-agenda" id="maps-agenda"></div>
              <p class="sub-title">Add Police</p>
              <table class="table">
                <thead>
                <th>Koordinator</th>
                <th>Anggota</th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      {{ Form::select('user_id[]', [null=>'Select Police'] + $users, null, ['class' => 'input-form select-police', 'id' => 'select1', 'required']) }}
                    </td>
                    <td>
                      {{ Form::select('user_id[]', [null=>'Select Police'] + $users, null, ['class' => 'input-form select-police', 'id' => 'select2']) }}
                      <br>
                      {{ Form::select('user_id[]', [null=>'Select Police'] + $users, null, ['class' => 'input-form select-police', 'id' => 'select3']) }}
                      <br>
                      {{ Form::select('user_id[]', [null=>'Select Police'] + $users, null, ['class' => 'input-form select-police', 'id' => 'select4']) }}
                      <br>
                    </td>
                  </tr>
                </tbody>
              </table>
              <button type="submit" class="done-btn pull-right">Submit</button>
            </div>
          </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){  
    $(".select-police").change(function() {   
      $(".select-police").not(this).find("option[value="+ $(this).val() + "]").attr('disabled', true);
    }); 
  }); 
</script>
<script>
  var map;
  var indexTr = 0;
  var countTr = 0;
  var maxChkpoint = 5;
  var markers = [];
  var arrOfIndexTr = [];

  function initMap(){
    var myLatlng = new google.maps.LatLng(-7.27674670,112.79474210);
    var myOptions = {
      zoom: 15,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    map = new google.maps.Map(document.getElementById("maps-agenda"), myOptions);

    google.maps.event.addListener(map, 'click', function(event) {
      if(countTr < maxChkpoint){
        $("#dynamicTable")
          .append(
            '<tr id="index-tr' + indexTr + '">' +
              '<td>' +
                '<input class="form-agenda-dynamic" type="date" name="checkpoint_date[]" placeholder="Date"/>' +
              '</td>' +
              '<td>' +
                '<input class="form-agenda-dynamic2" type="time" name="checkpoint_time[]" placeholder="Time"/>' +
              '</td>' +
              '<td>'+
                '<input placeholder="Longitude" readonly name="checkpoint_longitude[]" type="text" class="input-form" value="' + event.latLng.lng() + '">' +
              '</td>' +
              '<td>'+
                '<input placeholder="Latitude" readonly name="checkpoint_latitude[]" type="text" class="input-form" value="' + event.latLng.lat() + '">' +
              '</td>' +
            '</tr>');
          
        arrOfIndexTr[countTr] = indexTr;
        placeMarker(event.latLng);
        ++indexTr;
        ++countTr;
      } else {
        alert("You can only create 5 checkpoints");
      }
    });
  }

  function placeMarker(location) {
    var marker = new google.maps.Marker({
      position: location, 
      map: map
    });
    
    marker.setMap(map);
    markers.push(marker);
    map.setCenter(location);
    
    marker.addListener('click', function() {
      for(var i = 0 ; i < markers.length ; i++) {
        if(location == markers[i].getPosition()) {
          $("#index-tr" + arrOfIndexTr[i]).remove();
          arrOfIndexTr.splice(i, 1);
          --countTr;
          markers[i].setMap(null);
          markers.splice(i, 1);
        }
      }
    });
  }        
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1JkAkXXIIS0UWKlJQt9fsO-v6sg4Cdug&callback=initMap"></script>
@endsection