<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan halaman utama
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required|unique:products',
            'name' => 'required',
            'stock' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
                        ->with('success', 'Produk berhasil ditambahkan');
    }

    // Menampilkan halaman edit
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update data
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'sku' => 'required',
            'name' => 'required',
            'stock' => 'required|integer',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('success', 'Produk berhasil diperbarui');
    }

    // Hapus data
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success', 'Produk berhasil dihapus');
    }
}