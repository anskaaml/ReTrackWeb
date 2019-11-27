@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Data Police
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header"></div>
    <div class="card-body">
    <div id="myModal-details" class="modal-details">
    <div class="modal-content-details">
      <span class="form-title">Details Police</span>
      <br>
        <a>Police Name</a>
      <br>
      <br>
      <br>
        <a>Rank</a>
      <br>
      <br>
      <br>
        <a>Status</a>
      <br>
      <br>
      <br>
      <br>
      <br>

      <div class="container-details-btn">
        <button type="button" class="crud-btn">Delete</button>
        &emsp;
        <button type="button" class="crud-btn" onclick="window.location='http://localhost:8000/create-police' ">Update</button>
        &emsp;
        <button type="button" class="crud-btn" onclick="window.location='http://localhost:8000/data-polisi' " >Cancel</button>
      </div>
  </div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection