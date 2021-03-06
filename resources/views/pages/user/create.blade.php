@php
    //isset buat ngecek data kalau ada true kalau tidak false
    $isEdit = isset($users);
    
    $title = $isEdit ? 'Edit Data Pengguna' : 'Tambah Data Pengguna';

    $route = $isEdit ? route('user.update', $users->id) : route('user.store');

    $button = $isEdit ? 'Update' : 'Create';
@endphp
@extends('layouts.dashboard')

@section('title', $title)

@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Create User</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create User</li>
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
                            <form class="form form-vertical" method="POST" action="{{ $route }}">
                                @csrf
                                @method('POST')
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Name</label>
                                    <div class="position-relative">
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $isEdit ? $users->name :  old('name') }}" placeholder="Enter Name" required>
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Email</label>
                                    <div class="position-relative">
                                        <input type="email" name="email" class="form-control" id="email" value="{{ $isEdit ? $users->email : old('email') }}" placeholder="Enter Email" required>
                                        <div class="form-control-icon">
                                            <i data-feather="mail"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                        {{-- @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class='float-end'>
                                                <small>Forgot password?</small>
                                            </a>
                                        @endif --}}
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password" name="password" value="{{ $isEdit ? $users->password : old('password') }}" placeholder="Enter Password" required>
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Role</label>
                                    <div class="position-relative">
                                        {{-- <input type="email" name="email" class="form-control" id="name" value="{{ old('email') }}" placeholder="Enter Email" required> --}}
                                        <select class="form-select form-control" name="role" id="">
                                            @if ($isEdit)
                                            <option value="ADMIN" {{ $users->role === 'ADMIN' ? 'selected' : '' }}>Admin</option>
                                            <option value="USER" {{ $users->role === 'USER' ? 'selected' : '' }}>User</option>
                                            @else
                                            <option selected disabled>-- Role --</option>
                                            <option value="ADMIN">Admin</option>
                                            <option value="USER">User</option>
                                            @endif
                                        </select>
                                        <div class="form-control-icon">
                                            <i data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix">
                                    <button class="btn btn-primary float-end">{{ $button }}</button>
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