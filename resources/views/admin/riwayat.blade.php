@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    Riwayat
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card card-plain">
                <p class="sub-title">Semua Data Riwayat</p>
              <div class="card-header">
              </div>
                <input type="text" class="input-search" id="input-search" placeholder="Search by Nama Polisi" onkeyup="inputSearch()" title="Search">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table">
                    <thead class="text-primary">
                      <th>
                        No
                      </th>
                      <th>
                        Nama Polisi
                      </th>
                      <th>
                        Lokasi   
                      </th>
                      <th>
                        Tanggal
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
                          
                        </td>
                        <td>
                          
                        </td>
                        <td>
                          <a href="./">Details</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
@endsection