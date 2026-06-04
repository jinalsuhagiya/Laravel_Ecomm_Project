<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryController extends Controller
{
    use AuthorizesRequests;

    // LIST
   public function index()
{
    $this->authorize('viewAny', Category::class);
    // Fetch categories with pagination (e.g., 10 per page)
    return $categories = Category::latest()->paginate(10);
    exit();

    return view('admin.category.index', compact('categories'));
}

public function create()
{
    $this->authorize('create', Category::class);

    $parentCategories = Category::whereNull('parent_id')
        ->orderBy('name')
        ->get();

    return view('admin.category.create', compact('parentCategories'));
}

    // STORE
    public function store(Request $request)
    {
        $this->authorize('create', Category::class);

  $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        Category::create($request->only('name','parent_id'));

        return redirect()->route('category.index');
    }

    // EDIT
    public function edit(Category $category)
    {
        $this->authorize('update', $category);

      $categories = Category::all();
        return view('admin.category.edit', compact('category','categories'));
    }

    // UPDATE
    public function update(Request $request, Category $category)
    {
        $this->authorize('update', $category);

     $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable'
        ]);

        $category->update($request->only('name','parent_id'));

        return redirect()->route('category.index');
    }

    // DELETE
    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);

       $category->delete();

        return back();
    }
}
