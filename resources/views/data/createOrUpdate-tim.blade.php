@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Create Team
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header"></div>
            <div class="card-body">
                <div id="myModal-form" class="modal-form">
                    <div class="modal-content">
                    @if(isset($team))
                        <span class="form-title">Update Team</span>
                        {{ Form::model($team, ['route' => ['team.update', $team->team_id], 'method' => 'post']) }}
                    @else
                        <span class="form-title">Create Team</span>
                        {{ Form::open(['route' => 'team.store']) }}
                    @endif
                        {{ Form::text('car_id', Request::old('car_id'), ['class' => 'input-form', 'placeholder' => 'Car ID']) }}
                    <br>
                        {{ Form::text('user_id', Request::old('user_id'), ['class' => 'input-form', 'placeholder' => 'Police ID']) }}
                    <br>
                        {{ Form::text('agenda_id', Request::old('agenda_id'), ['class' => 'input-form', 'placeholder' => 'Agenda ID']) }}
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