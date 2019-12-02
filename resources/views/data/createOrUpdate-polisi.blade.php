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
          @if(isset($police))
            <span class="form-title">Update Police</span>
            {{ Form::model($police, ['route' => ['police.update', $police->user_id], 'method' => 'post']) }}
          @else
            <span class="form-title">Create Police</span>
            {{ Form::open(['route' => 'police.store']) }}
          @endif
              {{ Form::text('user_employee_id', Request::old('user_employee_id'), ['class' => 'input-form', 'placeholder' => 'Employee ID']) }}
              <br>
              {{ Form::text('user_name', Request::old('user_name'), ['class' => 'input-form', 'placeholder' => 'Name']) }}
              <br>
              {{ Form::password('user_password', ['class' => 'input-form', 'placeholder' => 'Password']) }}
              <br>
              {{ Form::text('user_birthdate', Request::old('user_birthdate'), ['class' => 'input-form', 'placeholder' => 'Birthdate']) }}
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