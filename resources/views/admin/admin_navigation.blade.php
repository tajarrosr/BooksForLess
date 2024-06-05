<!DOCTYPE html>
<html>
<head>
    <title>Admin Navigation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style scoped>
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">BookForLess</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">{{ Auth::guard('admin')->user()->name }}</a>
            </li>
        </ul>
    </div>
</nav>
</body>
</html>
