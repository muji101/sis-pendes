<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $births->name }}</td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td>{{ $births->date }}</td>
    </tr>
    <tr>
        <th>Tempat Lahir</th>
        <td>{{ $births->place }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>{{ $births->gender }}</td>
    </tr>
    <tr>
        <th>Keluarga</th>
        <td>{{ $births->family->name }}</td>
    </tr>
</table>
