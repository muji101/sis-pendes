@extends('layouts.dashboard')

@section('title', 'Tambah Data Pendatang')

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
                <form class="form form-vertical">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">NIK</label>
                            <input type="number" id="first-name-vertical" class="form-control" name="fname"
                                placeholder="NIK">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Nama</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="email-id-vertical">Tempat Lahir</label>
                                    <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Tempat Lahir">
                                </div>
                                <div class=" col-6 form-group">
                                    <label for="contact-info-vertical">Tanggal Lahir</label>
                                    <input type="date" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Tanggal Lahir">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="contact-info-vertical">Jenis Kelamin</label>
                            <select class="form-select" id="disabledSelect">
                                <option selected disabled>-- Jenis Kelamin --</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="password-vertical">Agama</label>
                            <select class="form-select" id="disabledSelect">
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
                            <select class="form-select" id="disabledSelect">
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
                            <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                placeholder="Alamat">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Pekerjaan</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                placeholder="Pekerjaan">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Golongan Darah</label>
                            <select class="form-select" id="disabledSelect">
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
                            <select class="form-select" id="disabledSelect">
                                <option selected disabled>-- Status --</option>
                                <option>Kawin</option>
                                <option>Belum Kawin</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Kewarganegaraan</label>
                            <select class="form-select" id="disabledSelect">
                                <option selected disabled>-- Kewarganegaraan --</option>
                                <option>WNI</option>
                                <option>WNA</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="form-roup">
                                <label for="first-name-vertical">Tanggal Kedatangan</label>
                                <input type="date" id="first-name-vertical" class="form-control" name="fname"
                                placeholder="Tanggal Kedatangan">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Nama Pelapor</label>
                                <select class="choices form-select">
                                    <option selected disabled>-- NIK-Nama --</option>
                                    <option value="rectangle">2323243-Seno</option>
                                    <option value="rombo">1243324-Lunga</option>
                                    <option value="romboid">55634-Romboid</option>
                                    <option value="trapeze">365456-Trapeze</option>
                                    <option value="traible">23455-Triangle</option>
                                    <option value="polygon">5634564-Polygon</option>
                                </select>
                            </div>
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