@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Create Category
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header"></div>
            <div class="card-body">
                <div id="myModal-form" class="modal-form">
                    <div class="modal-content3">
                    <form>
                        <span class="form-title">Create Category</span>
                        <br>
                        <input class="input-form" type="text" name="category_name" placeholder="Category Name">
                        <br>
                        <div class="container-form-btn">
                            <button type="submit" class="form-btn">Done</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection