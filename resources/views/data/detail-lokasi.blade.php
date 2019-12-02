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
    <div class="modal-content-details">
      <span class="form-title">Details Location</span>
      <br>
        <strong>Location Name</strong>&emsp;&emsp;&emsp;<?= $location->location_name ?>
      <br>
      <br>
      <br>
        <strong>Location Longitude</strong>&emsp;<?= $location->location_longitude ?>
      <br>
      <br>
      <br>
        <strong>Location Latitude</strong>&emsp;&emsp;<?= $location->location_latitude ?>
      <br>
      <br>
      <br>
      <br>

      <div class="container-details-btn">
      <a href="{{ route('location.delete', ['id' => $location->location_id]) }}">
          <button type="button" class="crud-btn">Delete</button>
      </a>
        &emsp;
      <a href="{{ route('location.edit', ['id' => $location->location_id]) }}">
          <button type="button" class="crud-btn">Update</button>
      </a>
        &emsp;
      <a href="{{ route('location') }}">
          <button type="button" class="crud-btn">Cancel</button>
      </a>
      </div>
  </div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection