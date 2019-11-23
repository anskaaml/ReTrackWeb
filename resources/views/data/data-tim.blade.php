@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Data Tim Polisi
@endsection

@section('content')

<div class="row">
          <div class="col-md-12">
            <div class="card card-plain">
                <p class="sub-title">Semua Data Tim Polisi</p>
              <div class="card-header">
                <button id="myBtn" class="data-btn">Tambah Tim</button>
              </div>   
                <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table">
                    <thead class="text-primary">
                      <th>No</th>
                      <th>ID</th>
                      <th>Nama Tim</th>
                      <th>Koordinator</th>
                      <th>Anggota</th>
                      <th>Action</th>
                    </thead>
                    <tbody id="myTable">
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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

  <div id="myModal" class="modal-form">
    <div class="modal-content">
      <form>
        <span class="form-title">Tambah Tim</span>
      
        <input class="input-form" type="text" name="namatim" placeholder="Nama Tim">
      <br>
        <input class="input-form" type="text" name="koordinator" placeholder="Koordinator">
      <br>
        <input class="input-form" type="text" name="anggota" placeholder="Anggota">
      <br>
      <div class="container-form-btn">
        <button type="submit" class="form-btn">Tambah</button>
      </div>
    </form>
  </div>
</div>

<div id="myModal-details" class="modal-details">
    <div class="modal-content-details">
      <span class="form-title">Detail Tim</span>
      <br>
        <a>Nama Tim</a>
      <br>
      <br>
      <br>
        <a>Koordinator</a>
      <br>
      <br>
      <br>
        <a>Anggota</a>
      <br>
      <br>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/js/popup-details.js"></script>
<script src="../assets/js/search.js"></script>
<script src="../assets/js/form-popup.js"></script>
@endsection