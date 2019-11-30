@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Create Team
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header"></div>
            <div class="card-body">
                <div id="myModal-form" class="modal-form">
                    <div class="modal-content">
                    <form>
                        <span class="form-title">Create Team</span>
                        <input class="input-form" type="text" name="team_name" placeholder="Team Name">
                        <br>
                        <input class="input-form" type="text" name="coordinator" placeholder="Coordinator">
                        <br>
                        <input class="input-form" type="text" name="member" placeholder="Member">
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