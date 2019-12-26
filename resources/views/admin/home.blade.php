@extends('layouts.index')

@section('title')
    ReTrack
@endsection

@section('name')
    Dashboard
@endsection

@section('content')
<div class="row">
<div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
                <form>
                    <input class="form-dashboard" type="text" onfocus="(this.type='date')"  name="date" placeholder="Date">
                    &emsp; 
                    <a>To</a>
                    &emsp;
                    <input class="form-dashboard" type="text" onfocus="(this.type='date')"  name="date" placeholder="Date"> 
                    &emsp;   
                    <select class="form-dashboard" name="pick-report">
                    <option value="police-report">Police Report</option>
                    <option value="citizen-report">Citizen Report</option>
                </select>          
                </form>  

                <script type="text/javascript" src="../assets/js/chart.js"></script>
                
                <div style="width: 1000px;height: 1000px; font-family: roboto;">
		            <canvas id="myChart"></canvas>
            </div>          
        </div>
    </div>

<script src="../assets/js/chart-data.js"></script>
@endsection

