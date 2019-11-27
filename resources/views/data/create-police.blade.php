@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Create Police
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header"></div>
    <div class="card-body">
    <div id="myModal" class="modal-form">
    <div class="modal-content2">
      <form>
        <span class="form-title">Create Police</span>

        <input class="input-form" type="text" name="police" placeholder="Police Name">
      <br>
        <input class="input-form" type="text" name="rank" placeholder="Rank">
      <br>
        <input class="input-form" type="text" name="id" placeholder="Police ID">
      <br>
        <input class="input-form" type="text" name="password" placeholder="Password">
      <br>
        <input type="file" name="upload">
      <br>
      <div class="container-form-btn">
        <button type="submit" class="form-btn">Create</button>
      </div>
    </form>
  </div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection