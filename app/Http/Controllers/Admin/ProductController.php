<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // 📄 Display All Products
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    // 📄 Show Create Form
    public function create()
    {
        $categories = Category::all(); // ✅ IMPORTANT
        return view('admin.products.create', compact('categories'));
    }

    // 💾 Store Product
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer',
            'category_id' => 'required',
            // 'image'       => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->all();

        // ✅ Slug
        $data['slug'] = Str::slug($request->name);

        // ✅ Image Upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product Added');
    }

    // 📄 Edit Form
    public function edit(Product $product)
    {
        $categories = Category::all(); // ✅ IMPORTANT
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // 🔄 Update Product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer',
            'category_id' => 'required',
            'image'       => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->all();

        // ✅ Slug
        $data['slug'] = Str::slug($request->name);

        // ✅ Image Update
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product Updated');
    }

    // ❌ Delete Product
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product Deleted');
    }
}
