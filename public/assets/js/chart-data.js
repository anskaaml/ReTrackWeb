var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: 
			{
				labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
				datasets: 
					[{
						label: 'Kebakaran',
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
						label: 'Pencurian',
						data: [2, 3, 2, 7, 2, 3, 7, 9, 1, 4, 6, 5],
						backgroundColor: [
							'rgba(0, 0, 0, 0)'
						],
						borderColor: [
							'rgba(54, 162, 235, 1)'
						],
						borderWidth: 3,

					},
					{
						label: 'Pembunuhan',
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

		