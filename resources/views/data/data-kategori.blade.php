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
          <button id="myBtn-form" class="data-kategori-btn">Add Category</button> 
        </div>
        <input type="text" class="input-search" id="input-search" placeholder="Search by Category Name" onkeyup="inputSearch()" title="Search">
        <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="table">
            <thead class="text-primary">
              <th>#</th>
              <th>Category Name</th>
              <th>Action</th>
            </thead>
            <tbody>
              @if($categories)
                @foreach($categories as $category)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>
                      <button class="details-btn" id="myBtn-details">Details</button>
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

<div id="myModal-form" class="modal-form">
  <div class="modal-content3">
    <form>
      <span class="form-title2">Create Category</span>
      <input class="input-form" type="text" name="kategori" placeholder="Nama Kategori">
      <br>
      <div class="container-form-btn">
        <button type="submit" class="form-btn">Create</button>
      </div>
    </form>
  </div>
</div>

<div id="myModal-details" class="modal-details">
  <div class="modal-content-details3">
    <span class="form-title">Category Details</span>
    <br>
      <a>Category Name</a>
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

<script src="../assets/js/popup-form.js"></script>
<script src="../assets/js/popup-details.js"></script>
<script src="../assets/js/search.js"></script>
@endsection