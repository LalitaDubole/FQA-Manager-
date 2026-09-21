<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::orderBy('order')->withCount('faqs')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        FaqCategory::create($request->only('name', 'order'));

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(FaqCategory $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, FaqCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $category->update($request->only('name', 'order'));

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(FaqCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}