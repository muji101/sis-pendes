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
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tr>
                    @foreach ($members as $family)
                        <tr>
                            <td>{{ $family->resident->name }}</td>
                            <td>{{ $family->resident->gender }}</td>
                            <td>{{ $family->family_relationship }}</td>
                            <td>{{ $family->resident->status }}</td>
                            <td>
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
