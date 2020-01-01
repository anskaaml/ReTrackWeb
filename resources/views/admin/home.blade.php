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
            <p class="sub-title">Statistik Laporan Patroli</p>
            <!-- <form>
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
            </form>   -->

            <script type="text/javascript" src="../assets/js/chart.js"></script>
            <div style="font-family: roboto;">
                <canvas id="myChart"></canvas>
            </div>  
            <br>
            <table class="table">
                <thead>
                    <td>Status</td>
                    <td>Jumlah</td>
                </thead>
                <tbody>
                    @if($patrolStatuses)
                        @foreach($patrolStatuses as $patrolStatus)
                        <tr>
                            <td>
                                <?php
                                    if($patrolStatus->patrol_status == 0) {
                                        echo("Aman");
                                    } else {
                                        echo("Rawan");
                                    }
                                ?>
                            </td>
                            <td>
                                {{ $patrolStatus->count }}
                            </td>
                        <tr></tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
				datasets: [{
					label: 'Aman',
					data: [2, 5, 3, 6, 2, 3, 7, 10, 11, 8, 5, 4],
					backgroundColor: [
					'rgba(0, 0, 0, 0)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 3,
				},
					{
					label: 'Rawan',
					data: [4, 3, 2, 7, 2, 5, 10, 9, 1, 2, 6, 5],
					backgroundColor: [
					'rgba(0, 0, 0, 0)'
					],
					borderColor: [
					'rgba(54, 225, 235, 1)'
					],
					borderWidth: 3,

					}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
</script>
<!-- <script src="../assets/js/chart-data.js"></script> -->
@endsection