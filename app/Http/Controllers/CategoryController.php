<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('category.index',[
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(StoreCategoryRequest $request){
        Category::create($request->validated());
        return redirect()->back()->with(['success' => 'Category created successfully!']);
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->back()->with(['success' => 'Category updated successfully!']);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with(['success' => 'Category deleted successfully!']);
    }
}
