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
      <p class="sub-title">Data Cars</p>
    <div class="card-header">
      <button id="myBtn-form" class="data-btn">Create Car</button> 
    </div>
    <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table" id="table">
          <thead class="text-primary">
            <th>#</th>
            <th>Car Number</th>
            <th>Car Brand</th>
            <th>Car Type</th>  
            <th>Action</th>
          </thead>
          <tbody>
            @if($cars)
              @foreach($cars as $car)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $car->car_number }}</td>
                  <td>{{ $car->car_brand }}</td>
                  <td>{{ $car->car_type }}</td>
                  <td>
                    <button class="details-btn" id="myBtn-details">Details</button>
                  </td>
                </tr>
              @endforeach
            @else
              <p class="text-center text-primary">No Car Created Yet!</p>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<div id="myModal-form" class="modal-form">
  <div class="modal-content">
    <form method="post" action="{{ route('car.create') }}">
      {{ csrf_field() }}
      <span class="form-title">Create Car</span>
      <input class="input-form" type="text" name="car_number" placeholder="Car Number">
      <br>
      <input class="input-form" type="text" name="car_brand" placeholder="Car Brand">
      <br>
      <input class="input-form" type="text" name="car_type" placeholder="Car Type">
      <br>
      <div class="container-form-btn">
        <button type="submit" class="form-btn">Create</button>
      </div>
    </form>
  </div>
</div>

<div id="myModal-details" class="modal-details">
  <div class="modal-content-details">
    <span class="form-title">Car Details</span>
    <br>
      <a>Car Number</a>
    <br>
    <br>
    <br>
      <a>Car Brand</a>
    <br>
    <br>
    <br>
      <a>Car Type</a>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container-details-btn">
      <button type="submit" class="crud-btn">Delete</button>
        &emsp;
      <button type="submit" class="crud-btn">Update</button>
        &emsp;
      <button type="submit" class="crud-btn" id="btn-cancel">Cancel</button>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/js/popup-form.js"></script>
<script src="../assets/js/search.js"></script>
<script src="../assets/js/popup-details.js"></script>
@endsection