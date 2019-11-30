@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Create Location
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
                        <span class="form-title">Create Location</span>
                        <input class="input-form" type="text" name="areaname" placeholder="Area Name">
                        <br>
                        <input class="input-form" type="text" name="coordinate" placeholder="Coordinate">
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