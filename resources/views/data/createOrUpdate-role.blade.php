@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Create Role
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-plain">
      <div class="card-header"></div>
      <div class="card-body">
        <div id="myModal" class="modal-form">
          <div class="modal-content2">
          @if(isset($role))
            <span class="form-title">Update Role</span>
            {{ Form::model($role, ['route' => ['role.update', $role->role_id], 'method' => 'post']) }}
          @else
            <span class="form-title">Create Role</span>
            {{ Form::open(['route' => 'role.store']) }}
          @endif
              {{ Form::text('role_name', Request::old('role_name'), ['class' => 'input-form', 'placeholder' => 'Role Name']) }}
              <br>
              <div class="container-form-btn">
                <button type="submit" class="form-btn">Done</button>
              </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection