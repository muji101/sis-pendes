@extends('layouts.dashboard')

@section('title', 'Tambah Anggota Keluarga')

@section('content')
    <div class="main-content container-fluid">
                <h3>Keluarga: {{ $families->resident->name }} -- {{ $families->no_family }}</h3>
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
                        <div class="">
                            <button class="btn btn-success">
                                <i data-feather="plus" width="20"></i>
                                <span>Anggota Keluarga</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
@endsection