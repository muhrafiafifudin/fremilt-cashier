<?php

namespace App\Http\Controllers\Transaction;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IncomingTransactionController extends Controller
{
    public function index()
    {
        return view('pages.transaction.incoming_transaction.incoming_transaction');
    }

    public function create()
    {
        $products = Product::all();
        $cart_items = Cart::where([['user_id', Auth::id()], ['type', 1]])->get();

        return view('pages.transaction.incoming_transaction.add_incoming_transaction', compact('products', 'cart_items'));
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('pages.transaction.incoming_transaction.detail_incoming_transaction', compact('transaction'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $transaction = new Transaction();
        $transaction->order_number = rand(0000000000, 9999999999);
        $transaction->user_id = Auth::id();
        $transaction->name = $request->name;
        $transaction->total = $request->total;
        $transaction->note = $request->note;
        $transaction->type = 1;
        $transaction->save();

        $cart_items = Cart::where([['user_id', Auth::id()], ['type', 1]])->get();

        foreach ($cart_items as $cart_item) {
            $transaction_details = new TransactionDetail();
            $transaction_details->transaction_id = $transaction->id;
            $transaction_details->product_id = $cart_item->product_id;
            $transaction_details->product_qty = $cart_item->product_qty;
            $transaction_details->save();
        }

        $cart_items = Cart::where([['user_id', Auth::id()], ['type', 1]])->get();
        Cart::destroy($cart_items);

        // return view('pages.transaction.incoming_transaction.detail_incoming_transaction');
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
