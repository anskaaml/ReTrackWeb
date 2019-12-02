@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Data Team Police
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header"></div>
    <div class="card-body">
    <div id="myModal-details" class="modal-details">
    <div class="modal-content-details">
      <span class="form-title">Details Team</span>
      <br>
        <strong>Car ID</strong>&emsp;&emsp;&emsp;&emsp;<?= $team->car_id ?>
      <br>
      <br>
      <br>
        <strong>Police ID</strong>&emsp;&emsp;&emsp;<?= $team->user_id ?>
      <br>
      <br>
      <br>
        <strong>Agenda ID</strong>&emsp;&emsp;<?= $team->agenda_id ?>
      <br>
      <br>
      <br>
      <br>

      <div class="container-details-btn">
      <a href="{{ route('team.delete', ['id' => $team->car_id]) }}">
          <button type="button" class="crud-btn">Delete</button>
      </a>
        &emsp;
      <a href="{{ route('team.edit', ['id' => $team->user_id]) }}">
          <button type="button" class="crud-btn">Update</button>
      </a>
        &emsp;
      <a href="{{ route('team') }}">
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