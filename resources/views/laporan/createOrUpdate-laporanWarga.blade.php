@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Create Case Report
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
        <span class="form-title">Create Case Report</span>
      
        <input class="input-form" type="text" name="category_id" placeholder="Category ID">
      <br>
        <input class="input-form" type="text" name="case_reporter" placeholder="Case Reporter">
      <br>
        <input class="input-form" type="text" name="case_location" placeholder="Case Location">
      <br>
        <input class="input-form" type="text" name="case_time" onfocus="(this.type='datetime-local')" placeholder=" Case Time">
      <br>
        <input class="input-form" type="text" name="case_description" placeholder="Case Description">
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
