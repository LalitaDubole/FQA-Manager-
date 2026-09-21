<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('category')->orderBy('faq_category_id')->orderBy('order')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $categories = FaqCategory::orderBy('name')->get();
        return view('admin.faqs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        Faq::create([
            'faq_category_id' => $request->faq_category_id,
            'question' => $request->question,
            'answer' => $request->answer,
            'order' => $request->order ?? 0,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        $categories = FaqCategory::orderBy('name')->get();
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $faq->update([
            'faq_category_id' => $request->faq_category_id,
            'question' => $request->question,
            'answer' => $request->answer,
            'order' => $request->order ?? 0,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ deleted successfully.');
    }

    public function togglePublish(Faq $faq)
    {
        $faq->update(['is_published' => !$faq->is_published]);
        return back()->with('success', 'FAQ status updated.');
    }
}