@extends('layouts.dashboard')

@section('title', 'List Data Keluarga')

@section('content')
    <div class="main-content container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>List Keluarga</h3>
                            {{-- <p class="text-subtitle text-muted">We use 'simple-datatables' made by @fiduswriter. You can
                                check the full documentation <a
                                    href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p> --}}
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List Keluarga</li>
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
                                <!-- Button trigger modal -->
                                <button type="button" class="btn round btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i data-feather="plus"></i> Keluarga
                                </button>
                                <div class="text-light ">
                                    <a href="#" class="btn round btn-success">
                                        <i data-feather="upload" width="20"></i>
                                        <span>Impor</span>
                                    </a>
                                    <a href="#" class="btn round btn-primary">
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
                                        <td class="d-flex justify-content-between">
                                            <a href="#mymodal"
                                                data-remote="{{ route('families.show', $family->id) }}"
                                                data-toggle="modal"
                                                data-target="#mymodal"
                                                data-title="Detail Keluarga {{ $family->no_family }}" 
                                                class="btn round btn-success btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            {{-- <button type="button" class="btn round btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                                <i data-feather="user-plus"></i>
                                            </button> --}}
                                            <a href="{{ route('families.createMember', $family->id) }}" class="btn round btn-info btn-sm">
                                                {{-- <i data-feather="user-plus" width="20"></i> --}}
                                                <i class="fas fa-user-plus"></i>
                                            </a>
                                            <a href="{{ route('families.edit', $family->id) }}" class="btn round btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('families.destroy', $family->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn round btn-danger btn-sm ">
                                                    <i class="fas fa-trash"></i>
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
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Keluarga</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form form-vertical" action="{{ route('families.store') }}" method="POST">
                                @csrf
                                    @method('POST')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                        <label for="first-name-vertical">NO.KK</label>
                                        <input type="number" id="first-name-vertical" class="form-control" name="no_family"
                                            placeholder="NO.KK">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                        <label for="first-name-vertical">Kepala Keluarga</label>
                                        <select class="choices form-select" name="resident_id"> 
                                            <option selected disabled>-- Kepala Keluarga --</option>
                                                @foreach ($residents as $resident)
                                                <option value="{{ $resident->id }}">{{ $resident->nik }} -- {{ $resident->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                        <label for="first-name-vertical">Dusun</label>
                                        <input type="text" id="first-name-vertical" class="form-control" name="village" 
                                            placeholder="Dusun">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                        <label for="first-name-vertical">RT</label>
                                        <input type="number" id="first-name-vertical" class="form-control" name="rt" 
                                            placeholder="Rukun Tetangga">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                        <label for="first-name-vertical">RW</label>
                                        <input type="number" id="first-name-vertical" class="form-control" name="rw" 
                                            placeholder="Rukun Warga">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                        <label for="first-name-vertical">Alamat</label>
                                        <input type="address" id="first-name-vertical" class="form-control" name="address" 
                                            placeholder="Alamat">
                                        </div>
                                    </div>
                                    {{-- <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Create</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Create</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>

            </div>
            
@endsection