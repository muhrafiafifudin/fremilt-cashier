<?php

namespace App\Http\Controllers\Main;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('pages.main.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $category = $request->all();

            Category::create($category);

            return redirect()->route('category.index')->with('success', 'Berhasil Menambahkan Data !!');
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with('error', 'Gagal Menambahkan Data !!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $id = Crypt::decrypt($id);

            $category = $request->all();

            $categories = Category::findOrFail($id);
            $categories->update($category);

            return redirect()->route('category.index')->with('success', 'Berhasil Mengubah Data !!');
        } catch (\Throwable $th) {
            return redirect()->route('category.index')->with('error', 'Gagal Mengubah Data !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
