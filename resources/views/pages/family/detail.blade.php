@extends('layouts.dashboard')

@section('title', 'Detail Keluarga')

@section('content')
    <div class="main-content container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>{{ $families->no_family }} -- Muji Kuwat</h3>
                            {{-- <p class="text-subtitle text-muted">We use 'simple-datatables' made by @fiduswriter. You can
                                check the full documentation <a
                                    href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p> --}}
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Datatable</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <form action="{{ route('familyMember.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="family_id" value="{{ $families->id }}">
                    <select class="choices form-select" name="resident_id">
                        <option selected disabled>-- Anggota Keluarga --</option>
                        @foreach ($residents as $resident)
                        <option value="{{ $resident->id }}">{{ $resident->nik }} -- {{ $resident->name }}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <select class="choices form-select" name="family_relationship">
                            <option selected disabled>-- Hubungan Keluarga --</option>
                            <option value="Kepala Keluarga"></option>
                            <option value="Istri"></option>
                            <option value="Anak Kandung"></option>
                            <option value="Anak Tiri"></option>
                            <option value="Ibu"></option>
                            <option value="Ayah"></option>
                        </select>
                    </div>
                    <button class="btn btn-success">
                        <i data-feather="plus" width="20"></i>
                        <span>Tambah Anggota</span>
                    </button>
                </form>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p>Simple Datatable</p>
                                <div class="text-light ">
                                    {{-- <a href="#" class="btn btn-success">
                                        <i data-feather="plus" width="20"></i>
                                        <span>Tambah Anggota</span>
                                    </a> --}}
                                    {{-- <a href="#" class="btn btn-primary">
                                        <i data-feather="download" width="20"></i>
                                        <span>Export</span>
                                    </a> --}}

                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class='table' id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Hubungan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                        <td>{{ $families->resident->id }}</td>
                                        <td>{{ $families->resident->nik }}</td>
                                        <td>{{ $families->resident->name }}</td>
                                        <td>{{ $families->resident->gender }}</td>
                                        <td>Kepala  Keluarga</td>
                                        <td>
                                            <div class="dropend">
                                                <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Info
                                                </button>
                                                <div class="dropdown-menu bg-transparent border-0" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item text-white rounded bg-success" href="#"><i data-feather="eye" width="20"></i> Detail</a>
                                                    <a class="dropdown-item text-white rounded bg-primary" href="{{ route('families.edit', $family->id) }}"><i data-feather="edit" width="20"></i> Edit</a>
                                                    <form action="{{ route('families.destroy', $families->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="dropdown-item text-white rounded bg-danger"><i data-feather="trash" width="20"></i> Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr> --}}
                                    @foreach ($members as $family)
                                    <tr>
                                        <td>{{ $family->resident->id }}</td>
                                        <td>{{ $family->resident->nik }}</td>
                                        <td>{{ $family->resident->name }}</td>
                                        <td>{{ $family->resident->gender }}</td>
                                        <td>{{ $family->family_relationship }}</td>
                                        <td>
                                            <div class="dropend">
                                                <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Info
                                                </button>
                                                {{-- <div class="dropdown-menu bg-transparent border-0" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item text-white rounded bg-success" href="#"><i data-feather="eye" width="20"></i> Detail</a>
                                                    <a class="dropdown-item text-white rounded bg-primary" href="{{ route('families.edit', $family->id) }}"><i data-feather="edit" width="20"></i> Edit</a>
                                                    <form action="{{ route('families.destroy', $family->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="dropdown-item text-white rounded bg-danger"><i data-feather="trash" width="20"></i> Delete</button>
                                                    </form>
                                                </div> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>
@endsection