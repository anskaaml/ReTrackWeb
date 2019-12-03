@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Create Car
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header"></div>
            <div class="card-body">
                <div id="myModal-form" class="modal-form">
                    <div class="modal-content">
                    @if(isset($car))
                        <span class="form-title">Update Car</span>
                        {{ Form::model($car, ['route' => ['car.update', $car->car_id], 'method' => 'post']) }}
                    @else
                        <span class="form-title">Create Car</span>
                        {{ Form::open(['route' => 'car.store']) }}
                    @endif
                        {{ Form::text('car_number', Request::old('car_number'), ['class' => 'input-form', 'placeholder' => 'Car Number']) }}
                    <br>
                        {{ Form::text('car_brand', Request::old('car_brand'), ['class' => 'input-form', 'placeholder' => 'Car Brand']) }}
                    <br>
                        {{ Form::text('car_type', Request::old('car_type'), ['class' => 'input-form', 'placeholder' => 'Car Type']) }}
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