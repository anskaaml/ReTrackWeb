@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Data Categories
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-plain">
        <p class="sub-title">Data Categories</p>
        <div class="card-header">
          <button id="myBtn" class="data-kategori-btn">Add Category</button> 
        </div>
        <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
        <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="table">
            <thead class="text-primary">
              <th>#</th>
              <th>Category Name</th>
              <th>Action</th>
            </thead>
            <tbody id="myTable">
              @if($categories)
                @foreach($categories as $category)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>
                    <button class="details-btn" id="myBtn-details">
                      Details
                    </button>
                    </td>
                  </tr>
                @endforeach
              @else
                <p class="text-center text-primary">No Category Created Yet!</p>
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