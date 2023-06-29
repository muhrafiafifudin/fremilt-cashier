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

<h3 class="text-center" style="line-height: 10px; margin-top: 5rem">Laporan Bahan</h3>

<br>

<table width="100%">
    <tr>
        <th>No.</th>
        <th>Bahan</th>
        <th>Stok</th>
        <th>Dibuat Pada</th>
    </tr>
    @php $no = 1; @endphp
    @foreach ($ingredients as $ingredient)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ $ingredient->ingredient }}</td>
            <td>{{ $ingredient->stock }}</td>
            <td>{{ $ingredient->created_at }}</td>
        </tr>
    @endforeach
</table>
