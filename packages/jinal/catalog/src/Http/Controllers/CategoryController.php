<?php

namespace jinal\catalog\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jinal\Catalog\Services\CategoryService;
use App\Models\Category;

class CategoryController extends Controller
{
    // use AuthorizesRequests;
    protected $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {

        $categories = $this->service->getAll();
        return view('catalog::category.index', compact('categories'));
    }

    public function create()
    {

        return view('catalog::category.create');
    }

    public function store(Request $request)
    {

        $request->validate([
        'name' => 'required'
    ]);

        $this->service->store($request->all());
        return redirect()->route('category.index');
    }

    public function edit($id)
    {

        $category = $this->service->getAll()->find($id);
        return view('catalog::category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {

         $request->validate([
        'name' => 'required'
    ]);
        $this->service->update($id, $request->all());
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return back();
    }

}
