@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage FAQs</h2>
    <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary mb-3">+ Add FAQ</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Category</th>
                <th>Question</th>
                <th>Order</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faqs as $faq)
            <tr>
                <td>{{ $faq->category->name }}</td>
                <td>{{ $faq->question }}</td>
                <td>{{ $faq->order }}</td>
                <td>
                    <form action="{{ route('admin.faqs.toggle-publish', $faq) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm {{ $faq->is_published ? 'btn-success' : 'btn-secondary' }}">
                            {{ $faq->is_published ? 'Published' : 'Unpublished' }}
                        </button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this FAQ?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection