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
                <div class="form-horizontal">
                <form>
                <select class="form-agenda" name="pilih-mobil">
                    <option>Pilih Mobil</option>
                    <option value="mobil-1">Mobil-1</option>
                    <option value="mobil-2">Mobil-2</option>
                    <option value="mobil-3">Mobil-3</option>
                    <option value="mobil-4">Mobil-4</option>
                    <option value="mobil-5">Mobil-5</option>
                </select>   
                &emsp;             
                    <input class="form-agenda" type="date">
                &emsp;                  
                    <input class="form-agenda" type="time">  
                </form>
                </div>
              </div>
              <div class="card-body">
                <div class="maps-agenda" id="maps-agenda"></div>

                <button class="tambah-agenda-btn">Tambah Anggota</button>
                <button class="tambah-agenda-btn2">Tambah Titik Lokasi</button>
                <button class="tambah-agenda-btn3">Selesai</button>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/search.js"></script>
<script src="../assets/js/maps-agenda.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1JkAkXXIIS0UWKlJQt9fsO-v6sg4Cdug&callback=initMap"></script>
@endsection

