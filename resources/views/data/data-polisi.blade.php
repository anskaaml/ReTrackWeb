@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Data Police
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-plain">
      <p class="sub-title">Data Police</p>
      <div class="card-header">
        <a href="{{ route('police.create') }}">
          <button class="data-btn" type="button">Create Police</button> 
        </a>
      </div>
      <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="table">
            <thead class="text-primary">
              <th>#</th>
              <th>Employee ID</th>
              <th>Name</th>
              <th>Birthdate</th>
              <th>Action</th>
            </thead>
            <tbody id="myTable">
              @if($polices)
                @foreach($polices as $police)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $police->user_employee_id }}</td>
                    <td>{{ $police->user_name }}</td>
                    <td>{{ $police->user_birthdate }}</td>
                    <td>
                      <a href="{{ route('police.show', ['id' => $police->user_id]) }}">
                        <button class="details-btn" type="button">Details</button>
                      </a>
                    </td>
                  </tr>
                @endforeach
              @else
                <p class="text-center text-primary">No User Created Yet!</p>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

      <!-- <div id="myModal" class="modal-form">
    <div class="modal-content2">
      <form>
        <span class="form-title">Add Police</span>

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
        <button type="submit" class="form-btn">Add</button>
      </div>
    </form>
  </div>
</div> -->

<!-- <div id="myModal-details" class="modal-details">
    <div class="modal-content-details">
      <span class="form-title">Detail Polisi</span>
      <br>
        <a>Police Name</a>
      <br>
      <br>
      <br>
        <a>Rank</a>
      <br>
      <br>
      <br>
        <a>Status</a>
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
</div> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/js/popup-details.js"></script>
<script src="../assets/js/search.js"></script>
<script src="../assets/js/form-popup.js"></script>
@endsection