@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Data Role
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-plain">
      <p class="sub-title">Data Role</p>
      <div class="card-header">
        <a href="{{ route('role.create') }}">
          <button class="data-btn" type="button">Create Role</button> 
        </a>
      </div>
      <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="table">
            <thead class="text-primary">
              <th>#</th>
              <th>Role Name</th>
            </thead>
            <tbody id="myTable">
              @if($roles)
                @foreach($roles as $role)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $role->role_name }}</td>
                    <td>
                      <a href="{{ route('role.show', ['id' => $role->role_id]) }}">
                        <button class="details-btn" type="button">Details</button>
                      </a>
                    </td>
                  </tr>
                @endforeach
              @else
                <p class="text-center text-primary">No Role Created Yet!</p>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/js/popup-details.js"></script>
<script src="../assets/js/search.js"></script>
<script src="../assets/js/form-popup.js"></script>
@endsection