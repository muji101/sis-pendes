@extends('layouts.dashboard')

@section('title', 'Dashboard')

@push('addon-style')
    <link rel="stylesheet" href="/dist/assets/vendors/apexcharts/apexcharts.css">
@endpush

@section('content')
<div class="main-content container-fluid">
    <div class="row">
        <!-- Penduduk -->
        <div class="col-2 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info" style="background-color: rgb(255, 201, 71, 0.5)">
                <div class="card-body p-1 p-xl-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col mr-2 d-flex flex-column justify-content-between h-100">
                            <div class="text-sm fw-bold text-secondary text-uppercase d-flex align-items-center h-100 mb-1">
                                <i class="fas fa-users text-secondary"></i>&nbsp;
                                Penduduk
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 40px;">{{ $residents->count() }}</div>
                            <span><a class="text-secondary" href="{{ route('residents.index') }}">show detail</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Keluarga -->
        <div class="col-2 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info" style="background-color: rgb(124, 131, 253, 0.5)">
                <div class="card-body p-1 p-xl-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col mr-2 d-flex flex-column justify-content-between h-100">
                            <div class="text-sm fw-bold text-secondary text-uppercase d-flex align-items-center h-100 mb-1">
                                <i class="fas fa-home text-secondary"></i>&nbsp;
                                Keluarga
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 40px;">{{ $families->count() }}</div>
                            <span><a class="text-secondary" href="{{ route('families.index') }}">show detail</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kelahiran -->
        <div class="col-2 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info" style="background-color: rgb(255, 201, 71, 0.5)">
                <div class="card-body p-1 p-xl-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col mr-2 d-flex flex-column justify-content-between h-100">
                            <div class="text-sm fw-bold text-secondary text-uppercase d-flex align-items-center h-100 mb-1">
                                <i class="fas fa-baby text-secondary"></i>&nbsp;
                                Kelahiran
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 40px;">{{ $births->count() }}</div>
                            <span><a class="text-secondary" href="{{ route('births.index') }}">show detail</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kematian -->
        <div class="col-2 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info" style="background-color: rgb(124, 131, 253, 0.5)">
                <div class="card-body p-1 p-xl-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col mr-2 d-flex flex-column justify-content-between h-100">
                            <div class="text-sm fw-bold text-secondary text-uppercase d-flex align-items-center h-100 mb-1">
                                <i class="fas fa-book-dead text-secondary"></i>&nbsp;
                                Kematian
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 40px;">{{ $deaths->count() }}</div>
                            <span><a class="text-secondary" href="{{ route('deaths.index') }}">show detail</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pendatang -->
        <div class="col-2 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info" style="background-color: rgb(255, 201, 71, 0.5)">
                <div class="card-body p-1 p-xl-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col mr-2 d-flex flex-column justify-content-between h-100">
                            <div class="text-sm fw-bold text-secondary text-uppercase d-flex align-items-center h-100 mb-1">
                                <i class="fas fa-suitcase-rolling text-secondary"></i>&nbsp;
                                Pendatang
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 40px;">{{ $comes->count() }}</div>
                            <span><a class="text-secondary" href="{{ route('comes.index') }}">show detail</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pindahan -->
        <div class="col-2 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info" style="background-color: rgb(124, 131, 253, 0.5)">
                <div class="card-body p-1 p-xl-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col mr-2 d-flex flex-column justify-content-between h-100">
                            <div class="text-sm fw-bold text-secondary text-uppercase d-flex align-items-center h-100 mb-1">
                                <i class="fas fa-route text-secondary"></i>&nbsp;
                                Perpindahan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 40px;">{{ $moves->count() }}</div>
                            <span><a class="text-secondary" href="{{ route('moves.index') }}">show detail</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info">
                <div class="card-header">
                    <h5 class="fw-bold border-bottom border-2">
                        <i data-feather="activity"></i> 
                        Perbandingan Kelahiran & Kematian
                    </h5>
                </div>
                <div class="card-body p-1 p-xl-3">
                    <canvas id="myChart1" width="400" height="260"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info">
                <div class="card-header">
                    <h5 class="fw-bold border-bottom border-2">
                        <i class="fas fa-venus-mars"></i>
                        Perbandingan Laki-laki & Perempuan
                    </h5>
                </div>
                <div class="card-body p-1 p-xl-3">
                    <canvas id="myChart" width="400" height="260"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info">
                <div class="card-header">
                    <h5 class="fw-bold border-bottom border-2">
                        <i class="fas fa-pray"></i>
                        Perbandingan Penganut  Agama
                    </h5>
                </div>
                <div class="card-body p-1 p-xl-3">
                    <canvas id="myChart2" width="400" height="260"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info">
                <div class="card-header">
                    <h5 class="fw-bold border-bottom border-2">
                        <i class="fas fa-ring"></i>
                        Status Pernikahan
                    </h5>
                </div>
                <div class="card-body p-1 p-xl-3">
                    <canvas id="myChart3" width="400" height="260"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info">
                <div class="card-header">
                    <h5 class="fw-bold border-bottom border-2">
                        <i class="fas fa-bus-alt"></i>
                        Perbandingan Kedatangan & Perpindahan
                    </h5>
                </div>
                <div class="card-body p-1 p-xl-3">
                    <canvas id="myChart4" width="400" height="260"></canvas>
                </div>
            </div>
        </div>

        <div class="col-6 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info">
                <div class="card-header">
                    <h5 class="fw-bold border-bottom border-2">
                        <i class="fas fa-chart-line"></i>
                        Perbandingan Berdasarkan Umur
                    </h5>
                </div>
                <div class="card-body p-1 p-xl-3">
                    <canvas id="myChart5" width="400" height="260"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('addon-script')
