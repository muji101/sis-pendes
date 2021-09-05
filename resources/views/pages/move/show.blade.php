<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $moves->resident->name }}</td>
    </tr>
    <tr>
        <th>Tanggal Pindah</th>
        <td>{{ $moves->date }}</td>
    </tr>
    <tr>
        <th>Alasan Pindah</th>
        <td>{{ $moves->reason }}</td>
    </tr>
    @forelse ($moves->resident->familyMember as $item)
        <tr>
            <th>Alamat</th>
            <td>{{ $item->family->address }}</td>
        </tr>
        <tr>
            <th>No. KK</th>
            <td>{{ $item->family->no_family }}</td>
        </tr>
    @empty
        <tr>
            <th>Alamat</th>
            <td>-</td>
        </tr>
        <tr>
            <th>No. KK</th>
            <td>-</td>
        </tr>
    @endforelse
</table>
