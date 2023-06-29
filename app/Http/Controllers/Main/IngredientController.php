<?php

namespace App\Http\Controllers\Main;

use App\Models\Category;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();

        return view('pages.main.ingredient', compact('ingredients'));
    }

    public function store(Request $request)
    {
        try {
            $ingredient = new Ingredient();
            $ingredient->ingredient = $request->ingredient;
            $ingredient->save();

            return redirect()->route('ingredient.index')->with('success', 'Berhasil Menambahkan Data !!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('ingredient.index')->with('error', 'Gagal Menambahkan Data !!');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);

            $ingredient = Ingredient::findOrFail($id);
            $ingredient->ingredient = $request->ingredient;
            $ingredient->update();

            return redirect()->route('ingredient.index')->with('success', 'Berhasil Mengubah Data !!');
        } catch (\Throwable $th) {
            return redirect()->route('ingredient.index')->with('error', 'Gagal Mengubah Data !!');
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $ingredient = Ingredient::findOrFail($id);
            $ingredient->delete();

            return redirect()->route('ingredient.index')->with('success', 'Berhasil Menghapus Data !!');
        } catch (\Throwable $th) {
            return redirect()->route('ingredient.index')->with('error', 'Gagal Menghapus Data !!');
        }
    }
}
