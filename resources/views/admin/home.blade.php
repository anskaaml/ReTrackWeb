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
    var aman = [];
    var rawan = [];
    $.ajax({
                url: 'https://api.retrack-app.site/patrol-report',
                crossDomain: true,
                async: false,
                type: 'GET',
                contentType: 'json',
                headers: {
                    'Authorization': 'Bearer <?php echo Session::get('token');?>'
                },
                success: function (result) {
                    for (let j = 0; j < 12; j++) {
                        var totalAman = 0;
                        var totalRawan = 0;
                        for (let i = 0; i < result.length; i++) {
                            var d = new Date(result[i].patrol_date);
                            if(j == d.getMonth()) {
                                if(result[i].patrol_status == 0) {
                                    totalAman++;
                                }else if(result[i].patrol_status == 1) {
                                    totalRawan++;
                                }
                            }
                        }    
                        aman.push(totalAman);
                        rawan.push(totalRawan);                    
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
    
    console.log(aman);
    console.log(rawan);
    var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                datasets: 
                    [
                        {
                            label: 'Aman',
                            data: aman,
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
                            data: rawan,
                            backgroundColor: [
                                'rgba(0, 0, 0, 0)'
                            ],
                            borderColor: [
                                'rgba(54, 225, 235, 1)'
                            ],
                            borderWidth: 3,

                        }
                    ]
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
            }
        );
</script>
<!-- <script src="../assets/js/chart-data.js"></script> -->
@endsection