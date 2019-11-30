@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    Agenda
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
                <button class="agenda-btn" type="button" onclick="window.location='http://localhost:8000/add-agenda' ">Add New</button>
              </div>
                <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table">
                    <thead class=" text-primary">
                      <th>No</th>
                      <th>Member Name</th>
                      <th>Car</th>  
                      <th>Date</th>
                      <th>Action</th>    
                    </thead>
                    <tbody id="myTable">
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <a href="http://localhost:8000/detail-agenda">
                          <button class="details-btn" >Details</button>
                        </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/js/search.js"></script>
<script src="../assets/js/popup-agenda.js"></script>
@endsection

