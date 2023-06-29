<?php

namespace App\Http\Controllers\Main;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('pages.main.category', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $user = new Category();
            $user->category = $request->category;
            $user->save();

            return redirect()->route('category.index')->with('success', 'Berhasil Menambahkan Data !!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('category.index')->with('error', 'Gagal Menambahkan Data !!');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);

            $user = Category::findOrFail($id);
            $user->category = $request->category;
            $user->update();

            return redirect()->route('category.index')->with('success', 'Berhasil Mengubah Data !!');
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with('error', 'Gagal Mengubah Data !!');
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $categories = Category::findOrFail($id);
            $categories->delete();

            return redirect()->route('category.index')->with('success', 'Berhasil Menghapus Data !!');
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with('error', 'Gagal Menghapus Data !!');
        }
    }
}
