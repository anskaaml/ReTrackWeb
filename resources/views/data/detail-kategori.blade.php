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
    <div class="modal-content-details">
      <span class="form-title">Details Category</span>
      <br>
        <strong>Category Name</strong>
      <br>
        {{ $category->category_name }}
      <br>
      <br>
        <strong>Created At</strong>
      <br>
        {{ date("Y-m-d H:i:s T", strtotime($category->created_at.' UTC')) }}
      <br>
      <br>
        <strong>Updated At</strong>
      <br>
        {{ date("Y-m-d H:i:s T", strtotime($category->updated_at.' UTC')) }}
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