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

<h3 class="text-center" style="line-height: 10px; margin-top: 5rem">Laporan Toping</h3>

<br>

<table width="100%">
    <tr>
        <th>No.</th>
        <th>Toping</th>
        <th>Stok</th>
        <th>Dibuat Pada</th>
    </tr>
    @php $no = 1; @endphp
    @foreach ($toppings as $topping)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ $topping->topping }}</td>
            <td>{{ $topping->stock }}</td>
            <td>{{ $topping->created_at }}</td>
        </tr>
    @endforeach
</table>
