@extends('maps.index')

@section('title')
    ReTrack
@endsection

@section('content')
<div class="row">
    <div class="map">
	    {!! Mapper::render() !!}
    </div>
        <form class="wrap-map">
            <input class="input-assign" type="text" name="lokasi" placeholder="Lokasi Tujuan">
        <br>
            <select class="select-assign" name="kategori">
                <option value="kategori">Kategori</option>
                <option value="kebakaran">Kebakaran</option>
                <option value="pembunuhan">Pembunuhan</option>
                <option value="kecelakaan">Kecelakan</option>
                <option value="pemerkosaan">Pemerkosaan</option>
            </select>
        <br>
            <input class="input-assign" type="text" name="mobil" placeholder="Jumlah Mobil">
        <br>
            <textarea class="input-deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
        <br>
            <input class="input-assign" type="text" name="upload-foto" placeholder="Upload Foto">
        <br>
            <button class="assign-btn">Assign Tugas</button>
        </form>
@endsection

@section('scripts')

@endsection