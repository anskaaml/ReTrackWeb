@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    CRUD > Data Mobil
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card card-plain">
                <p class="sub-title">Semua Data Mobil</p>
              <div class="card-header">
                <button id="myBtn" class="data-btn">Tambah Mobil</button> 
              </div>
                <input type="text" class="input-search" id="input-search" placeholder="Search by ID" onkeyup="inputSearch()" title="Search">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table">
                    <thead class="text-primary">
                      <th>
                        No
                      </th>
                      <th>
                        ID
                      </th>
                      <th>
                        Plat Mobil 
                      </th>
                      <th>
                        Jenis Mobil
                      </th>
                      <th>
                        Merk Mobil
                      </th>  
                      <th>

                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          1112222334
                        </td>
                        <td>
                          L 123 MV 
                        </td>
                        <td>
                          Convertible
                        </td>
                        <td>
                           Lamborgini
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

      <div id="myModal" class="modal">
    <div class="modal-content">
      <form>
        <span class="form-title">Tambah Mobil</span>
      
        <input class="input-form" type="text" name="plat" placeholder="Plat Mobil">
      <br>
        <input class="input-form" type="text" name="jenis" placeholder="Jenis Mobil">
      <br>
        <input class="input-form" type="text" name="merk" placeholder="Merk Mobil">
      <br>
      <div class="container-form-btn">
        <button type="submit" class="form-btn">Tambah</button>
      </div>
    </form>
  </div>
</div>

<div id="myModal-details" class="modal">
    <div class="modal-content-details">
      <span class="form-title">Detail Mobil</span>
      <br>
        <a>Plat Mobil</a>
      <br>
      <br>
      <br>
        <a>Jenis Mobil</a>
      <br>
      <br>
      <br>
        <a>Merk Mobil</a>
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

<script src="../assets/js/popup.js"></script>
<script src="../assets/js/search.js"></script>
<script src="../assets/js/popup-details.js"></script>
@endsection