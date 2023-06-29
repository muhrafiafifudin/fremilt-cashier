<?php

namespace App\Http\Controllers\Main;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('pages.main.product', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        try {
            $image = $request->file('image');
            $image->move('assets/media/product', $image->getClientOriginalName());

            $image_url = $image->getClientOriginalName();

            $product = new Product();
            $product->product = $request->product;
            $product->category_id = $request->category_id;
            $product->image = $image_url;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->description = $request->description;
            $product->save();

            return redirect()->route('product.index')->with(['success' => 'Berhasil Menambahkan Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('product.index')->with(['error' => 'Gagal Menambahkan Data !!']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);

            $product = Product::findOrFail($id);
            $product->product = $request->product;
            $product->category_id = $request->category_id;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image->move('assets/media/product', $image->getClientOriginalName());

                $image_url = $image->getClientOriginalName();

                $product->image = $image_url;
            }

            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->description = $request->description;
            $product->update();

            return redirect()->route('product.index')->with(['success' => 'Berhasil Mengubah Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('product.index')->with(['error' => 'Gagal Mengubah Data !!']);
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $item = Product::findOrFail($id);
            $item->delete();

            return redirect()->route('product.index')->with(['success' => 'Berhasil Menghapus Data !!']);
        } catch (\Throwable $th) {
            return redirect()->route('product.index')->with(['error' => 'Gagal Menghapus Data !!']);
        }
    }
}
