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
              <th>Gender</th>
              <th>Photo<th>
              <th>Role</th>
              <th>Action</th>
            </thead>
            <tbody id="myTable">
              @if($polices)
                @foreach($polices as $police)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $police->user_employee_id }}</td>
                    <td>{{ $police->user_name }}</td>
                    <td>
                      @if($police->user_birthdate)
                        {{ \Carbon\Carbon::parse($police->user_birthdate)->format('d M Y') }}
                      @endif
                    </td>
                    <td>
                      <?php
                        if($police->user_gender == 'true') {
                          echo "Male";
                        } else {
                          echo "Female";
                        }
                      ?>
                    </td>
                    <td>
                      @if($police->user_photo)
                         <img src="<?= "https://api.retrack-app.site".$police->user_photo ?>" height="100px">
                      @endif
                    </td>
                    <td>
                      @if($police->role_id)
                        {{ $police->role->role_name }}
                      @endif
                    </td>
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
        <div class="pull-right">
        {{ $polices->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="../assets/js/search.js"></script>
<!-- <script src="../assets/js/popup-details.js"></script>
<script src="../assets/js/form-popup.js"></script> -->
@endsection