@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Category</h2>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Order</label>
            <input type="number" name="order" class="form-control" value="0">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection