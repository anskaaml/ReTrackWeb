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
              <div class="card-header"></div>
                <div class="card-body">
                    <div id="myModal-agenda" class="modal-agenda">
                        <div class="modal-content-agenda">
                        <a href="http://localhost:8000/agenda"> 
                            <span class="close" onclick="hide(); return false">&times;</span>
                        </a>
                        
                        <span class="form-title-agenda">Agenda Details</span>              
                        <a style="padding:100px;">Member</a>
                        <a style="padding:100px;">Car</a>
                        <a style="padding:70px;">Date</a>
                        <br>
                        <br>
                        <br>
                        <div class="maps-agenda2" id="maps-agenda2"></div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/maps-agenda2.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1JkAkXXIIS0UWKlJQt9fsO-v6sg4Cdug&callback=initMap"></script>
@endsection