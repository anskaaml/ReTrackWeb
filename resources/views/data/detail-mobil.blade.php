@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Data Cars 
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header"></div>
    <div class="card-body">
    <div id="myModal-details" class="modal-details">
    <div class="modal-content-details">
      <span class="form-title">Details Car</span>
      <br>
        <strong>Car Number</strong>&emsp;&emsp;<?= $car->car_number ?>
      <br>
      <br>
      <br>
        <strong>Car Brand</strong>&emsp;&emsp;&emsp;<?= $car->car_brand ?>
      <br>
      <br>
      <br>
        <strong>Car Type</strong>&emsp;&emsp;&emsp;&emsp;<?= $car->car_type ?>
      <br>
      <br>
      <br>
      <br>
      <br>

      <div class="container-details-btn">
      <a href="{{ route('car.delete', ['id' => $car->car_id]) }}">
          <button type="button" class="crud-btn">Delete</button>
      </a>    
        &emsp;
      <a href="{{ route('car.edit', ['id' => $car->car_id]) }}">
          <button type="button" class="crud-btn">Update</button>
      </a>
        &emsp;
      <a href="{{ route('car') }}">
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