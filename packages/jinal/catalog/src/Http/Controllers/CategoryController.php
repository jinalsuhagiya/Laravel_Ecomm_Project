<?php

namespace jinal\catalog\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    use AuthorizesRequests;
    public function __construct()
    {

    }

    public function index()
    {
        // $this->authorize('viewAny', Category::class);

        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('create', Category::class);

        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Category::class);

        $request->validate([
            'name' => 'required'
        ]);

        Category::create($request->only('name'));

        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        $this->authorize('update', $category);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->authorize('update', $category);

        $category->update($request->only('name'));

        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);

        $category->delete();

        return back();
    }
}
