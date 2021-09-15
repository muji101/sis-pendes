<table class="table table-bordered">
    <tr>
        <th>NIK</th>
        <td>{{ $residents->nik }}</td>
    </tr>
    <tr>
        <th>Nama</th>
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
        <td>{{ $residents->age }} Tahun</td>
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
                </tr>
                <tr>
                    @if (isset($residents->father))
                    <td>{{ $residents->father }}</td>
                    <td>{{ $residents->mother }}</td>
                    @else   
                    <td>-</td>
                    <td>-</td>
                    @endif
                </tr>
            </table>
        </td>
    </tr>
</table>