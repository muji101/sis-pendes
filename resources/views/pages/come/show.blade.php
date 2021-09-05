<table class="table table-bordered">
    <tr>
        <th>NIK</th>
        <td>{{ $comes->nik }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $comes->name }}</td>
    </tr>
    <tr>
        <th>Tempat Lahir</th>
        <td>{{ $comes->birthplace }}</td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td>{{ $comes->birthdate }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>{{ $comes->gender}}</td>
    </tr>
    <tr>
        <th>Agama</th>
        <td>{{ $comes->religion }}</td>
    </tr>
    <tr>
        <th>Pendidikan</th>
        <td>{{ $comes->last_education }}</td>
    </tr>
    <tr>
        <th>Pekerjaan</th>
        <td>{{ $comes->work }}</td>
    </tr>
    <tr>
        <th>Golongan Darah</th>
        <td>{{ $comes->blood_type }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $comes->martial_status }}</td>
    </tr>
    <tr>
        <th>Kewarganegaraan</th>
        <td>{{ $comes->citizenship }}</td>
    </tr>
    <tr>
        <th>Pelapor</th>
        <td>{{ $comes->resident->name }}</td>
    </tr>
    {{-- <tr>
        <th>Alamat</th>
        @forelse ($comes->familyMember as $item)
            <td>{{ $item->family->address }}</td> 
        @empty
            <td>-</td>
        @endforelse
    </tr>
    <tr>
        <th>Nomer KK</th>
        @forelse ($comes->familyMember as $item)
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
                </tr>
                <tr>
                    @forelse ($comes->familyMember as $item)
                        <td>{{ $item->family->resident->name }}</td> 
                    @empty
                        <td>-</td>
                    @endforelse
                </tr>
            </table>
        </td>
    </tr> --}}
</table>