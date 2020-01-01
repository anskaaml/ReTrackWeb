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
      <a href="{{ route('car.create') }}">
        <button id="myBtn-form" class="data-btn" type="button">Create Car</button>
      </a> 
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
          <tbody id="myTable">
            @if($cars)
              @foreach($cars as $car)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $car->car_number }}</td>
                  <td>{{ $car->car_brand }}</td>
                  <td>{{ $car->car_type }}</td>
                  <td>
                    <a href="{{ route('car.show', ['id' => $car->car_id]) }}">
                      <button class="details-btn" id="myBtn-details">Details</button>
                    </a>  
                  </td>
                </tr>
              @endforeach
            @else
              <p class="text-center text-primary">No Car Created Yet!</p>
            @endif
          </tbody>
        </table>
      </div>
      <div class="pull-right">
        {{ $cars->links() }}
      </div>
    </div>
  </div>
</div>
</div>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/js/search.js"></script>
@endsection