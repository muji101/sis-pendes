<table class="table table-bordered">
    <tr>
        <th>NO Kartu Keluarga</th>
        <td>{{ $families->no_family }}</td>
    </tr>
    <tr>
        <th>Kepala Keluarga</th>
        <td>{{ $families->resident->name }}</td>
    </tr>
    <tr>
        <th>Dusun</th>
        <td>{{ $families->village }}</td>
    </tr>
    <tr>
        <th>RT</th>
        <td>{{ $families->rt }}</td>
    </tr>
    <tr>
        <th>RW</th>
        <td>{{ $families->rw}}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ $families->address }}</td>
    </tr>
    <tr>
        <th>Anggota Keluarga</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Hubungan</th>
                    <th>Action</th>
                </tr>
                {{-- <form action="{{ route('familyMember.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="family_id" value="{{ $families->id }}">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6 form-group">
                                <select class="choices form-select" name="resident_id">
                                    <option selected disabled>-- Pilih Keluarga --</option>
                                    @foreach ($residents as $resident)
                                    <option value="{{ $resident->id }}">{{ $resident->nik }} -- {{ $resident->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" col-4 form-group">
                                <select class="choices form-select" name="family_relationship">
                                    <option selected disabled>-- Pilih Hubungan --</option>
                                    <option value="Kepala Keluarga">Kepala Keluarga</option>
                                    <option value="Istri">Istri</option>
                                    <option value="Anak Kandung">Anak Kandung</option>
                                    <option value="Anak Tiri">Anak Tiri</option>
                                    <option value="Ibu">Ibu</option>
                                    <option value="Ayah">Ayah</option>
                                </select>
                            </div>
                            <div class="col-2 ms-0">
                                <button type="submit" class="btn btn-success">
                                    <i data-feather="plus" width="20"></i>
                                    <span>Tambah</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form> --}}
                <tr>
                    @foreach ($members as $family)
                        <tr>
                            <td>{{ $family->resident->name }}</td>
                            <td>{{ $family->resident->gender }}</td>
                            <td>{{ $family->family_relationship }}</td>
                            <td>
                                {{-- <a href="#mymodal"
                                    data-remote="{{ route('familyMember.show', $family->resident->id) }}"
                                    data-toggle="modal"
                                    data-target="#mymodal"
                                    data-title="Detail Penduduk {{ $family->resident->name }}" 
                                    class="btn round btn-success btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Detail">
                                    <i class="fas fa-eye"></i>
                                </a> --}}
                                <a href="{{ route('familyMember.show', $family->resident->id) }}" class="btn round btn-success btn-sm"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Detail Data">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('familyMember.destroy', $family->id) }}" method="POST" class="d-inline">
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
                </tr>
            </table>
        </td>
    </tr>
</table>
