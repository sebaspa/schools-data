@extends('adminlte::page')
@section('title', 'Dashboard')

@section('plugins.Chartjs', true)

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row mb-4">
        <div class="col-12 col-md-4 col-lg-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $users }}</h3>
                    <p>Usuarios</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('users.index') }}" class="small-box-footer">Ver más
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $schools }}</h3>
                    <p>Filiaciones</p>
                </div>
                <div class="icon">
                    <i class="fas fa-school"></i>
                </div>
                <a href="{{ route('schools.index') }}" class="small-box-footer">Ver más
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-4">
            <h3>Gráfica (Filiaciones - Descripciones)</h3>
        </div>
        <div class="col-12">
            <canvas id="myChart" width="100%" height="20"></canvas>
        </div>
    </div>
    <div class="row">

    </div>
@endsection

@section('js')
    <script>
        var dataChart = {
            labels: <?php echo json_encode($buildingsName); ?>,
            datasets: <?php echo json_encode($dataGraph); ?>
        };
        var optionsChart = {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    },
                }, ],
                xAxes: [{
                    display: true,
                }, ],
            }
        };

        var ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: dataChart,
            options: optionsChart,
        });
    </script>
@stop
