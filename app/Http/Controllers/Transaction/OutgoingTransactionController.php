<?php

namespace App\Http\Controllers\Transaction;

use PDF;
use Midtrans;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Product;
use Mike42\Escpos\Printer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Mike42\Escpos\CapabilityProfile;
use Illuminate\Support\Facades\Crypt;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class OutgoingTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('type', 2)->get();

        return view('pages.transaction.outgoing_transaction.transaction.outgoing_transaction', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        $cart_items = Cart::where([['user_id', Auth::id()], ['type', 2]])->get();

        return view('pages.transaction.outgoing_transaction.new_transaction.add_outgoing_transaction', compact('products', 'cart_items'));
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);

        $transaction = Transaction::findOrFail($id);
        $transaction_details = TransactionDetail::where('transaction_id', $id)->get();

        $payment = Payment::where('order_number', $transaction->order_number)->first();

        return view('pages.transaction.outgoing_transaction.transaction.detail_outgoing_transaction', compact('transaction', 'transaction_details', 'payment'));
    }

    public function store(Request $request)
    {
        $transaction = new Transaction();
        $transaction->order_number = rand(0000000000, 9999999999);
        $transaction->user_id = Auth::id();
        $transaction->name = $request->name;
        $transaction->total = $request->total;
        $transaction->type = 2;
        $transaction->save();

        $cart_items = Cart::where([['user_id', Auth::id()], ['type', 2]])->get();

        foreach ($cart_items as $cart_item) {
            $transaction_details = new TransactionDetail();
            $transaction_details->transaction_id = $transaction->id;
            $transaction_details->product_id = $cart_item->product_id;
            $transaction_details->product_qty = $cart_item->product_qty;
            $transaction_details->save();
        }

        $cart_items = Cart::where([['user_id', Auth::id()], ['type', 2]])->get();
        Cart::destroy($cart_items);

        $transaction_id = Crypt::encrypt($transaction->id);

        return redirect()->route('outgoing-transaction.confirm', $transaction_id)->with(['success' => 'Lanjutkan untuk proses bayar !!']);
    }

    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);

        $payment_type = intval($request->payment_type);

        $transaction = Transaction::findOrFail($id);
        $transaction->name = $request->name;
        $transaction->payment_type = $payment_type;
        $transaction->update();

        $id = Crypt::encrypt($id);
        $payment_type = Crypt::encrypt($payment_type);

        return redirect()->route('outgoing-transaction.payment', ['outgoingTransaction' => $id, 'paymentType' => $payment_type]);
    }

    public function confirmTransaction($id)
    {
        $id = Crypt::decrypt($id);

        $transaction = Transaction::findOrFail($id);
        $transaction_details = TransactionDetail::where('transaction_id', $id)->get();

        return view('pages.transaction.outgoing_transaction.new_transaction.confirm_outgoing_transaction', compact('transaction', 'transaction_details'));
    }

    public function payment($id, $type)
    {
        $id = Crypt::decrypt($id);

        $transaction = Transaction::findOrFail($id);
        $transaction_details = TransactionDetail::where('transaction_id', $id)->get();

        // foreach ($transaction_details as $transaction_detail) {
        //     $item_details[] = array(
        //         'id' => $transaction_detail->products_id,
        //         'price' => $transaction_detail->product->price,
        //         'quantity' => $transaction_detail->product_qty,
        //         'name' => $transaction_detail->product->product
        //     );
        // }

        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => $transaction->id . '-' . rand(),
        //         'gross_amount' => $transaction->total,
        //     ),
        //     'item_details' => $item_details,
        //     'customer_details' => array(
        //         'first_name' => $transaction->name,
        //         'last_name' => '',
        //     )
        // );

        // $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pages.transaction.outgoing_transaction.new_transaction.payment_outgoing_transaction', compact('transaction', 'transaction_details'));
    }

    public function paymentPost(Request $request)
    {
        $order_number = $request->order_number;

        $transaction = Transaction::where('order_number', $order_number)->first();
        $transaction_details = TransactionDetail::where('transaction_id', $transaction->id)->get();

        foreach ($transaction_details as $transaction_detail) {
            $product = Product::where('id', $transaction_detail->product_id)->first();
            $product->stock -= $transaction_detail->product_qty;
            $product->update();
        }

        $transaction_id = Crypt::encrypt($transaction->id);


        if ($request->money_change == 0) {
            $pay = $transaction->total;
        } else {
            $pay = $transaction->total + $request->money_change;
        }

        $payment = new Payment();
        $payment->order_number = $order_number;
        $payment->gross_amount = $transaction->total;
        $payment->payment_type = 'cash';
        $payment->status_code = '200';
        $payment->transaction_status = 'paid';
        $payment->transaction_time = Carbon::now();
        $payment->payment = $pay;
        $payment->money_change = $request->money_change;
        $payment->save();

        return redirect()->route('outgoing-transaction.show', $transaction_id);
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $ingredient = Transaction::findOrFail($id);
            $ingredient->delete();

            return redirect()->route('outgoing-transaction.index')->with('success', 'Berhasil Menghapus Data !!');
        } catch (\Throwable $th) {
            return redirect()->route('outgoing-transaction.index')->with('error', 'Gagal Menghapus Data !!');
        }
    }

    public function addProduct(Request $request)
    {
        try {
            if (Auth::check()) {
                $product_id = $request->product_id;

                $product_check = Product::where('id', $product_id)->first();

                if (Cart::where([['product_id', $product_id], ['user_id', Auth::id()], ['type', 2]])->exists()) {
                    return redirect()->route('outgoing-transaction.create')->with('warning', $product_check->product . ' Sudah Ditambahkan !!');
                } else {
                    $cartItem = new Cart();
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_id = $product_id;
                    $cartItem->product_qty = 1;
                    $cartItem->type = 2;
                    $cartItem->save();

                    return redirect()->route('outgoing-transaction.create')->with('success', $product_check->product . ' Berhasil Ditambahkan !!');
                }
            }
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('outgoing-transaction.create')->with('error', 'Gagal Menambahkan Barang !!');
        }
    }

    public function updateProduct(Request $request)
    {
        $product_id = intval($request->product_id);
        $product_qty = intval($request->product_qty);

        if (Auth::check()) {
            if (Cart::where([['product_id', $product_id], ['user_id', Auth::id()], ['type', 2]])->exists()) {
                $cart = Cart::where([['product_id', $product_id], ['user_id', Auth::id()], ['type', 2]])->first();
                $cart->product_qty = $product_qty;
                $cart->update();

                return response()->json(['status' => 'Success !!']);
            }
        } else {
            return response()->json(['status' => 'Warning !!']);
        }
    }

    public function deleteProduct(Request $request)
    {
        if (Auth::check()) {
            $product_id = intval($request->product_id);

            if (Cart::where([['product_id', $product_id], ['user_id', Auth::id()], ['type', 2]])->exists()) {
                $cart = Cart::where([['product_id', $product_id], ['user_id', Auth::id()], ['type', 2]])->first();
                $cart->delete();

                return response()->json(['status' => 'Success !!']);
            }
        } else {
            return response()->json(['status' => 'Warning !!']);
        }
    }

    public function pdf_print($id)
    {
        $id = Crypt::decrypt($id);

        $transaction = Transaction::where('id', $id)->first();
        $transaction_details = TransactionDetail::where('transaction_id', $id)->get();

        $payment = Payment::where('order_number', $transaction->order_number)->first();

        try {
            $connector = new WindowsPrintConnector("POS-58");

            $printer = new Printer($connector);
            $printer->initialize();

            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("Fremilt Solo Baru\n");
            $printer->text("Jalan Kenangan No. 12\n");
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->feed();
            $printer->text("===============================\n");
            $printer->text("No. Nota    : ");
            $printer->text($transaction->order_number . "\n");
            $printer->text("Kasir       : ");
            $printer->text($transaction->user->name . "\n");
            $printer->text("-------------------------------\n");

            foreach ($transaction_details as $transaction_detail) {
                $printer->text(str_pad($transaction_detail->product_qty . ' x ' . $transaction_detail->product->product, 20, " ", STR_PAD_RIGHT) . str_pad(number_format($transaction_detail->product_qty * $transaction_detail->product->price, 0), 10, " ", STR_PAD_LEFT) . "\n");
            }

            $printer->text("-------------------------------\n");
            $printer->text(str_pad("Total Tagihan", 20, " ", STR_PAD_RIGHT) . str_pad(number_format($payment->gross_amount, 0), 10, " ", STR_PAD_LEFT) . "\n");
            $printer->text("-------------------------------\n");
            $printer->text(str_pad("Total Bayar", 20, " ", STR_PAD_RIGHT) . str_pad(number_format($payment->payment, 0), 10, " ", STR_PAD_LEFT) . "\n");
            $printer->text(str_pad("Kembalian", 20, " ", STR_PAD_RIGHT) . str_pad(number_format($payment->money_change, 0), 10, " ", STR_PAD_LEFT) . "\n");
            $printer->text("===============================\n");
            $printer->feed();
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("Terima Kasih\n");
            $printer->text("Silahkan Berkunjung Kembali\n");
            $printer->cut();
            $printer->close();

            return view('pages.transaction.outgoing_transaction.transaction.detail_outgoing_transaction', compact('transaction', 'transaction_details', 'payment'))->with('success', 'Berhasil Mencetak Data !!');
        } catch (\Exception $e) {
            return view('pages.transaction.outgoing_transaction.transaction.detail_outgoing_transaction', compact('transaction', 'transaction_details', 'payment'))->with('error', 'Gagal Mencetak Data !!');
        }
    }
}
