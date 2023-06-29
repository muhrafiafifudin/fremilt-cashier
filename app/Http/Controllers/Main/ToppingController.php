<?php

namespace App\Http\Controllers\Main;

use App\Models\Topping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class ToppingController extends Controller
{
    public function index()
    {
        $toppings = Topping::all();

        return view('pages.main.topping', compact('toppings'));
    }

    public function store(Request $request)
    {
        try {
            $topping = new Topping();
            $topping->topping = $request->topping;
            $topping->save();

            return redirect()->route('topping.index')->with('success', 'Berhasil Menambahkan Data !!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('topping.index')->with('error', 'Gagal Menambahkan Data !!');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);

            $topping = Topping::findOrFail($id);
            $topping->topping = $request->topping;
            $topping->update();

            return redirect()->route('topping.index')->with('success', 'Berhasil Mengubah Data !!');
        } catch (\Throwable $th) {
            return redirect()->route('topping.index')->with('error', 'Gagal Mengubah Data !!');
        }
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $topping = Topping::findOrFail($id);
            $topping->delete();

            return redirect()->route('topping.index')->with('success', 'Berhasil Menghapus Data !!');
        } catch (\Throwable $th) {
            return redirect()->route('topping.index')->with('error', 'Gagal Menghapus Data !!');
        }
    }
}
