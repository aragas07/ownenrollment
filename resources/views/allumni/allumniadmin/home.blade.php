@extends('layouts.alumni', ['title' => 'Alumni', 'active'=>'Dashboard'])
@section('content')
<div class="content-wrapper">
    <div class="main-container p-3">
        <div class="row col-12">
            <div class="col-lg-3">
                <!-- small box -->
                <a href="gradlist.php">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Graduate list</h3>

                            <p>17122</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-university"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3">
                <!-- small box -->
                <a href="report.php">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Report</h3>

                            <p>Bar chart</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3">
                <!-- small box -->
                <a href="piechart.php">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>Employment Status</h3>

                            <p>Pie Chart</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3">
                <!-- small box -->
                <a href="industry.php">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>Industry</h3>
                            <p>Employed</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-home"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-12 feed-cont">
            <div class="card shadow-lg" style="height: 100%">
                <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-line mr-1"></i>Graduates
                </h3>
                </div>
                <div class="card-body p-1">
                    <div>
                    <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const label = [];
    const num = [];
</script>

@foreach($data as $d)
<script>
    label.push("{{$d->status}}");
    num.push("{{$d->total}}");
</script>
@endforeach
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: label,
            datasets: [{
                label: 'Count of status type',
                data: num,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection