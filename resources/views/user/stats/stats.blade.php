@extends('layouts.authlayout')
@section('content')

{{-- // foreach x as y
//array=View where il mese di view_date=x
count dell'array diventerebbe il dato che ci serve sul grafico --}}

<div class="container">
    <div class="row">
        {{-- Grafico Visualizzazioni --}}

        <div class="grafico col-12 mt-4" style="width:80%; height:80%">
            <canvas id="myChartViews"></canvas>
        </div>
        {{-- Grafico Messaggi --}}
        <div class="grafico col-12 mt-4" style="width:80%; height:80%">
            <canvas id="myChartMessages"></canvas>
        </div>
    </div>
</div>

{{-- Script Grafico Visualizzazioni --}}
<script>
    var ctx = document.getElementById('myChartViews');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre','Novembre', 'Dicembre'],
            datasets: [{
                label: 'Visualizzazioni',
                data: [{{count($monthlyViews[0])}}, {{count($monthlyViews[1])}}, {{count($monthlyViews[2])}}, {{count($monthlyViews[3])}}, {{count($monthlyViews[4])}}, {{count($monthlyViews[5])}}, {{count($monthlyViews[6])}}, {{count($monthlyViews[7])}}, {{count($monthlyViews[8])}}, {{count($monthlyViews[9])}}, {{count($monthlyViews[10])}}, {{count($monthlyViews[11])}}],
                backgroundColor: [
                    'rgba(0,0,0,0)'
                ],
                pointborderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(75, 197, 192, 1)',
                    'rgba(153, 103, 255, 1)',
                    'rgba(255, 151, 64, 1)',
                    'rgba(75, 194, 192, 1)',
                    'rgba(153, 105, 255, 1)',
                    'rgba(255, 156, 64, 1)'
                ],
                borderColor:'yellow',
                borderWidth: 2,
                lineTension:0,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: 'yellow',
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: 'yellow',
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

{{-- Script Grafico Messaggi --}}
<script>
    var ctx = document.getElementById('myChartMessages');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre','Novembre', 'Dicembre'],
            datasets: [{
                label: 'Messaggi',
                data: [{{count($monthlyMessages[0])}}, {{count($monthlyMessages[1])}}, {{count($monthlyMessages[2])}}, {{count($monthlyMessages[3])}}, {{count($monthlyMessages[4])}}, {{count($monthlyMessages[5])}}, {{count($monthlyMessages[6])}}, {{count($monthlyMessages[7])}}, {{count($monthlyMessages[8])}}, {{count($monthlyMessages[9])}}, {{count($monthlyMessages[10])}}, {{count($monthlyMessages[11])}}],

                backgroundColor: [
                    'rgba(0,0,0,0)'
                ],
                pointborderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(75, 197, 192, 1)',
                    'rgba(153, 103, 255, 1)',
                    'rgba(255, 151, 64, 1)',
                    'rgba(75, 194, 192, 1)',
                    'rgba(153, 105, 255, 1)',
                    'rgba(255, 156, 64, 1)'
                ],
                borderColor:'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                lineTension:0,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: 'rgba(255, 99, 132, 1)',
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: 'rgba(255, 99, 132, 1)',
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>



    
@endsection