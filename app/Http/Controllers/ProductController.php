<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Mendapatkan nilai pencarian dari parameter 'search'
        $products = Product::where('name', 'like', "%$search%")->get(); // Melakukan pencarian produk berdasarkan nama
        return view('pages.product.index', compact('products', 'search')); // Mengembalikan tampilan dengan data produk dan nilai pencarian
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // Validasi input nama, harga, dan stok 
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

    // Membuat produk baru dengan menggunakan metode create() dari model Product
        Product::create($request->all());

    // Redirect ke rute product dengan pesan success
        return redirect()->route('product')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('pages.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            // mengambil produk berdasarkan ID yang diberikan
        $product = Product::find($id);

        //update nama dan price dengan nilai yang diberikan dalam permintaan
        $product ->update( [
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('product')->with('success', 'Product updated successfully.');
    }


    public function updateStock(Request $request, $id)
    {
      // mengambil produk berdasarkan ID yang diberikan
        $product = Product::find($id);
     // memperbarui stok product dengan menambahkan stok yang baru ke stok yang sudah ada
        $product->update([
            'stock' => $request->stock + $product->stock,
        ]);
        return redirect()->route('product')->with('success', 'Stock updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         // mengambil produk berdasarkan ID yang diberikan
        $product = Product::find($id);
         // Menghapus produk dari penyimpanan
        $product->delete();
        
        return redirect()->route('product')->with('success', 'Product deleted successfully.');
    }
}