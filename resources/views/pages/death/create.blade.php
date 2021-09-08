@php
    //isset buat ngecek data kalau ada true kalau tidak false
    $isEdit = isset($deaths);

    $title = $isEdit ? 'Edit Data Kematian' : 'Tambah Data Kematian';
    
    $route = $isEdit ? route('deaths.update', $deaths->id) : route('deaths.store');

    $button = $isEdit ? 'Update' : 'Create';
@endphp
@extends('layouts.dashboard')

@section('title',  $title )

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
                                <label for="first-name-vertical">Nama</label>
                                <select class="choices form-select" name="resident_id"> value="{{ $isEdit ? $deaths->resident_id : '' }}"
                                    <option selected disabled>-- NIK -- Nama --</option>
                                    @if ($isEdit)
                                        <option value="{{ $deaths->resident->id }}"{{ $deaths->resident->name === $deaths->resident->name ? 'selected': '' }}>{{ $deaths->resident->nik }} -- {{ $deaths->resident->name }}</option>
                                    @else
                                        @foreach ($residents as $resident)
                                        <option value="{{ $resident->id }}">{{ $resident->nik }} -- {{ $resident->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label for="email-id-vertical">Tanggal</label>
                                    <input type="date" id="email-id-vertical" class="form-control" name="date" value="{{ $isEdit ? $deaths->date : '' }}"
                                        placeholder="Tanggal">
                                </div>
                                <div class=" col-6 form-group">
                                    <label for="contact-info-vertical">Jam</label>
                                    <input type="time" id="contact-info-vertical" class="form-control" name="time" value="{{ $isEdit ? $deaths->time : '' }}"
                                        placeholder="Jam">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="password-vertical">Umur</label>
                            <input type="number" id="contact-info-vertical" class="form-control" name="age" value="{{ $isEdit ? $deaths->age : '' }}"
                            placeholder="Umur">
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label for="first-name-vertical">Penyebab</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="reason" value="{{ $isEdit ? $deaths->reason : '' }}"
                                placeholder="Penyebab Kematian">
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