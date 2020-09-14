<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;

class adminProductController extends Controller
{
    // Membuat Controller ini hanya dapat diaksis oleh admin
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    // Menampilkan list produk
    public function showProduct()
    {
        $product = Product::all();
    	return view('admin/product/list_product', ['product' => $product]);
    }

    // Menampilkan form tambah produk
    public function showForm()
    {
        return view('admin/product/add_product');
    }

    // Menyimpan produk ke database
    public function saveProduct(Request $request)
    {
        Product::create($request->all());
        return redirect('/admin/add/product')->with('success', 'Add Product Successfully');
    }

    // menampilkan form edit produk
    public function showEditForm($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('admin/product/edit_product', [
            'product' => $product,
        ]);
    }

    // Update produk
    public function edit(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $data_product = $request->all();
        $product->update($data_product);
        return redirect('admin/edit/product/'.$product_id)->with('success', 'Update Product Successfully');
    }

    // Hapus produk
    public function delete($product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->delete();
        return redirect('admin/product/')->with('success', 'Delete Product Successfully');
    }

}
