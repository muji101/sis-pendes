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
        <td>{{ $age }} Tahun</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>{{ $deaths->resident->gender }}</td>
    </tr>
    <tr>
        <th>Penyebab Meninggal</th>
        <td>{{ $deaths->reason }}</td>
    </tr>
</table>
