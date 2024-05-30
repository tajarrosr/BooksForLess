<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40;
            color: #fff;
        }
        .card {
            background-color: #495057;
        }
        .card a {
            color: #fff;
            text-decoration: none;
        }
        .navbar, .navbar-brand, .nav-link {
            color: #fff;
        }
    </style>
</head>
<body>
    @include('admin.admin_navigation')
    <div class="container mt-5">
        @yield('content')
    </div>
</body>
</html>
