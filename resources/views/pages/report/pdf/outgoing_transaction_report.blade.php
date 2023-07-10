<style>
    body {
        padding-left: 30px;
        padding-right: 30px;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    .text-center {
        text-align: center;
    }
</style>

<h3 class="text-center" style="line-height: 10px; margin-top: 5rem">Laporan Transaksi Keluar</h3>

<br>

<table width="100%">
    <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>No. Order</th>
        <th>Pelanggan</th>
        <th>Total</th>
    </tr>
    @php $no = 1; @endphp
    @foreach ($transactions as $transaction)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ date('d F Y', strtotime($transaction->created_at)) }}</td>
            <td>{{ $transaction->order_number }}</td>
            <td>{{ $transaction->name }}</td>
            <td>{{ $transaction->total }}</td>
        </tr>
    @endforeach
</table>
