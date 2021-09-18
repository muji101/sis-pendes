@extends('layouts.dashboard')

@section('title', 'Pengaturan Profil Desa')

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Profile Desa</h3>
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
                            <span class="fs-5 fw-bold card-title position-relative">
                                Dusun / Kampung
                                <span class="position-absolute top-20 start-100 translate-middle badge rounded-pill bg-success">
                                    {{ $villages->count() }}
                                </span>
                            </span>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="list-group">
                                    @forelse ($villages as $village)
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{{$village->name}}</span>
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
                            <span class="fs-5 fw-bold card-title position-relative">
                                Rukun Warga (RW)
                                <span class="position-absolute top-20 start-100 translate-middle badge rounded-pill bg-success">
                                    {{ $rws->count() }}
                                </span>
                            </span>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="list-group">
                                    @forelse ($rws as $rw)
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{{$rw->rw}}</span>
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
                            <span class="fs-5 fw-bold card-title position-relative">
                                Rukun Tetangga (RT)
                                <span class="position-absolute top-20 start-100 translate-middle badge rounded-pill bg-success">
                                    {{ $rts->count() }}
                                </span>
                            </span>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="list-group">
                                    @forelse ($rts as $rt)
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{{$rt->rt}}</span>
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
            </div>
        </section>
    </div>
@endsection