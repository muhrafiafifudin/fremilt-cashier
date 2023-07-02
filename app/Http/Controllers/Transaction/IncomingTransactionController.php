<?php

namespace App\Http\Controllers\Transaction;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
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
