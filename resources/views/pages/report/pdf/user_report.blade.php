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

<h3 class="text-center" style="line-height: 10px; margin-top: 5rem">Laporan Kasir</h3>

<br>

<table width="100%">
    <tr>
        <th>No.</th>
        <th>Nama Kasir</th>
        <th>Email</th>
        <th>Dibuat Pada</th>
    </tr>
    @php $no = 1; @endphp
    @foreach ($users as $user)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
        </tr>
    @endforeach
</table>
