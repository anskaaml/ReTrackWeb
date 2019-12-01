@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Data Role
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header"></div>
    <div class="card-body">
    <div id="myModal-details" class="modal-details">
    <div class="modal-content-details">
      <span class="form-title">Details Role</span>
      <br>
        <strong>Role Name</strong>
      <br>
        <?= $role->role_name ?>
      <br>
      <br>
      <br>
      <br>

      <div class="container-details-btn">
        <a href="{{ route('role.delete', ['id' => $role->role_id]) }}">
          <button type="button" class="crud-btn">Delete</button>
        </a>
        &emsp;
        <a href="{{ route('role.edit', ['id' => $role->role_id]) }}">
          <button type="button" class="crud-btn">Update</button>
        </a>
        &emsp;
        <a href="{{ route('role') }}">
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