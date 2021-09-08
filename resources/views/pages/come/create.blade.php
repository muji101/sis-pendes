@php
    //isset buat ngecek data kalau ada true kalau tidak false
    $isEdit = isset($comes);
    
    $title = $isEdit ? 'Edit Data Pendatang' : 'Tambah Data Pendatang';

    $route = $isEdit ? route('comes.update', $comes->id) : route('comes.store');

    $button = $isEdit ? 'Update' : 'Create';
@endphp

@extends('layouts.dashboard')

@section('title', $title)

@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $title }}</h3>
                {{-- <p class="text-subtitle text-muted">There's a lot of form layout that you can use</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
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
                <form class="form form-vertical" action="{{ $route }}" method="POST">
                    @csrf
                    @if ($isEdit)
                        @method('PUT')
                    @else
                        @method('POST')
                    @endif
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">NIK</label>
                            <input type="number" id="first-name-vertical" class="form-control" name="nik" value="{{ $isEdit ? $comes->nik : '' }}"
                                placeholder="NIK">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Nama</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="name" value="{{ $isEdit ? $comes->name : '' }}"
                                placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="email-id-vertical">Tempat Lahir</label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="birthplace" value="{{ $isEdit ? $comes->birthplace : '' }}"
                                        placeholder="Tempat Lahir">
                                </div>
                                <div class=" col-6 form-group">
                                    <label for="contact-info-vertical">Tanggal Lahir</label>
                                    <input type="date" id="contact-info-vertical" class="form-control" name="birthdate" value="{{ $isEdit ? $comes->birthdate : '' }}"
                                        placeholder="Tanggal Lahir">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="contact-info-vertical">Jenis Kelamin</label>
                            {{-- @php
                                $gender =  $isEdit ? $comes->gender : '' ;
                            @endphp --}}
                            <select class="form-select" id="disabledSelect" name="gender">
                                @if ($isEdit)
                                    <option value="Laki-laki"{{ $comes->gender ===  'Laki-laki'  ? 'selected': '' }}>Laki-laki</option>
                                    <option value="Perempuan"{{ $comes->gender ===  'Perempuan'  ? 'selected': '' }}>Perempuan</option>
                                @else
                                    <option selected disabled>-- Jenis Kelamin --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                @endif
                            </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="password-vertical">Agama</label>
                            <select class="form-select" id="disabledSelect" name="religion">
                                @if ($isEdit)
                                    <option value="Islam"{{ $comes->religion ===  'Islam'  ? 'selected': '' }}>Islam</option>
                                    <option value="Hindu"{{ $comes->religion ===  'Hindu'  ? 'selected': '' }}>Hindu</option>
                                    <option value="Budha"{{ $comes->religion ===  'Budha'  ? 'selected': '' }}>Budha</option>
                                    <option value="Kristen"{{ $comes->religion ===  'Kristen'  ? 'selected': '' }}>Kristen</option>
                                    <option value="Konghucu"{{ $comes->religion ===  'Konghucu'  ? 'selected': '' }}>Konghucu</option>
                                @else
                                    <option selected disabled>-- Agama --</option>
                                    <option>Islam</option>
                                    <option>Hindu</option>
                                    <option>Budha</option>
                                    <option>Kristen</option>
                                    <option>Konghucu</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Pendidikan Terakhir</label>
                            <select class="form-select" id="disabledSelect" name="last_education">
                                @if ($isEdit)
                                    <option value="SD"{{ $comes->last_education ===  'SD'  ? 'selected': '' }}>SD</option>
                                    <option value="SMP"{{ $comes->last_education ===  'SMP'  ? 'selected': '' }}>SMP</option>
                                    <option value="SMA"{{ $comes->last_education ===  'SMA'  ? 'selected': '' }}>SMA</option>
                                    <option value="D1"{{ $comes->last_education ===  'D1'  ? 'selected': '' }}>D1</option>
                                    <option value="D2"{{ $comes->last_education ===  'D2'  ? 'selected': '' }}>D2</option>
                                    <option value="D3"{{ $comes->last_education ===  'D3'  ? 'selected': '' }}>D3</option>
                                    <option value="D4"{{ $comes->last_education ===  'D4'  ? 'selected': '' }}>D4</option>
                                    <option value="S1"{{ $comes->last_education ===  'S1'  ? 'selected': '' }}>S1</option>
                                    <option value="S2"{{ $comes->last_education ===  'S2'  ? 'selected': '' }}>S2</option>
                                    <option value="S3"{{ $comes->last_education ===  'S3'  ? 'selected': '' }}>S3</option>
                                @else
                                    <option selected disabled>-- Pendidikan --</option>
                                    <option>SD</option>
                                    <option>SMP</option>
                                    <option>SMA</option>
                                    <option>D1</option>
                                    <option>D2</option>
                                    <option>D3</option>
                                    <option>D4</option>
                                    <option>S1</option>
                                    <option>S2</option>
                                    <option>S3</option>
                                @endif
                            </select>
                        </div>
                        {{-- <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Alamat</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="address" value="{{ $isEdit ? $comes->address : '' }}"
                                placeholder="Alamat">
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Pekerjaan</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="work" value="{{ $isEdit ? $comes->work : '' }}"
                                placeholder="Pekerjaan">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Golongan Darah</label>
                            <select class="form-select" id="disabledSelect" name="blood_type">
                                @if ($isEdit)
                                    <option value="A-"{{ $comes->blood_type ===  'A-'  ? 'selected': '' }}>A-</option>
                                    <option value="A+"{{ $comes->blood_type ===  'A+'  ? 'selected': '' }}>A+</option>
                                    <option value="B"{{ $comes->blood_type ===  'B'  ? 'selected': '' }}>B</option>
                                    <option value="B+"{{ $comes->blood_type ===  'B+'  ? 'selected': '' }}>B+</option>
                                    <option value="O-"{{ $comes->blood_type ===  'O-'  ? 'selected': '' }}>O-</option>
                                    <option value="O+"{{ $comes->blood_type ===  'O+'  ? 'selected': '' }}>O+</option>
                                    <option value="AB-"{{ $comes->blood_type ===  'AB-'  ? 'selected': '' }}>AB-</option>
                                    <option value="AB+"{{ $comes->blood_type ===  'AB+'  ? 'selected': '' }}>AB+</option>
                                @else
                                    <option selected disabled>-- Golongan Darah --</option>
                                    <option>A-</option>
                                    <option>A+</option>
                                    <option>B-</option>
                                    <option>B+</option>
                                    <option>O-</option>
                                    <option>O+</option>
                                    <option>AB-</option>
                                    <option>AB+</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Status</label>
                            <select class="form-select" id="disabledSelect" name="martial_status">
                                @if ($isEdit)
                                    <option value="Kawin"{{ $comes->martial_status ===  'Kawin'  ? 'selected': '' }}>Kawin</option>
                                    <option value="Belum Kawin"{{ $comes->martial_status ===  'Belum Kawin'  ? 'selected': '' }}>Belum Kawin</option>
                                @else
                                    <option selected disabled>-- Status --</option>
                                    <option>Kawin</option>
                                    <option>Belum Kawin</option>
                                @endif
                            </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Kewarganegaraan</label>
                            <select class="form-select" id="disabledSelect" name="citizenship">
                                @if ($isEdit)
                                    <option value="WNI"{{ $comes->martial_status ===  'WNI'  ? 'selected': '' }}>WNI</option>
                                    <option value="WNA"{{ $comes->martial_status ===  'WNA'  ? 'selected': '' }}>WNA</option>
                                @else
                                    <option selected disabled>-- Kewarganegaraan --</option>
                                    <option>WNI</option>
                                    <option>WNA</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Tanggal Kedatangan</label>
                                <input type="date" id="first-name-vertical" class="form-control" name="arrival_date" value="{{ $isEdit ? $comes->arrival_date : '' }}"
                                placeholder="Tanggal Kedatangan">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Alamat</label>
                            <input type="address" id="first-name-vertical" class="form-control" name="address" value="{{ $isEdit ? $comes->address : '' }}"
                                placeholder="Alamat">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Nama Pelapor</label>
                                <select class="choices form-select" name="resident_id"> value="{{ $isEdit ? $comes->resident_id : '' }}"
                                    <option selected disabled>-- NIK -- Nama --</option>
                                    @if ($isEdit)
                                        <option value="{{ $comes->resident->id }}"{{ $comes->resident->name === $comes->resident->name ? 'selected': '' }}>{{ $comes->resident->nik }} -- {{ $comes->resident->name }}</option>
                                    @else
                                        @foreach ($residents as $resident)
                                        <option value="{{ $resident->id }}">{{ $resident->nik }} -- {{ $resident->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">{{ $button }}</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    <!-- // Basic Vertical form layout section end -->


</div>
@endsection