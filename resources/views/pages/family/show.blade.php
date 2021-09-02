<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $families->no_family }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $families->resident->name }}</td>
    </tr>
    <tr>
        <th>Nomor</th>
        <td>{{ $families->village }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ $families->rt }}</td>
    </tr>
    <tr>
        <th>Total Transaksi</th>
        <td>{{ $families->transaction_total}}</td>
    </tr>
    <tr>
        <th>Status Transaksi</th>
        <td>{{ $families->transaction_status }}</td>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </tr>
                <tr>
                    {{-- @foreach ($families->details as $detail)
                        <tr>
                            <td>{{ $detail->product->name }}</td>
                            <td>{{ $detail->product->type }}</td>
                            <td>${{ $detail->product->price }}</td>
                        </tr>
                    @endforeach --}}
                </tr>
            </table>
        </td>
    </tr>
</table>
<div class="row">
    <div class="col-4">
        <a href="{{ route('transactions.status', $families->id) }}?status=SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check"></i>Set Sukses
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactions.status', $families->id) }}?status=FAILED" class="btn btn-danger btn-block">
            <i class="fa fa-times"></i>Set Gagal
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactions.status', $families->id) }}?status=PENDING" class="btn btn-info btn-block">
            <i class="fa fa-spinner"></i>Set Pending
        </a>
    </div>
</div>