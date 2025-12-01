<?php

namespace App\Http\Controllers;

use App\Models\Product; // Panggil Model Product
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // MENAMPILKAN DAFTAR PRODUK (READ)
    public function index()
    {
        // Ambil semua data dari database
        $products = Product::all();
        // Kirim ke tampilan (view) yang nanti kita buat
        return view('products.index', compact('products'));
    }

    // MENYIMPAN PRODUK BARU (CREATE)
    public function store(Request $request)
    {
        // Validasi input (Sesuai PDF Hal 6)
        $request->validate([
            'sku' => 'required|unique:products',
            'name' => 'required',
            'stock' => 'required|integer'
        ]);

        // Simpan ke database
        Product::create($request->all());

        // Kembali ke halaman utama
        return redirect()->route('products.index')
                        ->with('success', 'Produk berhasil ditambahkan');
    }

    // UPDATE PRODUK (UPDATE)
    public function update(Request $request, Product $product)
    {
        // Validasi input
        $request->validate([
            'sku' => 'required',
            'name' => 'required',
            'stock' => 'required|integer'
        ]);

        // Update data (Sesuai PDF Hal 7)
        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('success', 'Produk berhasil diupdate');
    }

    // HAPUS PRODUK (DELETE)
    public function destroy(Product $product)
    {
        // Hapus data (Sesuai PDF Hal 7)
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success', 'Produk berhasil dihapus');
    }
}