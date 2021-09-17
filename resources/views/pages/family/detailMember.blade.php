@extends('layouts.dashboard')

@section('title', 'Detail Anggota Keluarga')

@section('content')
    <div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>
                    @if ($residents->status === 'ada')
                        Detail Anggota Keluarga
                    @elseif($residents->status === 'pindah')
                        Detail Penduduk Pindah
                    @else
                        Detail Penduduk Meninggal
                    @endif
                </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        @if ($residents->status === 'ada')
                            <li class="breadcrumb-item active" aria-current="page">Detail Anggota Keluarga</li>
                        @elseif($residents->status === 'pindah')
                            <li class="breadcrumb-item active" aria-current="page">Detail Penduduk Pindah</li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">Detail Penduduk Meninggal</li>
                        @endif
                    </ol>
                </nav>
            </div>
        </div>

    </div>

    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12 mx-auto">
        <div class="card">
            <div class="card-header">
            {{-- <h4 class="card-title">Vertical Form</h4> --}}
            </div>
            <div class="card-content">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>NIK</th>
                        <td>{{ $residents->nik }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $residents->name }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>{{ $residents->birthplace }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $residents->birthdate }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $residents->gender}}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{ $residents->religion }}</td>
                    </tr>
                    <tr>
                        <th>Pendidikan</th>
                        <td>{{ $residents->last_education }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>{{ $residents->work }}</td>
                    </tr>
                    <tr>
                        <th>Golongan Darah</th>
                        <td>{{ $residents->blood_type }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $residents->martial_status }}</td>
                    </tr>
                    <tr>
                        <th>Kewarganegaraan</th>
                        <td>{{ $residents->citizenship }}</td>
                    </tr>
                    <tr>
                        <th>Umur</th>
                        <td>{{ $residents->age }} Tahun</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        @forelse ($residents->familyMember as $item)
                            <td>{{ $item->family->address }}</td> 
                        @empty
                            <td>-</td>
                        @endforelse
                    </tr>
                    <tr>
                        <th>Nomer KK</th>
                        @forelse ($residents->familyMember as $item)
                            <td>{{ $item->family->no_family }}</td> 
                        @empty
                            <td>-</td>
                        @endforelse
                    </tr>
                    <tr>
                        <th>Keluarga</th>
                        <td>
                            <table class="table table-bordered w-100">
                                <tr>
                                    <th>Ayah</th>
                                    <th>Ibu</th>
                                </tr>
                                <tr>
                                    @if (isset($residents->father))
                                    <td>{{ $residents->father }}</td>
                                    <td>{{ $residents->mother }}</td>
                                    @else   
                                    <td>-</td>
                                    <td>-</td>
                                    @endif
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    <!-- // Basic Vertical form layout section end -->

</div>
@endsection