<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BooksForLess')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-background">
    <!-- No Navigation -->
    <!-- No Header -->
    
    <!-- Main Content Only -->
    <main>
        @yield('content')
    </main>
    
    <!-- No Footer -->
    
    @stack('scripts')
</body>
</html>
