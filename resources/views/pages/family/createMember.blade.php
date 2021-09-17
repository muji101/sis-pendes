@extends('layouts.dashboard')

@section('title', 'Tambah Anggota Keluarga')

@section('content')
    <div class="main-content container-fluid">
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                        <h4 class="card-title">Keluarga: {{ $families->resident->name }} -- {{ $families->no_family }}</h4>
                        </div>
                        <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('familyMember.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="family_id" value="{{ $families->id }}">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <select class="choices form-select" name="resident_id">
                                                <option selected disabled>-- Anggota Keluarga --</option>
                                                @foreach ($residents as $resident)
                                                    <option value="{{ $resident->id }}">{{ $resident->nik }} -- {{ $resident->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class=" col-12 form-group">
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
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            <i data-feather="plus" width="20"></i>
                                            <span>Anggota Keluarga</span>
                                        </button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection