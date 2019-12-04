@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Create Case Report
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
                  {{ Form::model($case_entry, ['route' => ['case_entry.update', $case_entry->case_id], 'method' => 'post']) }}
                @else
                  <span class="form-title">Create Case Entry</span>
                  {{ Form::open(['route' => 'case_entry.create']) }}
                @endif
                    {{ Form::text('case_reporter', Request::old('case_reporter'), ['class' => 'input-form', 'placeholder' => 'Name Reporter']) }}
                    <br>
                    {!! Form::select('category_name',  category-> category_name, null, ['class' => 'form-control']) !!}
                    <br>
                    {{ Form::date('case_date', Request::old('case_date'), ['class' => 'input-form', 'placeholder' => 'Case Date']) }}
                    <br>
                    {{ Form::text('case_description', Request::old('case_description'), ['class' => 'input-form', 'placeholder' => 'Case Description']) }}
                    <br>
                    <input id="autocomplete_search" name="autocomplete_search" type="text" class="form-control" placeholder="Search" />
                    <input type="hidden" name="case_entry.latitude" class="case_entry.latitude">
                    <input type="hidden" name="case_entry.longitude" class="case_entry.longitude">
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
  google.maps.event.addDomListener(window, 'load', initialize);
    function initialize() {
      var input = document.getElementById('autocomplete_search');

      var defaultBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(-7.291979, 112.782211),
            new google.maps.LatLng(-7.271099, 112.757982));

      
      var autocomplete = new google.maps.places.Autocomplete(input, {
                              bounds: defaultBounds
                            });
     
      autocomplete.addListener('place_changed', function () {
     
      var place = autocomplete.getPlace();
      // place variable will have all the information you are looking for.
      $('#case_entry.latitude').val(place.geometry['location'].lat());
      $('#case_entry.longitude').val(place.geometry['location'].lng());
    });
  }
</script>