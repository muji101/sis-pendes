@php
    //isset buat ngecek data kalau ada true kalau tidak false
    $isEdit = isset($families);
    
    $title = $isEdit ? 'Edit Data Keluarga' : 'Tambah Data Keluarga';
    
    $route = $isEdit ? route('families.update', $families->id) : route('families.store');

    $button = $isEdit ? 'Update' : 'Create';
@endphp

@extends('layouts.dashboard')

@section('title', $title)

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
                                <label for="first-name-vertical">NO.KK</label>
                                <input type="number" id="first-name-vertical" class="form-control" name="no_family" value="{{ $isEdit ? $families->no_family : '' }}"
                                    placeholder="NO.KK">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <label for="first-name-vertical">Kepala Keluarga</label>
                                <select class="choices form-select" name="resident_id"> value="{{ $isEdit ? $families->resident_id : '' }}"
                                    <option selected disabled>-- Kepala Keluarga --</option>
                                    @if ($isEdit)
                                        {{-- masih ada error di sini --}}
                                        @foreach ($residents as $resident)
                                        {{-- <option value="{{ $families->resident->id }}"{{ $families->resident->name === $families->resident->name ? 'selected': '' }}>{{ $families->resident->nik }} -- {{ $families->resident->name }}</option> --}}
                                        <option value="{{ $resident->id }}"{{ $resident->name === $families->resident->name ? 'selected': '' }}>{{ $resident->nik }} -- {{ $resident->name }}</option>
                                        {{-- <option value="{{ $resident->id }}">{{ $resident->nik }} -- {{ $resident->name }}</option> --}}
                                        @endforeach
                                    @else
                                        @foreach ($residents as $resident)
                                        <option value="{{ $resident->id }}">{{ $resident->nik }} -- {{ $resident->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <label for="first-name-vertical">Dusun</label>
                                <input type="text" id="first-name-vertical" class="form-control" name="village" value="{{ $isEdit ? $families->village : '' }}"
                                    placeholder="Dusun">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <label for="first-name-vertical">RT</label>
                                <input type="number" id="first-name-vertical" class="form-control" name="rt" value="{{ $isEdit ? $families->rt : '' }}"
                                    placeholder="Rukun Tetangga">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <label for="first-name-vertical">RW</label>
                                <input type="number" id="first-name-vertical" class="form-control" name="rw" value="{{ $isEdit ? $families->rw : '' }}"
                                    placeholder="Rukun Warga">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <label for="first-name-vertical">Alamat</label>
                                <input type="address" id="first-name-vertical" class="form-control" name="address" value="{{ $isEdit ? $families->address : '' }}"
                                    placeholder="Alamat">
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