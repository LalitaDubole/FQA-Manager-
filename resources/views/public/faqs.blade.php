@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Frequently Asked Questions</h1>

    @forelse($categories as $category)
        <h3 class="mt-4">{{ $category->name }}</h3>
        <div class="accordion mb-4" id="accordion-{{ $category->id }}">
            @foreach($category->publishedFaqs as $faq)
                <div class="card">
                    <div class="card-header" id="heading-{{ $faq->id }}">
                        <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $faq->id }}">
                            {{ $faq->question }}
                        </button>
                    </div>
                    <div id="collapse-{{ $faq->id }}" class="collapse" data-bs-parent="#accordion-{{ $category->id }}">
                        <div class="card-body">
                            {{ $faq->answer }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @empty
        <p>No FAQs available right now.</p>
    @endforelse
</div>
@endsection