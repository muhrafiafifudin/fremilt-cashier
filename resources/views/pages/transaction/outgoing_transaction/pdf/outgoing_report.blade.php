<style>
    .text-center {
        text-align: center;
    }
    .text-start {
        text-align: left;
    }
    .text-end {
        text-align: right;
    }
</style>

<table width="100%">
    <tr>
        <td colspan="2" class="text-center">Fremilt</td>
    </tr>
    <tr>
        <td colspan="2" class="text-center">Solo Baru</td>
    </tr>
    <tr>
        <td colspan="2" class="text-center">Jalan Kenangan No. 12</td>
    </tr>

    <br>
    <br>

    @foreach ($transaction_details as $transaction_detail)
        <tr>
            <td>{{ $transaction_detail->product_qty . ' x ' . $transaction_detail->product->price }}</td>
            <td class="text-end">{{ $transaction_detail->product_qty * $transaction_detail->product->price }}</td>
        </tr>
        <tr>
            <td colspan="2">{{ $transaction_detail->product->product }}</td>
        </tr>
    @endforeach

    <br>
    <br>

    <tr>
        <td>**TOTAL</td>
        <td class="text-end">{{ $payment->gross_amount }}</td>
    </tr>
    <tr>
        <td>BAYAR</td>
        <td class="text-end">{{ $payment->payment }}</td>
    </tr>
    <tr>
        <td>KEMBALI</td>
        <td class="text-end">{{ $payment->money_change }}</td>
    </tr>

    <br>
    <br>

    <tr>
        <td colspan="2" class="text-center">TERIMA KASIH</td>
    </tr>
    <tr>
        <td colspan="2" class="text-center">ATAS KUNJUNGAN ANDA</td>
    </tr>
</table>
