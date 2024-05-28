<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Welcome to Admin Dashboard</h2>
    <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
            <p>Welcome, {{ Auth::guard('admin')->user()->name }}!</p>
            <p>This is the admin dashboard.</p>
        </div>
    </div>
</div>
</body>
</html>
