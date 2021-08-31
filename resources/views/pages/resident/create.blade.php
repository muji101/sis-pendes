@extends('layouts.dashboard')

@section('title', 'Tambah Data Penduduk')

@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Layout</h3>
                <p class="text-subtitle text-muted">There's a lot of form layout that you can use</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Layout</li>
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
            <h4 class="card-title">Vertical Form</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="{{ route('residents.store') }}" method="POST">
                    @csrf
                    @method('POST')
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">NIK</label>
                            <input type="number" id="first-name-vertical" class="form-control" name="nik"
                                placeholder="NIK">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Nama</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="name"
                                placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="email-id-vertical">Tempat Lahir</label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="birthplace"
                                        placeholder="Tempat Lahir">
                                </div>
                                <div class=" col-6 form-group">
                                    <label for="contact-info-vertical">Tanggal Lahir</label>
                                    <input type="date" id="contact-info-vertical" class="form-control" name="birthdate"
                                        placeholder="Tanggal Lahir">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="contact-info-vertical">Jenis Kelamin</label>
                            <select class="form-select" id="disabledSelect" name="gender">
                                <option selected disabled>-- Jenis Kelamin --</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="password-vertical">Agama</label>
                            <select class="form-select" id="disabledSelect" name="religion">
                                <option selected disabled>-- Agama --</option>
                                <option>Islam</option>
                                <option>Hindu</option>
                                <option>Budha</option>
                                <option>Kristen</option>
                                <option>Konghucu</option>
                                <option>Atheis</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Pendidikan Terakhir</label>
                            <select class="form-select" id="disabledSelect" name="last_education">
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
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Alamat</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="address"
                                placeholder="Alamat">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Pekerjaan</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="work"
                                placeholder="Pekerjaan">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Golongan Darah</label>
                            <select class="form-select" id="disabledSelect" name="blood_type">
                                <option selected disabled>-- Golongan Darah --</option>
                                <option>A-</option>
                                <option>A+</option>
                                <option>B-</option>
                                <option>B+</option>
                                <option>O-</option>
                                <option>O+</option>
                                <option>AB-</option>
                                <option>AB+</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Status</label>
                            <select class="form-select" id="disabledSelect" name="martial_status">
                                <option selected disabled>-- Status --</option>
                                <option>Kawin</option>
                                <option>Belum Kawin</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Kewarganegaraan</label>
                            <select class="form-select" id="disabledSelect" name="citizenship">
                                <option selected disabled>-- Kewarganegaraan --</option>
                                <option>WNI</option>
                                <option>WNA</option>
                            </select>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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