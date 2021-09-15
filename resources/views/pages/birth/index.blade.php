@extends('layouts.dashboard')

@section('title', 'List Data Kelahiran')

@section('content')
    <div class="main-content container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>List Kelahiran</h3>
                            {{-- <h3>Datatable</h3> --}}
                            {{-- <p class="text-subtitle text-muted">We use 'simple-datatables' made by @fiduswriter. You can
                                check the full documentation <a
                                    href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p> --}}
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List Kelahiran</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                    <div class="fw-bold alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('delete'))
                    <div class="fw-bold alert alert-danger">
                        {{ session('delete') }}
                    </div>
                @endif
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <form method="GET">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jenis Kelamin</label>
                                            <select name="gender" class="form-select">
                                                <option class="gender" selected value="{{ null }}">Semua</option>
                                                <option class="gender" value="Laki-laki" {{ request()->get('gender') == 'Laki-laki' ? 'selected' :''  }}>Laki-laki</option>
                                                <option class="gender" value="Perempuan" {{ request()->get('gender') == 'Perempuan' ? 'selected' :''  }}>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="d-none" id="gender1" formaction="{{ route('births.index') }}"></button>
                                </form>
                                {{-- <a
                                    href="#mymodal"
                                    data-target="#mymodal"
                                    data-toggle="modal"
                                    data-remote="{{ route('births.create') }}"
                                    data-title="Create Kelahiran"
                                    class="btn round btn-primary btn-sm"> 
                                    <i data-feather="file-plus" width="20"></i>
                                    Create
                                </a> --}}
                                <div class="text-light ">
                                    <a href="{{ route('births.create') }}" class="btn round btn-info"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create Data">
                                        <i class="fas fa-plus"></i>
                                        <span>Create</span>
                                    </a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn round btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Import Data"
                                    >
                                        <i data-feather="upload" width="20"></i>
                                        <span>Impor</span>
                                    </button>
                                    <a href="{{ route('exportBirth', 'xlsx') }}" class="btn round btn-primary"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Export Data"
                                    >
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
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Keluarga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Keluarga</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($births as $birth)
                                    <tr>
                                        <td>{{ $birth->id }}</td>
                                        <td>{{ $birth->name }}</td>
                                        <td>{{ $birth->date }}</td>
                                        <td>{{ $birth->gender }}</td>
                                        <td>{{ $birth->family->name }}</td>
                                        <td>
                                            <a href="#mymodal"
                                                data-remote="{{ route('births.show', $birth->id) }}"
                                                data-toggle="modal"
                                                data-target="#mymodal"
                                                data-title="Detail Penduduk {{ $birth->name }}" 
                                                class="btn round btn-success btn-sm"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Detail"
                                                >
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            {{-- <a
                                                href="#mymodal"
                                                data-target="#mymodal"
                                                data-toggle="modal"
                                                data-remote="{{ route('births.edit', $birth->id) }}"
                                                data-title="Edit Kelahiran {{ $birth->name }}"
                                                class="btn round btn-info btn-sm"> 
                                                <i data-feather="edit" width="20"></i>
                                            </a> --}}
                                            <a href="{{ route('births.edit', $birth->id) }}" class="btn round btn-primary btn-sm"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Data"
                                                >
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('births.destroy', $birth->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn round btn-danger btn-sm " 
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete Data">
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

                <!-- Modal Import-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data Kelahiran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form  method="POST"  action="{{ route('importBirth') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                    <p>
                                        Pastikan anda sudah memiliki template file download
                                        <a href="{{ route('births.template') }}">disini</a>
                                    </p>
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

@push('addon-script')
<script>
    $(".gender").click(function(){
        $("#gender1").click();
    });
</script>
@endpush