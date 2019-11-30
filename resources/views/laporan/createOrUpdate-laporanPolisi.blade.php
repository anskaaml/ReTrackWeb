@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Create Patrol Report
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header"></div>
            <div class="card-body">
<div id="myModal" class="modal-form">
    <div class="modal-content4">
      <form>
        <span class="form-title">Create Patrol Report</span>
      
        <input class="input-form" type="text" name="agenda_id" placeholder="Agenda ID">
      <br>
        <input class="input-form" type="text" name="user_id" placeholder="Police ID">
      <br>
        <input class="input-form" type="text" name="patrol_location" placeholder="Patrol Location">
      <br>
        <input class="input-form" type="text" name="patrol_time" onfocus="(this.type='datetime-local')" placeholder="Patrol Time">
      <br>
        <input class="input-form" type="text" name="patrol_description" placeholder="Description">
      <br>
        <!-- <input type="file"> -->
          <div class="container-form-btn">
            <button type="submit" class="form-btn">Done</button>
          </div>
    </form>
  </div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
