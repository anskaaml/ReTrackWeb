@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Create Location
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header"></div>
            <div class="card-body">
                <div id="myModal-form" class="modal-form">
                    <div class="modal-content">
                    @if(isset($location))
                        <span class="form-title">Update Location</span>
                        {{ Form::model($location, ['route' => ['location.update', $location->location_id], 'method' => 'post']) }}
                    @else
                        <span class="form-title">Create Location</span>
                        {{ Form::open(['route' => 'location.store']) }}
                    @endif
                        {{ Form::text('location_name', Request::old('location_name'), ['class' => 'input-form', 'placeholder' => 'Location Name']) }}
                    <br>
                        {{ Form::text('location_longitude', Request::old('location_longitude'), ['class' => 'input-form', 'placeholder' => 'Location Longitude']) }}
                    <br>
                        {{ Form::text('location_latitude', Request::old('location_latitude'), ['class' => 'input-form', 'placeholder' => 'Location Latitude']) }}
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