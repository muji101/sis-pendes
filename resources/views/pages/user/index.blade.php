@extends('layouts.dashboard')

@section('title', 'List Data Pengguna')

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    {{-- <h3>Datatable</h3> --}}
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">List User</li>
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
                        <h3>List Pengguna</h3>
                        {{-- <div class="text-light ">
                            <a href="#" class="btn btn-success">
                                <i data-feather="upload" width="20"></i>
                                <span>Impor</span>
                            </a>
                            <a href="#" class="btn btn-primary">
                                <i data-feather="download" width="20"></i>
                                <span>Export</span>
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    <table class='table' id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <div class="dropend">
                                        <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Info
                                        </button>
                                        <div class="dropdown-menu bg-transparent border-0" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item text-white rounded bg-primary" href="{{ route('user.edit', $user->id) }}"><i data-feather="edit" width="20"></i> Edit</a>
                                            <form action="{{ route('user.delete', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
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