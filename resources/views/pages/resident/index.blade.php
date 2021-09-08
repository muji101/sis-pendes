@extends('layouts.dashboard')

@section('title', 'List Data Penduduk')

@section('content')

    <div class="main-content container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>List Penduduk</h3>
                            {{-- <h3>Datatable</h3> --}}
                            {{-- <p class="text-subtitle text-muted">We use 'simple-datatables' made by @fiduswriter. You can
                                check the full documentation <a
                                    href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p> --}}
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List Penduduk</li>
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
                                <button type="button" class="btn round btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i data-feather="filter" width="20"></i>
                                    <span>Filter</span>
                                </button>
                                <div class="text-light ">
                                    <a 
                                        href="#mymodal"
                                        data-remote="{{ route('modal-resident') }}"
                                        data-toggle="modal"
                                        data-target="#mymodal"
                                        class="btn round btn-success">
                                        <i data-feather="upload" width="20"></i>
                                        <span>Impor</span>
                                    </a>
                                    <a href="{{ route('exportResident', 'xlsx') }}" class="btn round btn-primary">
                                        <i data-feather="download" width="20"></i>
                                        <span>Export</span>
                                    </a>
                                    {{-- <button class="btn round btn-info ml-2" id="filter">Filter</button> --}}
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
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>NO. KK</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($residents as $resident)
                                    <tr>
                                        @forelse ($resident->death as $item)
                                        @empty
                                            <td>{{ $resident->id }}</td>
                                            <td>{{ $resident->nik }}</td>
                                            <td>{{ $resident->name }}</td>
                                            <td>{{ $resident->gender }}</td>
                                            {{-- mengambil address dari fileld families oleh residents yang berelasi di field family_members --}}
                                            @forelse ($resident->familyMember as $item)
                                                <td>{{ $item->family->address }}</td> 
                                                <td>{{ $item->family->no_family }}</td> 
                                            @empty
                                                <td>-</td>
                                                <td>-</td>
                                            @endforelse
                                            
                                            <td>
                                                <a href="#mymodal"
                                                    data-remote="{{ route('residents.show', $resident->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#mymodal"
                                                    data-title="Detail Penduduk {{ $resident->name }}" 
                                                    class="btn round btn-success btn-sm">
                                                    {{-- <i data-feather="eye" width="20"></i> --}}
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('residents.edit', $resident->id) }}" class="btn round btn-primary btn-sm">
                                                    {{-- <i data-feather="edit" width="20"></i> --}}
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('residents.destroy', $resident->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn round btn-danger btn-sm ">
                                                        {{-- <i data-feather="trash" width="20"></i> --}}
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        @endforelse
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>


            <!--  Filter Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">-- Filter Data Penduduk --</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="GET">

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Agama</label>
                                        <select name="religion" class="form-select">
                                            <option selected value="{{ null }}">-- Agama --</option>
                                            <option value="Islam" {{ request()->get('religion') == 'Islam' ? 'selected' :''  }}>Islam</option>
                                            <option value="Kristen" {{ request()->get('religion') == 'Kristen' ? 'selected' :''  }}>Kristen</option>
                                            <option value="Hindu" {{ request()->get('religion') == 'Hindu' ? 'selected' :''  }}>Hindu</option>
                                            <option value="Budha" {{ request()->get('religion') == 'Budha' ? 'selected' :''  }}>Budha</option>
                                            <option value="Katolik" {{ request()->get('religion') == 'Katolik' ? 'selected' :''  }}>Katolik</option>
                                            <option value="Konghucu" {{ request()->get('religion') == 'Konghucu' ? 'selected' :''  }}>Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                                        <select name="gender" class="form-select">
                                            <option selected value="{{ null }}">-- Jenis Kelamin --</option>
                                            <option value="Laki-laki" {{ request()->get('gender') == 'Laki-laki' ? 'selected' :''  }}>Laki-laki</option>
                                            <option value="Perempuan" {{ request()->get('gender') == 'Perempuan' ? 'selected' :''  }}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Status</label>
                                        <select name="martial_status" class="form-select">
                                            <option selected value="{{ null }}">-- Status --</option>
                                            <option value="Kawin" {{ request()->get('martial_status') == 'Kawin' ? 'selected' :''  }}>Kawin</option>
                                            <option value="Belum Kawin" {{ request()->get('martial_status') == 'Belum Kawin' ? 'selected' :''  }}>Belum Kawin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kewarganegaraan</label>
                                        <select name="citizenship" class="form-select">
                                            <option selected value="{{ null }}">-- Kewarganegaraan --</option>
                                            <option value="WNI" {{ request()->get('citizenship') == 'WNI' ? 'selected' :''  }}>WNI</option>
                                            <option value="WNA" {{ request()->get('citizenship') == 'WNA' ? 'selected' :''  }}>WNA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pendidikan</label>
                                        <select name="last_education" class="form-select">
                                            <option selected value="{{ null }}">-- Pendidikan --</option>
                                            <option value="SD"{{ request()->get('last_education') ===  'SD'  ? 'selected': '' }}>SD</option>
                                            <option value="SMP"{{ request()->get('last_education') ===  'SMP'  ? 'selected': '' }}>SMP</option>
                                            <option value="SMA"{{ request()->get('last_education') ===  'SMA'  ? 'selected': '' }}>SMA</option>
                                            <option value="D1"{{ request()->get('last_education') ===  'D1'  ? 'selected': '' }}>D1</option>
                                            <option value="D2"{{ request()->get('last_education') ===  'D2'  ? 'selected': '' }}>D2</option>
                                            <option value="D3"{{ request()->get('last_education') ===  'D3'  ? 'selected': '' }}>D3</option>
                                            <option value="D4"{{ request()->get('last_education') ===  'D4'  ? 'selected': '' }}>D4</option>
                                            <option value="S1"{{ request()->get('last_education') ===  'S1'  ? 'selected': '' }}>S1</option>
                                            <option value="S2"{{ request()->get('last_education') ===  'S2'  ? 'selected': '' }}>S2</option>
                                            <option value="S3"{{ request()->get('last_education') ===  'S3'  ? 'selected': '' }}>S3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Golongan Darah</label>
                                        <select name="blood_type" class="form-select">
                                            <option selected value="{{ null }}">-- Golongan Darah --</option>
                                            <option value="A-"{{ request()->get('blood_type') ===  'A-'  ? 'selected': '' }}>A-</option>
                                            <option value="A+"{{ request()->get('blood_type') ===  'A+'  ? 'selected': '' }}>A+</option>
                                            <option value="B"{{ request()->get('blood_type') ===  'B'  ? 'selected': '' }}>B</option>
                                            <option value="B+"{{ request()->get('blood_type') ===  'B+'  ? 'selected': '' }}>B+</option>
                                            <option value="O-"{{ request()->get('blood_type') ===  'O-'  ? 'selected': '' }}>O-</option>
                                            <option value="O+"{{ request()->get('blood_type') ===  'O+'  ? 'selected': '' }}>O+</option>
                                            <option value="AB-"{{ request()->get('blood_type') ===  'AB-'  ? 'selected': '' }}>AB-</option>
                                            <option value="AB+"{{ request()->get('blood_type') ===  'AB+'  ? 'selected': '' }}>AB+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" formaction="{{ route('residents.index') }}">Terapkan</button>
                                {{-- <button type="submit" class="btn btn-primary me-1 mb-1">Create</button> --}}
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>

        </div>
@endsection

{{-- @push('addon-script')
<script>
$("#filter").fireModal({
    title:'Filter Data',
    body: `
    <form method="GET">

        <div class="form-group">
        <label for="exampleInputEmail1">Umur</label>
        <select name="religion" class="custom-select">
            <option selected value="{{ null }}">-- religion --</option>
            <option value="16" {{ request()->get('religion') == '16' ? 'selected' :''  }}>16</option>
            <option value="17" {{ request()->get('religion') == '17' ? 'selected' :''  }}>17</option>
            <option value="18" {{ request()->get('religion') == '18' ? 'selected' :''  }}>18</option>
            <option value="19" {{ request()->get('religion') == '19' ? 'selected' :''  }}>19</option>
            <option value="20" {{ request()->get('religion') == '20' ? 'selected' :''  }}>20</option>
            <option value="21" {{ request()->get('religion') == '21' ? 'selected' :''  }}>21</option>
        </select>
        </div>
    
        <div class="form-group">
        <label for="exampleInputEmail1">Kondisi Keluarga</label>
        <select name="keluarga" class="custom-select">
            <option selected value="{{ null }}">-- Kondisi Keluarga --</option>
            <option value="mampu" {{ request()->get('keluarga') == 'mampu' ? 'selected' :''  }}>Keluarga Mampu</option>
            <option value="tidak-mampu" {{ request()->get('keluarga') == 'tidak-mampu' ? 'selected' :''  }}>Keluarga Tidak-Mampu</option>
        </select>
        </div>
        
        <button type="submit" class="btn btn-primary" formaction="{{ route('residents.index') }}">Terapkan</button>
        
        </form>
            
    `});
  </script>
@endpush --}}
{{-- <button type="submit" formaction="{{ route('reset-tahap1') }}" class="btn btn-primary float-right" >Reset</button> --}}