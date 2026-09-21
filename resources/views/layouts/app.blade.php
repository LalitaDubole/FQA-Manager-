<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FAQ Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark px-3">
        <span class="navbar-brand">FAQ Manager</span>
        <div>
            <a href="{{ route('admin.categories.index') }}" class="text-white me-3">Categories</a>
            <a href="{{ route('admin.faqs.index') }}" class="text-white me-3">FAQs</a>
            <a href="{{ route('faqs.public') }}" class="text-white">Public Page</a>
        </div>
    </nav>

    <div class="py-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>