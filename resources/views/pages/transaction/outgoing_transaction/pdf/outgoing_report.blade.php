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
    .f-12 {
        font-size: 12px
    }
</style>

<table width="100%" class="f-12">
    <tr>
        <td colspan="2" class="text-center"><strong>Fremilt Solo Baru</strong></td>
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
        <td>**Total</td>
        <td class="text-end">{{ $payment->gross_amount }}</td>
    </tr>
    <tr>
        <td>Bayar</td>
        <td class="text-end">{{ $payment->payment }}</td>
    </tr>
    <tr>
        <td>Kembali</td>
        <td class="text-end">{{ $payment->money_change }}</td>
    </tr>

    <br>
    <br>

    <tr>
        <td colspan="2" class="text-center"><strong>Terima Kasih</strong></td>
    </tr>
    <tr>
        <td colspan="2" class="text-center">Silahkan berkunjung kembali</td>
    </tr>
</table>
