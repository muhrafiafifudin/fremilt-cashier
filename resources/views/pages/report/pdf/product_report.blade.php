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

<table width="100%" style="border: none">
    <tr style="border: none">
        <td width="30%" style="border: none">
            {{-- <img src="users/img/logo.png" alt="navbar brand" width="300px"> --}}
            <img alt="Logo" src="assets/media/logos/fremilt.png" width="200px" />
        </td>
        <td width="70%" style="border: none; line-height:10px; font-size: 14px">
            <h2 class="text-center">Fremilt Solo Baru</h2>
            <p class="text-center">Jl. Mangesti Raya No.19, Solo Baru, Surakarta, Jawa Tengah</p>
        </td>
    </tr>
</table>

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
