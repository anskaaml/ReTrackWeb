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
                    <strong>Employee ID</strong>
                  <br>
                    <?= $police->user_employee_id ?>
                  <br>
                  <br>
                    <strong>Name</strong>
                  <br>
                    <?= $police->user_name ?>
                  <br>
                  <br>
                    <strong>Date of Birth</strong>
                  <br>
                    <?= \Carbon\Carbon::parse($police->user_birthdate)-> format('d M Y') ?>
                  <br>
                  <br>
                  <br>
                  <br>
                  <div class="container-details-btn">
                    <a href="{{ route('police.delete', ['id' => $police->user_id]) }}">
                      <button type="button" class="crud-btn">Delete</button>
                    </a>
                    &emsp;
                    <a href="{{ route('police.edit', ['id' => $police->user_id]) }}">
                      <button type="button" class="crud-btn">Update</button>
                    </a>
                    &emsp;
                    <a href="{{ route('police') }}">
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