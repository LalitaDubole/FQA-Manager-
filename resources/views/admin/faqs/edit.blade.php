@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit FAQ</h2>
    <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Category</label>
            <select name="faq_category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $faq->faq_category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Question</label>
            <input type="text" name="question" class="form-control" value="{{ $faq->question }}" required>
        </div>
        <div class="mb-3">
            <label>Answer</label>
            <textarea name="answer" class="form-control" rows="4" required>{{ $faq->answer }}</textarea>
        </div>
        <div class="mb-3">
            <label>Order</label>
            <input type="number" name="order" class="form-control" value="{{ $faq->order }}">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="is_published" class="form-check-input" id="is_published" {{ $faq->is_published ? 'checked' : '' }}>
            <label class="form-check-label" for="is_published">Published</label>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection