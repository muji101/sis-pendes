@extends('layouts.dashboard')

@section('title', 'Tambah Data Kematian')

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
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="email-id-vertical">Tanggal</label>
                                    <input type="date" id="email-id-vertical" class="form-control" name="email-id"
                                        placeholder="Tanggal">
                                </div>
                                <div class=" col-6 form-group">
                                    <label for="contact-info-vertical">Jam</label>
                                    <input type="time" id="contact-info-vertical" class="form-control" name="contact"
                                        placeholder="Jam">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="password-vertical">Umur</label>
                            <input type="number" id="contact-info-vertical" class="form-control" name="contact"
                            placeholder="Umur">
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Penyebab</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="fname"
                                placeholder="Penyebab Kematian">
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