<table class="table table-bordered">
    <tr>
        <th>NIK</th>
        <td>{{ $residents->nik }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $residents->name }}</td>
    </tr>
    <tr>
        <th>Tempat Lahir</th>
        <td>{{ $residents->birthplace }}</td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td>{{ $residents->birthdate }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>{{ $residents->gender}}</td>
    </tr>
    <tr>
        <th>Agama</th>
        <td>{{ $residents->religion }}</td>
    </tr>
    <tr>
        <th>Pendidikan</th>
        <td>{{ $residents->last_education }}</td>
    </tr>
    <tr>
        <th>Pekerjaan</th>
        <td>{{ $residents->work }}</td>
    </tr>
    <tr>
        <th>Golongan Darah</th>
        <td>{{ $residents->blood_type }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $residents->martial_status }}</td>
    </tr>
    <tr>
        <th>Kewarganegaraan</th>
        <td>{{ $residents->citizenship }}</td>
    </tr>
    <tr>
        <th>Umur</th>
        <td>{{ $age }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        @forelse ($residents->familyMember as $item)
            <td>{{ $item->family->address }}</td> 
        @empty
            <td>-</td>
        @endforelse
    </tr>
    <tr>
        <th>Nomer KK</th>
        @forelse ($residents->familyMember as $item)
            <td>{{ $item->family->no_family }}</td> 
        @empty
            <td>-</td>
        @endforelse
    </tr>
    <tr>
        <th>Keluarga</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Ayah</th>
                    <th>Ibu</th>
                    {{-- <th>Harga</th> --}}
                </tr>
                <tr>
                    @forelse ($residents->familyMember as $item)
                        <td>{{ $item->family->resident->name }}</td> 
                    @empty
                        <td>-</td>
                    @endforelse
                </tr>
            </table>
        </td>
    </tr>
</table>

{{-- <div class="row">
    <div class="col-6">
        <a href="{{ route('residents.status', $residents->id) }}?status=ada" class="btn btn-success btn-block">
            <i class="fa fa-check"></i>Hidup
        </a>
    </div>
    <div class="col-6">
        <a href="{{ route('residents.status', $residents->id) }}?status=meninggal" class="btn btn-danger btn-block">
            <i class="fa fa-times"></i>Meninggal
        </a>
    </div>
</div> --}}