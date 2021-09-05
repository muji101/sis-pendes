@extends('layouts.dashboard')

@section('title', 'List Data Pendatang')

@section('content')
    <div class="main-content container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            {{-- <h3>Datatable</h3> --}}
                            {{-- <p class="text-subtitle text-muted">We use 'simple-datatables' made by @fiduswriter. You can
                                check the full documentation <a
                                    href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p> --}}
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List pendatang</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('delete'))
                    <div class="alert alert-danger">
                        {{ session('delete') }}
                    </div>
                @endif
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3>List Pendatang</h3>
                                <div class="text-light ">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn round btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i data-feather="upload" width="20"></i>
                                        <span>Impor</span>
                                    </button>
                                    <a href="{{ route('exportCome', 'xlsx') }}" class="btn round btn-primary">
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
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Tanggal Datang</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comes as $come)
                                    <tr>
                                        <td>{{ $come->id }}</td>
                                        <td>{{ $come->nik }}</td>
                                        <td>{{ $come->name }}</td>
                                        <td>{{ $come->arrival_date }}</td>
                                        <td>{{ $come->gender }}</td>
                                        <td>
                                            <a href="#mymodal"
                                                data-remote="{{ route('comes.show', $come->id) }}"
                                                data-toggle="modal"
                                                data-target="#mymodal"
                                                data-title="Detail Penduduk {{ $come->name }}" 
                                                class="btn round btn-success btn-sm">
                                                <i data-feather="eye" width="20"></i>
                                            </a>
                                            <a href="{{ route('comes.edit', $come->id) }}" class="btn round btn-primary btn-sm">
                                                <i data-feather="edit" width="20"></i>
                                            </a>
                                            <form action="{{ route('comes.destroy', $come->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn round btn-danger btn-sm ">
                                                    <i data-feather="trash" width="20"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <!-- Modal Import-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data Kelahiran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form  method="POST"  action="{{ route('importCome') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                    <p>With Icon And Button Color</p>
                                    <div class="form-file">
                                        <input type="file" name="file" class="form-file-input" id="customFile">
                                        <label class="form-file-label" for="customFile">
                                            <span class="form-file-text">Choose file...</span>
                                            <span class="form-file-button btn-primary "><i
                                                    data-feather="upload"></i></span>
                                        </label>
                                    </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Create</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>

            </div>
@endsection