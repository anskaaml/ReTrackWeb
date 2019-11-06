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
                <button class="agenda-btn">Add New</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="table">
                    <thead class=" text-primary">
                      <th>
                        No
                      </th>
                      <th>
                        Nama Member
                      </th>
                      <th>
                        Mobil 
                      </th>
                      <th>
                        Tanggal
                      </th>
                      <th>
                        Action
                      </th>  
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          
                        </td>
                        <td>
                          <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="myFunction()" title="Search Nama Member">
                        </td>
                        <td>
                          <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="myFunction()">
                        </td>
                        <td>
                          <input type="text" class="input-search" id="input-search" placeholder="Search" onkeyup="myFunction()">
                        </td>
                        <td>
                           
                        </td>
                      </tr>
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          Sukiman, Sukijan, Sutrisman, Sukirno
                        </td>
                        <td>
                          Mobil-1
                        </td>
                        <td>
                          September 29, 2019 20:21
                        </td>
                        <td>
                           <a href="./">Details</a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          2
                        </td>
                        <td>
                          Didik, Bambang, Yudo, Panji
                        </td>
                        <td>
                          Mobil-2
                        </td>
                        <td>
                          Oktober 07, 2019 19:45
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
      <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("input-search");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
@endsection

