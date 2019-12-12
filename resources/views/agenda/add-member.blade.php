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
              <div class="card-header"></div>
                <div class="card-body">
                    <div id="myModal-agenda" class="modal-agenda">
                        <div class="modal-content-agenda2">    
                        <a href="{{ route('agenda.create') }}"> 
                            <span class="close" onclick="hide(); return false">&times;</span>
                        </a>
                            <span class="form-title-agenda">Add Police Member</span>
                                <input type="text" class="search-add-member" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="table">
                                                <thead class="text-primary">
                                                    <th>#</th>
                                                    <th>Police Name</th>  
                                                    <th>Action</th>
                                                </thead>
                                                <tbody id="myTable">
                                                    
                                                    <tr>
                                                        <td></td>
                                                        <td>Bambang</td>
                                                        <td><label class="container"><input type="checkbox" checked="checked"><span class="checkmark"></span></label></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script src="../assets/js/search.js"></script>
@endsection