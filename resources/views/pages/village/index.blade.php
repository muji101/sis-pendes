@extends('layouts.dashboard')

@section('title', 'Pengaturan Profil Desa')

@section('content')
    <div class="main-content container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Profile Desa</h3>
                            {{-- <h3>Datatable</h3> --}}
                            {{-- <p class="text-subtitle text-muted">We use 'simple-datatables' made by @fiduswriter. You can
                                check the full documentation <a
                                    href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p> --}}
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile Village</li>
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
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Dusun / Kampung</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="list-group">
                                            @forelse ($villages as $village)
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>{{$village->name}}</span>
                                                {{-- <span class="badge bg-warning badge-pill badge-round ml-1">8</span> --}}
                                                <span>
                                                    <a
                                                    href="#mymodal"
                                                    data-target="#mymodal"
                                                    data-toggle="modal"
                                                    data-remote="{{ route('villages.edit', $village->id) }}"
                                                    class="btn btn-info btn-icon icon-left btn-sm"> 
                                                    <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('villages.destroy', $village->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm ">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </span>
                                            </li>
                                            @empty
                                            <h6>Belum Ada data silahkan buat data</h6>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <div class="card-footer">
                                        <a
                                            href="#mymodal"
                                            data-target="#mymodal"
                                            data-toggle="modal"
                                            data-remote="{{ route('villages.create') }}"
                                            class="btn btn-success btn-icon icon-left btn-sm"> 
                                            <i class="fas fa-plus"></i>
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Rukun Warga (RW)</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="list-group">
                                            @forelse ($rws as $rw)
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>{{$rw->rw}}</span>
                                                {{-- <span class="badge bg-warning badge-pill badge-round ml-1">8</span> --}}
                                                <span>
                                                    <a
                                                    href="#mymodal"
                                                    data-target="#mymodal"
                                                    data-toggle="modal"
                                                    data-remote="{{ route('rws.edit', $rw->id) }}"
                                                    class="btn btn-info btn-icon icon-left btn-sm"> 
                                                    <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('rws.destroy', $rw->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm ">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </span>
                                            </li>
                                            @empty
                                            <h6>Belum Ada data silahkan buat data</h6>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <div class="card-footer">
                                        <a
                                            href="#mymodal"
                                            data-target="#mymodal"
                                            data-toggle="modal"
                                            data-remote="{{ route('rws.create') }}"
                                            class="btn btn-success btn-icon icon-left btn-sm"> 
                                            <i class="fas fa-plus"></i>
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Rukun Tetangga (RT)</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="list-group">
                                            @forelse ($rts as $rt)
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>{{$rt->rt}}</span>
                                                {{-- <span class="badge bg-warning badge-pill badge-round ml-1">8</span> --}}
                                                <span>
                                                    <a
                                                    href="#mymodal"
                                                    data-target="#mymodal"
                                                    data-toggle="modal"
                                                    data-remote="{{ route('rts.edit', $rt->id) }}"
                                                    class="btn btn-info btn-icon icon-left btn-sm"> 
                                                    <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('rts.destroy', $rt->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm ">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </span>
                                            </li>
                                            @empty
                                            <h6>Belum Ada data silahkan buat data</h6>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <div class="card-footer">
                                        <a
                                            href="#mymodal"
                                            data-target="#mymodal"
                                            data-toggle="modal"
                                            data-remote="{{ route('rts.create') }}"
                                            class="btn btn-success btn-icon icon-left btn-sm"> 
                                            <i class="fas fa-plus"></i>
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>

                <!-- Modal Import-->
            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Data Dusun/Kampung</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form  method="POST"  action="{{ route('villages.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="col-12">
                                <div class="form-group">
                                <label for="first-name-vertical">Nama Dusun</label>
                                <input type="text" id="first-name-vertical" class="form-control" name="name"
                                    placeholder="Nama Dusun">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Create</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div> --}}
                
            </div>
@endsection