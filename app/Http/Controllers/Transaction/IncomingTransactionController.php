<?php

namespace App\Http\Controllers\Transaction;

use Midtrans;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class IncomingTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('payment')->where('type', 1)->get();

        return view('pages.transaction.incoming_transaction.transaction.incoming_transaction', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        $cart_items = Cart::where([['user_id', Auth::id()], ['type', 1]])->get();

        return view('pages.transaction.incoming_transaction.new_transaction.add_incoming_transaction', compact('products', 'cart_items'));
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);

        $transaction = Transaction::findOrFail($id);
        $transaction_details = TransactionDetail::where('transaction_id', $id)->get();

        $payment = Payment::where('order_number', $transaction->order_number)->first();

        return view('pages.transaction.incoming_transaction.transaction.detail_incoming_transaction', compact('transaction', 'transaction_details', 'payment'));
    }

    public function store(Request $request)
    {
        $transaction = new Transaction();
        $transaction->order_number = rand(0000000000, 9999999999);
        $transaction->user_id = Auth::id();
        $transaction->name = $request->name;
        $transaction->total = $request->total;
        $transaction->type = 1;
        $transaction->save();

        $cart_items = Cart::where([['user_id', Auth::id()], ['type', 1]])->get();

        foreach ($cart_items as $cart_item) {
            $transaction_details = new TransactionDetail();
            $transaction_details->transaction_id = $transaction->id;
            $transaction_details->product_id = $cart_item->product_id;
            $transaction_details->product_qty = $cart_item->product_qty;
            $transaction_details->save();

            $product = Product::where('id', $cart_item->product_id)->first();
            $product->stock += $cart_item->product_qty;
            $product->update();
        }

        $cart_items = Cart::where([['user_id', Auth::id()], ['type', 1]])->get();
        Cart::destroy($cart_items);

        $transaction_id = Crypt::encrypt($transaction->id);

        // return redirect()->route('incoming-transaction.confirm', $transaction_id)->with(['success' => 'Lanjutkan untuk proses bayar !!']);
        return redirect()->route('incoming-transaction.show', $transaction_id);
    }

    // public function store(Request $request)
    // {
    //     $transaction = new Transaction();
    //     $transaction->order_number = rand(0000000000, 9999999999);
    //     $transaction->user_id = Auth::id();
    //     $transaction->name = $request->name;
    //     $transaction->total = $request->total;
    //     $transaction->type = 1;
    //     $transaction->save();

    //     $cart_items = Cart::where([['user_id', Auth::id()], ['type', 1]])->get();

    //     foreach ($cart_items as $cart_item) {
    //         $transaction_details = new TransactionDetail();
    //         $transaction_details->transaction_id = $transaction->id;
    //         $transaction_details->product_id = $cart_item->product_id;
    //         $transaction_details->product_qty = $cart_item->product_qty;
    //         $transaction_details->save();
    //     }

    //     $cart_items = Cart::where([['user_id', Auth::id()], ['type', 1]])->get();
    //     Cart::destroy($cart_items);

    //     $transaction_id = Crypt::encrypt($transaction->id);

    //     return redirect()->route('incoming-transaction.confirm', $transaction_id)->with(['success' => 'Lanjutkan untuk proses bayar !!']);
    // }

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

        return redirect()->route('incoming-transaction.payment', ['incomingTransaction' => $id, 'paymentType' => $payment_type]);
    }

    public function confirmTransaction($id)
    {
        $id = Crypt::decrypt($id);

        $transaction = Transaction::findOrFail($id);
        $transaction_details = TransactionDetail::where('transaction_id', $id)->get();

        return view('pages.transaction.incoming_transaction.new_transaction.confirm_incoming_transaction', compact('transaction', 'transaction_details'));
    }

    public function payment($id, $type)
    {
        $id = Crypt::decrypt($id);

        $transaction = Transaction::findOrFail($id);
        $transaction_details = TransactionDetail::where('transaction_id', $id)->get();

        foreach ($transaction_details as $transaction_detail) {
            $item_details[] = array(
                'id' => $transaction_detail->products_id,
                'price' => $transaction_detail->product->price,
                'quantity' => $transaction_detail->product_qty,
                'name' => $transaction_detail->product->product
            );
        }

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');

        $params = array(
            'transaction_details' => array(
                'order_id' => $transaction->id . '-' . rand(),
                'gross_amount' => $transaction->total,
            ),
            'item_details' => $item_details,
            'customer_details' => array(
                'first_name' => $transaction->name,
                'last_name' => '',
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pages.transaction.incoming_transaction.new_transaction.payment_incoming_transaction', compact('transaction', 'transaction_details', 'snapToken'));
    }

    public function paymentPost(Request $request)
    {
        $order_number = $request->order_number;

        $transaction = Transaction::where('order_number', $order_number)->first();

        $transaction_id = Crypt::encrypt($transaction->id);

        if ($request->money_change == 0) {
            $pay = 0;
        } else {
            $pay = $transaction->total + $request->money_change;
        }

        if ($transaction->payment_type == 1) {
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

            return redirect()->route('incoming-transaction.show', $transaction_id);
        } else {
            $json = json_decode($request->get('json'));

            $payment = new Payment();
            $payment->order_number = $order_number;
            $payment->order_id = $json->order_id;
            $payment->transaction_id = $json->transaction_id;
            $payment->gross_amount = $json->gross_amount;
            $payment->payment_type = $json->payment_type;
            $payment->status_code = $json->status_code;
            $payment->transaction_time = $json->transaction_time;

            $transaction_status = $json->transaction_status;
            $fraud = !empty($json->fraud_status) ? $json->fraud_status : '';

            if ($transaction_status == 'capture') {
                if ($fraud == 'challenge') {
                    // TODO Set payment status in merchant's database to 'challenge'
                    $payment->transaction_status = 'pending';
                } else if ($fraud == 'accept') {
                    // TODO Set payment status in merchant's database to 'success'
                    $payment->transaction_status = 'paid';
                }
            } else if ($transaction_status == 'cancel') {
                if ($fraud == 'challenge') {
                    // TODO Set payment status in merchant's database to 'failure'
                    $payment->transaction_status = 'failed';
                } else if ($fraud == 'accept') {
                    // TODO Set payment status in merchant's database to 'failure'
                    $payment->transaction_status = 'failed';
                }
            } else if ($transaction_status == 'deny') {
                // TODO Set payment status in merchant's database to 'failure'
                $payment->transaction_status = 'failed';
            } else if ($transaction_status == 'settlement') {
                // TODO set payment status in merchant's database to 'Settlement'
                $payment->transaction_status = 'paid';
            } else if ($transaction_status == 'pending') {
                // TODO set payment status in merchant's database to 'Pending'
                $payment->transaction_status = 'pending';
            } else if ($transaction_status == 'expire') {
                // TODO set payment status in merchant's database to 'expire'
                $payment->transaction_status = 'failed';
            }

            $payment->save();

            return redirect()->route('incoming-transaction.index');
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $ingredient = Transaction::findOrFail($id);
            $ingredient->delete();

            return redirect()->route('incoming-transaction.index')->with('success', 'Berhasil Menghapus Data !!');
        } catch (\Throwable $th) {
            return redirect()->route('incoming-transaction.index')->with('error', 'Gagal Menghapus Data !!');
        }
    }

    public function addProduct(Request $request)
    {
        try {
            if (Auth::check()) {
                $product_id = $request->product_id;

                $product_check = Product::where('id', $product_id)->first();

                if (Cart::where([['product_id', $product_id], ['user_id', Auth::id()], ['type', 1]])->exists()) {
                    return redirect()->route('incoming-transaction.create')->with('warning', $product_check->product . ' Sudah Ditambahkan !!');
                } else {
                    $cartItem = new Cart();
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_id = $product_id;
                    $cartItem->product_qty = 1;
                    $cartItem->type = 1;
                    $cartItem->save();

                    return redirect()->route('incoming-transaction.create')->with('success', $product_check->product . ' Berhasil Ditambahkan !!');
                }
            }
        } catch (\Throwable $th) {
            return redirect()->route('incoming-transaction.create')->with('error', 'Gagal Menambahkan Barang !!');
        }
    }

    public function updateProduct(Request $request)
    {
        $product_id = intval($request->product_id);
        $product_qty = intval($request->product_qty);

        if (Auth::check()) {
            if (Cart::where([['product_id', $product_id], ['user_id', Auth::id()], ['type', 1]])->exists()) {
                $cart = Cart::where([['product_id', $product_id], ['user_id', Auth::id()], ['type', 1]])->first();
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

            if (Cart::where([['product_id', $product_id], ['user_id', Auth::id()], ['type', 1]])->exists()) {
                $cart = Cart::where([['product_id', $product_id], ['user_id', Auth::id()], ['type', 1]])->first();
                $cart->delete();

                return response()->json(['status' => 'Success !!']);
            }
        } else {
            return response()->json(['status' => 'Warning !!']);
        }
    }
}
