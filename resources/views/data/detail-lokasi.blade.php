@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Data Locations
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header"></div>
    <div class="card-body">
    <div id="myModal-details" class="modal-details">
    <div class="modal-content-details2">
      <span class="form-title">Details Location</span>
      <br>
        <strong>Area Name</strong>
      <br>

      <br>
      <br>
        <strong>Coordinate</strong>
        
      <br>
      <br>
      <br>
      <br>

      <div class="container-details-btn">
          <button type="button" class="crud-btn">Delete</button>
        &emsp;

          <button type="button" class="crud-btn">Update</button>
        &emsp;
          <button type="button" class="crud-btn">Cancel</button>
      </div>
  </div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection