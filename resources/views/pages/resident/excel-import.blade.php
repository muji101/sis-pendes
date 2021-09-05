@extends('layouts.dashboard')

@section('title', 'Import file Excel')

@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Import File</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Import resident</li>
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
            <h4 class="card-title">Residents</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
              {{-- <form id="excel-csv-import-form" method="POST"  action="{{ route('importResident') }}" accept-charset="utf-8" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <input type="file" name="file" placeholder="Choose file">
                          </div>
                          @error('file')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                      </div>              
                      <div class="col-md-12">
                          <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                      </div>
                  </div>     
              </form> --}}
              <form  method="POST"  action="{{ route('importResident') }}" enctype="multipart/form-data">
                @csrf
                        <div class="form-file">
                            <input type="file" name="file" class="form-file-input" id="customFile">
                            <label class="form-file-label" for="customFile">
                                <span class="form-file-text">Choose file...</span>
                                <span class="form-file-button btn-primary "><i
                                        data-feather="upload"></i></span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary me-1 mb-1">Create</button>
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