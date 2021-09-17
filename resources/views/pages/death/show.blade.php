<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $deaths->resident->name }}</td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td>{{ $deaths->resident->birthdate }}</td>
    </tr>
    <tr>
        <th>Tanggal Meninggal</th>
        <td>{{ $deaths->date }}</td>
    </tr>
    <tr>
        <th>Jam Meninggal</th>
        <td>{{ $deaths->time }}</td>
    </tr>
    <tr>
        <th>Usia</th>
        <td>{{ $deaths->resident->age }} Tahun</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>{{ $deaths->resident->gender }}</td>
    </tr>
    <tr>
        <th>Penyebab Meninggal</th>
        <td>{{ $deaths->reason }}</td>
    </tr>
    <tr>
        <th>Informasi Lainnya</th>
        <td>
            <a href="{{ route('familyMember.show', $deaths->resident->id) }}" class="btn round btn-success btn-sm"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Detail Data">
                <i class="fas fa-eye"></i>
            </a>
        </td>
    </tr>
</table>
