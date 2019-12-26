@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    Case Entry > Create / Update
@endsection

@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header">
        </div>
            <div class="card-body">
              <div id="myModal" class="modal-form">
                <div class="modal-content4">
                @if(isset($case_entry))
                  <span class="form-title">Update Case Entry</span>
                  {{ Form::model($case_entry, ['route' => ['case_entry.update', $case_entry->case_id], 'method' => 'post', 'files' => true]) }}
                @else
                  <span class="form-title">Create Case Entry</span>
                  {{ Form::open(['route' => 'case_entry.store', 'files' => true ]) }}
                @endif
                    {{ Form::text('case_reporter', Request::old('case_reporter'), ['class' => 'input-form', 'placeholder' => 'Name Reporter']) }}
                    <br>
                    {{ Form::select('category_id', [null=>'Select Category'] + $categories, Request::old('category_id'), ['class' => 'input-form']) }}
                    <br>
                    {{ Form::date('case_date', Request::old('case_date'), ['class' => 'input-form', 'placeholder' => 'Case Date']) }}
                    <br>
                    {{ Form::time('case_time', Request::old('case_time'), ['class' => 'input-form', 'placeholder' => 'Case Date']) }}
                    <br>
                    {{ Form::textarea('case_description', Request::old('case_description'), ['class' => 'input-form', 'placeholder' => 'Case Description']) }}
                    <br>
                    {{ Form::file('case_photo', ['class' => 'input-form']) }}
                    <br>
                    <input id="autocomplete_search" name="autocomplete_search" type="text" class="input-form" autocomplete="on" runat="server"/>
                    {{ Form::hidden('case_latitude', Request::old('case_latitude'), ['id' => 'case_latitude']) }}
                    {{ Form::hidden('case_longitude', Request::old('case_longitude'), ['id' => 'case_longitude']) }}
                    <!-- <input type="hidden" id="case_latitude" name="case_latitude" class="case_latitude">
                    <input type="hidden" id="case_longitude" name="case_longitude" class="case_longitude"> -->
                    <br>
                    <div class="container-form-btn">
                      <button type="submit" class="form-btn">Done</button>
                    </div>
                  {{ Form::close() }}
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1JkAkXXIIS0UWKlJQt9fsO-v6sg4Cdug&libraries=places"></script>
<script>
  function initialize() {
    var input = document.getElementById('autocomplete_search');

    var defaultBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(-7.291979, 112.782211),
      new google.maps.LatLng(-7.271099, 112.757982)
    );
  
    var autocomplete = new google.maps.places.Autocomplete(input, {
      bounds: defaultBounds,
      types: ['establishment']
    });

    google.maps.event.addListener(autocomplete,'place_changed', function () {
      var place = autocomplete.getPlace();
      // place variable will have all the information you are looking for.
      console.log(place.geometry.location.lat());
      console.log(place.geometry.location.lng());
      document.getElementById('case_latitude').value = place.geometry.location.lat();
      document.getElementById('case_longitude').value = place.geometry.location.lng();
      // $('#case_latitude').val(place.geometry['location'].lat());
      // $('#case_longitude').val(place.geometry['location'].lng());
    });
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>