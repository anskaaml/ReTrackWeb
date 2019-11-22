@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Data Kategori
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card card-plain">
                <p class="sub-title">Semua Data Kategori</p>
              <div class="card-header">
                <button id="myBtn-form" class="data-kategori-btn">Tambah Kategori</button> 
              </div>
                <input type="text" class="input-search" id="input-search" placeholder="Search by Nama Kategori" onkeyup="inputSearch()" title="Search">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table">
                    <thead class="text-primary">
                      <th>
                        No
                      </th>
                      <th>
                        Nama Kategori
                      </th>
                      <th>
                        
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          
                        </td>
                        <td>
                          
                        </td>
                        <td>
                          <button class="details-btn" id="myBtn-details">Details</button>
                        </td>
                      </tr>
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
        <span class="form-title2">Tambah Kategori</span>
      
        <input class="input-form" type="text" name="kategori" placeholder="Nama Kategori">
      <br>
      <div class="container-form-btn">
        <button type="submit" class="form-btn">Tambah</button>
      </div>
    </form>
  </div>
</div>

<div id="myModal-details" class="modal-details">
    <div class="modal-content-details3">
      <span class="form-title">Detail Kategori</span>
      <br>
        <a>Nama Kategori</a>
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