<script src="/dist/assets/vendors/dayjs/dayjs.min.js"></script>
<script src="/dist/assets/vendors/apexcharts/apexcharts.min.js"></script>
<script src="/dist/assets/js/pages/ui-apexchart.js"></script>

    {{-- chart js --}}
<script src="path/to/chartjs/dist/chart.js"></script>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Laki-laki', 'Perempuan'],
        datasets: [{
            label: 'My First Dataset',
            data: [{{ $pie['pria'] }}, {{ $pie['wanita'] }}],
            offset: 100,
            backgroundColor: [
            'rgb(24, 90, 219, 0.7)',
            'rgb(255, 201, 71, 0.7)',
            ],
            hoverBorderColor: [
                'rgb(255, 201, 71, 0.9)',
                'rgb(24, 90, 219, 0.6)',
            ],
            hoverOffset: 4,
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
    }
});

var ctx = document.getElementById('myChart1').getContext('2d');
var myChart1 = new Chart(ctx, {
    type: 'line',
    data: {
        // labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        labels: <?php echo json_encode($label); ?>,
        datasets: [
            {
            label: ['Data Kematian'],
            data: <?php echo json_encode($jumlah_death); ?>,
            fill: true,
            borderColor: 'rgb(124, 131, 253)',
            backgroundColor: 'rgb(124, 131, 253, 0.27)',
            hoverBackgroundColor: 'rgb(86, 232, 105)',
            tension: 0.5
            },
            {
            label: ['Data Kelahiran'],
            data: <?php echo json_encode($jumlah_birth); ?>,
            fill: true,
            borderColor: 'rgb(3, 219, 252)',
            backgroundColor: 'rgb(125, 237, 255, 0.27)',
            hoverBackgroundColor: 'rgb(86, 232, 105)',
            tension: 0.5
            },
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            }
        },
    }
});

var ctx = document.getElementById('myChart2').getContext('2d');
var myChart1 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labelAgama); ?>,
        datasets: [
        {
        label: 'Penduduk',
        data:  [{{ $bar['islam'] }}, {{ $bar['budha'] }}, {{ $bar['hindu'] }}, {{ $bar['katolik'] }}, {{ $bar['kristen'] }}, {{ $bar['konghucu'] }}],
        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
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
    },
});


var ctx = document.getElementById('myChart3').getContext('2d');
var myChart1 = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: ['Menikah' ,'Belum Menikah'],
        datasets: [
        {
        label: ['Status Pernikahan'],
        data:  [{{ $status['kawin'] }}, {{ $status['belum_kawin'] }}],
        backgroundColor: [
            'rgba(255, 99, 132, 0.4)',
            'rgba(75, 192, 192, 0.4)',
        ],
        borderColor: [
            'rgba(255, 99, 132, 0.5)',
            'rgba(75, 192, 192, 0.5)'
        ],
        borderWidth: 2
        }
    ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            }
        },
    }
});

var ctx = document.getElementById('myChart4').getContext('2d');
var myChart1 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($label); ?>,
        datasets: [
            {
            label: ['Data Kedatangan'],
            data: <?php echo json_encode($jumlah_come); ?>,
            fill: true,
            borderColor: 'rgb(100, 201, 207)',
            backgroundColor: 'rgba(100, 201, 207, 0.27)',
            hoverBackgroundColor: 'rgb(86, 232, 105)',
            tension: 0.5
            },
            {
            label: ['Data Perpindahan'],
            data: <?php echo json_encode($jumlah_move); ?>,
            fill: true,
            borderColor: 'rgb(255, 204, 41)',
            backgroundColor: 'rgba(255, 204, 41, 0.27)',
            hoverBackgroundColor: 'rgb(86, 232, 105)',
            tension: 0.5
            },
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                stacked: true
            },
            x: {
                stacked: true
            }
        },
    }
});

var ctx = document.getElementById('myChart5').getContext('2d');
var myChart1 = new Chart(ctx, {
    type: 'radar',
    data: {
        labels: <?php echo json_encode($labelUmur); ?>,
        datasets: [
        {
        label: 'Penduduk',
        data:  [{{ $age['age1'] }}, {{ $age['age2'] }}, {{ $age['age3'] }}, {{ $age['age4'] }}, {{ $age['age5'] }}, {{ $age['age6'] }}, {{ $age['age7'] }}],
        backgroundColor: [
        // 'rgba(255, 99, 132, 0.2)',
        // 'rgba(255, 159, 64, 0.2)',
        // 'rgba(255, 205, 86, 0.2)',
        // 'rgba(75, 192, 192, 0.2)',
        // 'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        // 'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
        // 'rgb(255, 99, 132)',
        // 'rgb(255, 159, 64)',
        // 'rgb(255, 205, 86)',
        // 'rgb(75, 192, 192)',
        // 'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        // 'rgb(201, 203, 207)'
        ],
        borderWidth: 1
        }]
    },
    options: {
        // scales: {
        //     yAxes: [{
        //     ticks: {
        //     beginAtZero: true
        //     }
        // }]
        // }
    },
});

</script>
@endpush