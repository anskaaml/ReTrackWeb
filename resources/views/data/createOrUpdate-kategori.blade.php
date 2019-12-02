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
                    @if(isset($category))
                        <span class="form-title">Update Category</span>
                        {{ Form::model($category, ['route' => ['category.update', $category->category_id], 'method' => 'post']) }}
                    @else
                        <span class="form-title">Create Category</span>
                        {{ Form::open(['route' => 'category.store']) }}
                    @endif
                        {{ Form::text('category_name', Request::old('category_name'), ['class' => 'input-form', 'placeholder' => 'Category Name']) }}
                        <br>
                        <div class="container-form-btn">
                            <button type="submit" class="form-btn">Done</button>
                        </div>
                    {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection