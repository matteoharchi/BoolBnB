@extends('layouts.app')
@section('content')

{{-- // foreach x as y
//array=View where il mese di view_date=x

count dell'array diventerebbe il dato che ci serve sul grafico --}}

<canvas id="myChart" width="400" height="400"></canvas>


<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre','Novembre', 'Dicembre'],
            datasets: [{
                label: '# of Votes',
                data: [{{count($monthlyViews[0])}}, {{count($monthlyViews[1])}}, {{count($monthlyViews[2])}}, {{count($monthlyViews[3])}}, {{count($monthlyViews[4])}}, {{count($monthlyViews[5])}}, {{count($monthlyViews[6])}}, {{count($monthlyViews[7])}}, {{count($monthlyViews[8])}}, {{count($monthlyViews[9])}}, {{count($monthlyViews[10])}}, {{count($monthlyViews[11])}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>



    
@endsection
