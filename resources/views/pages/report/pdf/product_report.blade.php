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

<h3 class="text-center" style="line-height: 10px; margin-top: 5rem">Laporan Produk</h3>

<br>

<table width="100%">
    <tr>
        <th>No.</th>
        <th>Produk</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Dibuat Pada</th>
    </tr>
    @php $no = 1; @endphp
    @foreach ($products as $product)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ $product->product }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->created_at }}</td>
        </tr>
    @endforeach
</table>
