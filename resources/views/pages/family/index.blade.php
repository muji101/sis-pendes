@extends('layouts.dashboard')

@section('title', 'List Data Keluarga')

@section('content')
    <div class="main-content container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Datatable</h3>
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
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p>Simple Datatable</p>
                                <div class="text-light ">
                                    <a href="#" class="btn btn-success">
                                        <i data-feather="upload" width="20"></i>
                                        <span>Impor</span>
                                    </a>
                                    <a href="#" class="btn btn-primary">
                                        <i data-feather="download" width="20"></i>
                                        <span>Export</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class='table' id="table1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NO.KK</th>
                                        <th>Kepala Keluarga</th>
                                        <th>Jumlah Keluarga</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($families as $family)
                                    <tr>
                                        <td>{{ $family->id }}</td>
                                        <td>{{ $family->no_family }}</td>
                                        <td>{{ $family->resident->name }}</td>
                                        <td>{{ $family->familyMember->count() }}</td>
                                        <td>{{ $family->rt }}</td>
                                        <td>{{ $family->rw }}</td>
                                        <td>
                                            <div class="dropend">
                                                <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Info
                                                </button>
                                                <div class="dropdown-menu bg-transparent border-0" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item text-white rounded bg-success" href="{{ route('families.show', $family->id) }}"><i data-feather="eye" width="20"></i> Detail</a>
                                                    {{-- <a href="#mymodal"
                                                        data-remote="{{ route('families.show', $family->id) }}"
                                                        data-toggle="modal"
                                                        data-target="#mymodal"
                                                        data-title="Detail Keluarga {{ $family->no_family }}" 
                                                        class="btn btn-info btn-sm">
                                                        <i data-feather="eye" width="20"></i>
                                                    </a> --}}
                                                    <a class="dropdown-item text-white rounded bg-primary" href="{{ route('families.edit', $family->id) }}"><i data-feather="edit" width="20"></i> Edit</a>
                                                    <form action="{{ route('families.destroy', $family->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="dropdown-item text-white rounded bg-danger"><i data-feather="trash" width="20"></i> Delete</button>
                                                    </form>
                                                </div>
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