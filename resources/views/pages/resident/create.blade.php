@php
    //isset buat ngecek data kalau ada true kalau tidak false
    $isEdit = isset($residents);
    
    $title = $isEdit ? 'Edit Data Penduduk' : 'Tambah Data Penduduk';

    $route = $isEdit ? route('residents.update', $residents->id) : route('residents.store');

    $button = $isEdit ? 'Update' : 'Create';
@endphp

@extends('layouts.dashboard')

@section('title', $title)

@section('content')
{{-- menampilkan pesan error di create --}}
{{-- @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif --}}
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $title }}</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
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
                                                <input type="number" id="first-name-vertical" class="form-control" name="nik" value="{{ $isEdit ? $residents->nik : old('nik') }}"
                                                    placeholder="NIK">
                                                    @if ($errors->has('nik'))
                                                        <span class="text-danger">{{ $errors->first('nik') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Nama</label>
                                                <input type="text" id="first-name-vertical" class="form-control" name="name" value="{{ $isEdit ? $residents->name : old('name') }}"
                                                    placeholder="Nama Lengkap">
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6 form-group">
                                                    <label for="email-id-vertical">Tempat Lahir</label>
                                                    <input type="text" id="email-id-vertical" class="form-control" name="birthplace" value="{{ $isEdit ? $residents->birthplace : old('birthplace') }}"
                                                        placeholder="Tempat Lahir">
                                                    @if ($errors->has('birthplace'))
                                                        <span class="text-danger">{{ $errors->first('birthplace') }}</span>
                                                    @endif
                                                </div>
                                                <div class=" col-6 form-group">
                                                    <label for="contact-info-vertical">Tanggal Lahir</label>
                                                    <input type="date" id="contact-info-vertical" class="form-control" name="birthdate" value="{{ $isEdit ? $residents->birthdate : old('birthdate') }}"
                                                        placeholder="Tanggal Lahir">
                                                    @if ($errors->has('birthdate'))
                                                        <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Jenis Kelamin</label>
                                                <select class="form-select" id="disabledSelect" name="gender">
                                                    @if ($isEdit)
                                                        <option value="Laki-laki"{{ $residents->gender ===  'Laki-laki'  ? 'selected': '' }}>Laki-laki</option>
                                                        <option value="Perempuan"{{ $residents->gender ===  'Perempuan'  ? 'selected': '' }}>Perempuan</option>
                                                    @else
                                                        <option selected disabled>-- Jenis Kelamin --</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    @endif
                                                </select>
                                                @if ($errors->has('gender'))
                                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="password-vertical">Agama</label>
                                                <select class="form-select" id="disabledSelect" name="religion">
                                                    @if ($isEdit)
                                                        <option value="Islam"{{ $residents->religion ===  'Islam'  ? 'selected': '' }}>Islam</option>
                                                        <option value="Hindu"{{ $residents->religion ===  'Hindu'  ? 'selected': '' }}>Hindu</option>
                                                        <option value="Katolik"{{ $residents->religion ===  'Katolik'  ? 'selected': '' }}>Katolik</option>
                                                        <option value="Budha"{{ $residents->religion ===  'Budha'  ? 'selected': '' }}>Budha</option>
                                                        <option value="Kristen"{{ $residents->religion ===  'Kristen'  ? 'selected': '' }}>Kristen</option>
                                                        <option value="Konghucu"{{ $residents->religion ===  'Konghucu'  ? 'selected': '' }}>Konghucu</option>
                                                    @else
                                                        <option selected disabled>-- Agama --</option>
                                                        <option>Islam</option>
                                                        <option>Hindu</option>
                                                        <option>Budha</option>
                                                        <option>Kristen</option>
                                                        <option>Konghucu</option>
                                                    @endif
                                                </select>
                                                @if ($errors->has('religion'))
                                                    <span class="text-danger">{{ $errors->first('religion') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Pendidikan Terakhir</label>
                                                <select class="form-select" id="disabledSelect" name="last_education">
                                                    @if ($isEdit)
                                                        <option value="SD"{{ $residents->last_education ===  'SD'  ? 'selected': '' }}>SD</option>
                                                        <option value="SMP"{{ $residents->last_education ===  'SMP'  ? 'selected': '' }}>SMP</option>
                                                        <option value="SMA"{{ $residents->last_education ===  'SMA'  ? 'selected': '' }}>SMA</option>
                                                        <option value="D1"{{ $residents->last_education ===  'D1'  ? 'selected': '' }}>D1</option>
                                                        <option value="D2"{{ $residents->last_education ===  'D2'  ? 'selected': '' }}>D2</option>
                                                        <option value="D3"{{ $residents->last_education ===  'D3'  ? 'selected': '' }}>D3</option>
                                                        <option value="D4"{{ $residents->last_education ===  'D4'  ? 'selected': '' }}>D4</option>
                                                        <option value="S1"{{ $residents->last_education ===  'S1'  ? 'selected': '' }}>S1</option>
                                                        <option value="S2"{{ $residents->last_education ===  'S2'  ? 'selected': '' }}>S2</option>
                                                        <option value="S3"{{ $residents->last_education ===  'S3'  ? 'selected': '' }}>S3</option>
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
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Pekerjaan</label>
                                                <input type="text" id="first-name-vertical" class="form-control" name="work" value="{{ $isEdit ? $residents->work : old('work') }}"
                                                    placeholder="Pekerjaan">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Golongan Darah</label>
                                                <select class="form-select" id="disabledSelect" name="blood_type">
                                                    @if ($isEdit)
                                                        <option value="A-"{{ $residents->blood_type ===  'A-'  ? 'selected': '' }}>A-</option>
                                                        <option value="A+"{{ $residents->blood_type ===  'A+'  ? 'selected': '' }}>A+</option>
                                                        <option value="B"{{ $residents->blood_type ===  'B'  ? 'selected': '' }}>B</option>
                                                        <option value="B+"{{ $residents->blood_type ===  'B+'  ? 'selected': '' }}>B+</option>
                                                        <option value="O-"{{ $residents->blood_type ===  'O-'  ? 'selected': '' }}>O-</option>
                                                        <option value="O+"{{ $residents->blood_type ===  'O+'  ? 'selected': '' }}>O+</option>
                                                        <option value="AB-"{{ $residents->blood_type ===  'AB-'  ? 'selected': '' }}>AB-</option>
                                                        <option value="AB+"{{ $residents->blood_type ===  'AB+'  ? 'selected': '' }}>AB+</option>
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
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Status</label>
                                                <select class="form-select" id="disabledSelect" name="martial_status">
                                                    @if ($isEdit)
                                                        <option value="Kawin"{{ $residents->martial_status ===  'Kawin'  ? 'selected': '' }}>Kawin</option>
                                                        <option value="Belum Kawin"{{ $residents->martial_status ===  'Belum Kawin'  ? 'selected': '' }}>Belum Kawin</option>
                                                    @else
                                                        <option selected disabled>-- Status --</option>
                                                        <option>Kawin</option>
                                                        <option>Belum Kawin</option>
                                                    @endif
                                                </select>
                                                @if ($errors->has('martial_status'))
                                                    <span class="text-danger">{{ $errors->first('martial_status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Kewarganegaraan</label>
                                                <select class="form-select" id="disabledSelect" name="citizenship">
                                                    @if ($isEdit)
                                                        <option value="WNI"{{ $residents->martial_status ===  'WNI'  ? 'selected': '' }}>WNI</option>
                                                        <option value="WNA"{{ $residents->martial_status ===  'WNA'  ? 'selected': '' }}>WNA</option>
                                                    @else
                                                        <option selected disabled>-- Kewarganegaraan --</option>
                                                        <option>WNI</option>
                                                        <option>WNA</option>
                                                    @endif
                                                </select>
                                                @if ($errors->has('citizenship'))
                                                    <span class="text-danger">{{ $errors->first('citizenship') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        @if ($isEdit)
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Ayah</label>
                                                <select class="choices form-select" name="father">
                                                    <option selected disabled>-- Ayah --</option>
                                                    @if ($isEdit)
                                                        @foreach ($parentFather as $resident)
                                                        <option value="{{ $resident->name }}"{{ $resident->name === $residents->father ? 'selected': '' }}>{{ $resident->nik }} -- {{ $resident->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if ($errors->has('father'))
                                                    <span class="text-danger">{{ $errors->first('father') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Ibu</label>
                                                <select class="choices form-select" name="mother">
                                                    <option selected disabled>-- Ibu --</option>
                                                    @if ($isEdit)
                                                        @foreach ($parentMother as $resident)
                                                        <option value="{{ $resident->name }}"{{ $resident->name === $residents->mother ? 'selected': '' }}>{{ $resident->nik }} -- {{ $resident->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if ($errors->has('mother'))
                                                    <span class="text-danger">{{ $errors->first('mother') }}</span>
                                                @endif
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