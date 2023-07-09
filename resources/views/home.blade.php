@extends('layouts.admin', [
    'title' => 'Home',
    'class_open_dashboard' => 'menu-open',
    'class_dashboard' => 'active',
    'class_home' => 'active',
])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $students->count() }}</h3>

                                <p>All Students</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $books->count() }}</h3>

                                <p>Text Books</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                @if (isset($remaining_books[0]))
                                    <h3>{{ $remaining_books[0]->quantity }}</h3>
                                @else
                                    <h3>N/A</h3>
                                @endif


                                <p>Exercise Books Remaining</p>
                            </div>


                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $exercise_books->count() }}</h3>

                                <p>Exercise Books</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">

                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <div class="chart">
                        <canvas id="barChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        <button class="btn btn-info" onclick="updateChart()">Load</button>
                    </div>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('js')
    <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <script>
        var areaChartData = {
            //labels: [],
            datasets: [{
                    label: 'Subjects',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    // data: [1, 1, 1, 1, 7]
                },

                // {
                //     label: 'Electronics',
                //     backgroundColor: 'rgba(210, 214, 222, 1)',
                //     borderColor: 'rgba(210, 214, 222, 1)',
                //     pointRadius: false,
                //     pointColor: 'rgba(210, 214, 222, 1)',
                //     pointStrokeColor: '#c1c7d1',
                //     pointHighlightFill: '#fff',
                //     pointHighlightStroke: 'rgba(220,220,220,1)',
                //     data: [65, 59, 80, 81, 56, 55, 40]
                // },
            ]
        }


        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }


        function updateChart() {
            async function getData() {
                const response = await fetch(
                    "http://localhost/lelgel-school-management/public/api/exercise_books_data");
                const responseData = await response.json();
                // labels = Object.keys(responseData);
                // allValues = Object.values(responseData);
                // allValues.forEach(element => {
                //     chartLabels.push(element.length)
                // });
                // console.log(chartLabels[0]);
                // data.datasets[0].data = chartLabels;
                // console.log(responseData);
                return responseData;
            }
            getData().then(responseData => {
                var allValues = Object.values(responseData);
                var chartLabels = [];
                var labels = []
                var convertedLabels = [];
                convertedLabels.push(Object.keys(responseData));
                allValues.forEach(element => {
                    chartLabels.push(element.length)
                });
                convertedLabels[0].forEach(element => {
                    labels.push('Hello');
                });
                // console.log(labels);
                areaChartData.labels = labels;
                // console.log(areaChartData.labels);
                areaChartData.datasets[0].data = chartLabels;
                myChart.update()
            });
        }
        setInterval(updateChart, 1000);
        console.log(areaChartData.labels);
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]

        barChartData.datasets[0] = temp0


        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        myChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        });
    </script>
@endpush
