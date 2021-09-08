@php
    //isset buat ngecek data kalau ada true kalau tidak false
    $isEdit = isset($births);
    
    $title = $isEdit ? 'Edit Data Kelahiran' : 'Tambah Data Kelahiran';

    $route = $isEdit ? route('births.update', $births->id) : route('births.store');

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
                                    <label for="first-name-vertical">Nama</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="name" value="{{ $isEdit ? $births->name : '' }}"
                                        placeholder="Nama Lengkap">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="first-name-vertical">Tanggal</label>
                                    <input type="date" id="first-name-vertical" class="form-control" name="date" value="{{ $isEdit ? $births->date : '' }}"
                                        placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="first-name-vertical">Tempat</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="place" value="{{ $isEdit ? $births->place : '' }}"
                                        placeholder="Tempat Lahir">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="first-name-vertical">Jenis Kelamin</label>
                                    <select class="form-select" id="disabledSelect" name="gender" value="{{ $isEdit ? $births->gender : '' }}">
                                        @if ($isEdit)
                                        <option value="Laki-laki"{{ $births->gender ===  'Laki-laki'  ? 'selected': '' }}>Laki-laki</option>
                                        <option value="Perempuan"{{ $births->gender ===  'Perempuan'  ? 'selected': '' }}>Perempuan</option>
                                    @else
                                        <option selected disabled>-- Jenis Kelamin --</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    @endif
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="first-name-vertical">Keluarga</label>
                                    <select class="choices form-select" name="family_id" value="{{ $isEdit ? $births->family_id : '' }}">
                                        <option selected disabled>-- Keluarga --</option>
                                        @if ($isEdit)
                                            @foreach ($residents as $resident)
                                                <option value="{{ $births->family->id }}"{{ $resident->name === $births->family->name ? 'selected': '' }}>{{ $resident->nik }}  -- {{ $resident->name }}</option>
                                            @endforeach
                                        @else
                                            @foreach ($residents as $resident)
                                            <option value="{{ $resident->id }}">{{ $resident->nik }} -- {{ $resident->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
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

{{-- <form class="form form-vertical" action="{{ $route }}" method="POST">
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
            <input type="text" id="first-name-vertical" class="form-control" name="name" value="{{ $isEdit ? $births->name : '' }}"
                placeholder="Nama Lengkap">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
            <label for="first-name-vertical">Tanggal Lahir</label>
            <input type="date" id="first-name-vertical" class="form-control" name="date" value="{{ $isEdit ? $births->date : '' }}"
                placeholder="Tanggal Lahir">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
            <label for="first-name-vertical">Tempat LahirDetail</label>
            <input type="text" id="first-name-vertical" class="form-control" name="place" value="{{ $isEdit ? $births->place : '' }}"
                placeholder="Tempat Lahir">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
            <label for="first-name-vertical">Jenis Kelamin</label>
            <select class="form-select" id="disabledSelect" name="gender" value="{{ $isEdit ? $births->gender : '' }}">
                @if ($isEdit)
                <option value="Laki-laki"{{ $births->gender ===  'Laki-laki'  ? 'selected': '' }}>Laki-laki</option>
                <option value="Perempuan"{{ $births->gender ===  'Perempuan'  ? 'selected': '' }}>Perempuan</option>
            @else
                <option selected disabled>-- Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            @endif
            </select>
        </div>
        <div class="col-12">
            <div class="form-group">
            <label for="first-name-vertical">Keluarga</label>
            <select class="optgroup form-select" name="family_id" value="{{ $isEdit ? $births->family_id : '' }}">
                <option selected disabled>-- Keluarga --</option>
                @if ($isEdit)
                    @foreach ($residents as $resident)
                    <option value="{{ $births->family->id }}"{{ $resident->name === $births->family->name ? 'selected': '' }}>{{ $resident->nik }}  -- {{ $resident->name }}</option>
                    @endforeach
                @else
                    @foreach ($residents as $resident)
                    <option value="{{ $resident->id }}">{{ $resident->nik }} -- {{ $resident->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-1 mb-1">{{ $button }}</button>
            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
        </div>
    </div>
</div>
</form> --}}