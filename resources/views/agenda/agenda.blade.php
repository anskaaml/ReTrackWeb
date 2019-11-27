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
                <button class="agenda-btn" type="button" onclick="window.location='http://localhost:8000/add-agenda' ">Add New</button>
              </div>
                <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table">
                    <thead class=" text-primary">
                      <th>No</th>
                      <th>Member Name</th>
                      <th>Car</th>  
                      <th>Date</th>
                      <th>Action</th>    
                    </thead>
                    <tbody id="myTable">
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <button class="details-btn" id="myBtn-agenda">Details</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>

      <div id="myModal-agenda" class="modal-agenda">
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
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/js/search.js"></script>
<script src="../assets/js/popup-agenda.js"></script>
<script src="../assets/js/maps-agenda2.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1JkAkXXIIS0UWKlJQt9fsO-v6sg4Cdug&callback=initMap"></script>
@endsection

