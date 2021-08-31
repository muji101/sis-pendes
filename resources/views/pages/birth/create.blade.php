@extends('layouts.dashboard')

@section('title', 'Tambah Data Kelahiran')

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
                                <label for="first-name-vertical">Nama</label>
                                <input type="number" id="first-name-vertical" class="form-control" name="fname"
                                    placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <label for="first-name-vertical">Tanggal</label>
                                <input type="date" id="first-name-vertical" class="form-control" name="fname"
                                    placeholder="Tanggal Lahir">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <label for="first-name-vertical">Tempat</label>
                                <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                    placeholder="Tempat Lahir">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <label for="first-name-vertical">Jenis Kelamin</label>
                                <select class="form-select" id="disabledSelect">
                                    <option selected disabled>-- Jenis Kelamin --</option>
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <label for="first-name-vertical">Keluarga</label>
                                <select class="choices form-select">
                                    <option selected disabled>--Keluarga --</option>
                                    <option value="rectangle">Seno</option>
                                    <option value="rombo">Lunga</option>
                                    <option value="romboid">Romboid</option>
                                    <option value="trapeze">Trapeze</option>
                                    <option value="traible">Triangle</option>
                                    <option value="polygon">Polygon</option>
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