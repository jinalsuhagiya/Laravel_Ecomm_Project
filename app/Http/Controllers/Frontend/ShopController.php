<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    // All Products + Categories (for menu)
    public function index()
    {
        $products = Product::with('category')->get();
        return view('shop', compact('products'));
    }

    // Category Wise (WITH CHILD PRODUCTS 🔥)
    public function category($id)
    {
        $category = Category::with('children')->findOrFail($id);

        // 🔁 Get all ids (parent + child)
        $ids = $this->getCategoryIds($category);

        $products = Product::with('category')
            ->whereIn('category_id', $ids)
            ->get();
        return view('shop', compact('products', 'category'));
    }

    // 🔁 Recursive function
    private function getCategoryIds($category)
    {
        $ids = [$category->id];

        foreach ($category->children as $child) {
            $ids = array_merge($ids, $this->getCategoryIds($child));
        }

        return $ids;
    }
}
