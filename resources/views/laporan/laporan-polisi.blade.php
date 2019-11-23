@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    Laporan > Pelaporan Polisi
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card card-plain">
                <p class="sub-title">Semua Data Pelaporan Polisi</p>
              <div class="card-header">
                <button id="myBtn" class="data-btn">Buat Laporan</button> 
              </div>
                <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="inputSearch()" title="Search">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table">
                    <thead class="text-primary">
                      <th>No</th>
                      <th>Kategori</th>
                      <th>Tempat</th>
                      <th>Tanggal</th>
                      <th>Status</th>
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
                          <button class="tangani-btn" type="button" onclick="window.location='http://localhost:8000/maps' ">Tangani</button>
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
    <div class="modal-content4">
      <form>
        <span class="form-title">Buat Laporan</span>
      
        <input class="input-form" type="text" name="pelapor" placeholder="Nama Pelapor">
      <br>
        <input class="input-form" type="text" name="kasus" placeholder="Kategori Kasus">
      <br>
        <input class="input-form" type="text" name="lokasi" placeholder="Lokasi Kejadian">
      <br>
        <input class="input-form" type="text" onfocus="(this.type='datetime-local')"  name="waktu" placeholder="Waktu">
      <br>
        <input class="input-form" type="text" name="deskripsi" placeholder="Deskripsi">
      <br>
        <input type="file">
          <div class="container-form-btn">
            <button type="submit" class="form-btn">Tambah</button>
          </div>
    </form>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/js/search.js"></script>
<script src="../assets/js/form-popup.js"></script>
@endsection