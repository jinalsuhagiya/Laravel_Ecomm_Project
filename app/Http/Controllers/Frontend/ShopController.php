<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    // All Products
    public function index()
    {
        $products = Product::with('category')->get();
        return view('shop', compact('products'));
    }

    // Category Wise Products
    public function category($id)
    {
        $category = Category::find($id);
        $products = Product::with('category')
            ->where('category_id', $id)
            ->get();

        return view('shop', compact('products', 'category'));
    }
}
