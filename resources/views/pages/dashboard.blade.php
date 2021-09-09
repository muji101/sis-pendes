@extends('layouts.dashboard')

@section('title', 'Dashboard')

@push('addon-style')
<link rel="stylesheet" href="/dist/assets/vendors/apexcharts/apexcharts.css">
@endpush

@section('content')
<div class="main-content container-fluid">
    <div class="row">
        <!-- Total Penduduk -->
        <div class="col-2 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info" style="background-color: rgb(124, 131, 253, 0.5)">
                <div class="card-body p-1 p-xl-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col mr-2 d-flex flex-column justify-content-between h-100">
                            <div class="text-sm fw-bold text-secondary text-uppercase d-flex align-items-center h-100 mb-1">
                                Total Penduduk
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 40px;">{{ $residents->count() }}</div>
                        </div>
                        {{-- <i data-feather="edit" class="text-secondary"></i>  --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Keluarga -->
        <div class="col-2 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info" style="background-color: rgb(255, 201, 71, 0.5)">
                <div class="card-body p-1 p-xl-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col mr-2 d-flex flex-column justify-content-between h-100">
                            <div class="text-sm fw-bold text-secondary text-uppercase d-flex align-items-center h-100 mb-1">
                                Total Keluarga
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 40px;">{{ $families->count() }}</div>
                        </div>
                        {{-- <i data-feather="edit" class="text-secondary"></i>  --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Kelahiran -->
        <div class="col-2 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info" style="background-color: rgb(124, 131, 253, 0.5)">
                <div class="card-body p-1 p-xl-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col mr-2 d-flex flex-column justify-content-between h-100">
                            <div class="text-sm fw-bold text-secondary text-uppercase d-flex align-items-center h-100 mb-1">
                                Total  Kelahiran
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 40px;">{{ $births->count() }}</div>
                        </div>
                        {{-- <i data-feather="edit" class="text-secondary"></i>  --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Kematian -->
        <div class="col-2 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info" style="background-color: rgb(255, 201, 71, 0.5)">
                <div class="card-body p-1 p-xl-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col mr-2 d-flex flex-column justify-content-between h-100">
                            <div class="text-sm fw-bold text-secondary text-uppercase d-flex align-items-center h-100 mb-1">
                                Total Kematian
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 40px;">{{ $deaths->count() }}</div>
                        </div>
                        {{-- <i data-feather="edit" class="text-secondary"></i>  --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Pendatang -->
        <div class="col-2 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info" style="background-color: rgb(124, 131, 253, 0.5)">
                <div class="card-body p-1 p-xl-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col mr-2 d-flex flex-column justify-content-between h-100">
                            <div class="text-sm fw-bold text-secondary text-uppercase d-flex align-items-center h-100 mb-1">
                                Total Pendatang
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 40px;">{{ $comes->count() }}</div>
                        </div>
                        {{-- <i data-feather="edit" class="text-secondary"></i>  --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Pindahan -->
        <div class="col-2 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info" style="background-color: rgb(255, 201, 71, 0.5)">
                <div class="card-body p-1 p-xl-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col mr-2 d-flex flex-column justify-content-between h-100">
                            <div class="text-sm fw-bold text-secondary text-uppercase d-flex align-items-center h-100 mb-1">
                                Total Perpindahan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 40px;">{{ $moves->count() }}</div>
                        </div>
                        {{-- <i data-feather="edit" class="text-secondary"></i>  --}}
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
                    <canvas id="myChart1" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6 px-2 px-xl-3 mb-2 mb-lg-3 mb-xl-4">
            <div class="card border-top-0 border-start-0 border-end-0 border-5 border-info">
                <div class="card-header">
                    <h5 class="fw-bold border-bottom border-2">
                        <i data-feather="pie-chart"></i> 
                        Perbandingan Laki-laki & Perempuan
                    </h5>
                </div>
                <div class="card-body p-1 p-xl-3">
                    <canvas id="myChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4>Line Area Chart</h4>
                </div>
                <div class="card-body">
                    <div id="area"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Radial Gradient Chart</h4>
                </div>
                <div class="card-bo5dy">
                    <div id="radialGradient"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Line Chart</h4>
                </div>
                <div class="card-body">
                    <div id="line"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Bar Chart</h4>
                </div>
                <div class="card-body">
                    <div id="bar"></div>
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
</script>
@endpush