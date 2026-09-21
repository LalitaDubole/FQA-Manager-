<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;

class FaqPublicController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::orderBy('order')
            ->with(['publishedFaqs'])
            ->get()
            ->filter(fn ($category) => $category->publishedFaqs->isNotEmpty());

        return view('public.faqs', compact('categories'));
    }
}