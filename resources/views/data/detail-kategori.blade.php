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
            <div class="card-header"></div>
    <div class="card-body">
    <div id="myModal-details" class="modal-details">
    <div class="modal-content-details3">
      <span class="form-title">Details Categories</span>
      <br>
        <strong>Category Name</strong>&emsp;&emsp;<?= $category->category_name ?>
      <br>
      <br>
      <br>
      <br>

      <div class="container-details-btn">
        <a href="{{ route('category.delete', ['id' => $category->category_id]) }}">
          <button type="button" class="crud-btn">Delete</button>
        </a>
        &emsp;
        <a href="{{ route('category.edit', ['id' => $category->category_id]) }}">
          <button type="button" class="crud-btn">Update</button>
        </a>
        &emsp;
        <a href="{{ route('category') }}">
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