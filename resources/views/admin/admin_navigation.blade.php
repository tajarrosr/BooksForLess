<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Navigation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            background-color: #f0f4f8;
            min-height: 100vh;
            transition: width 0.3s;
            border-right: 1px solid #ccc;
            width: 250px;
        }
        .sidebar.collapsed {
            width: 80px; 
        }
        .sidebar.collapsed .sidebar-text, 
        .sidebar.collapsed .brand {
            display: none;
        }
        .content {
            flex-grow: 1;
            transition: margin-left 0.3s;
            margin-left: 35px; 
        }
        .content.shifted {
            margin-left: 35px;
        }
        #toggle-button {
            background-color: #f0f4f8;
            padding: 0.5rem 1rem;
            border: none;
            cursor: pointer;
        }
        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f0f4f8;
            padding: 0.5rem 1rem; 
            border-bottom: 1px solid #ccc;
            position: sticky;
            top: 0;
            z-index: 10; 
        }
        .logo {
            width: 100px;
            height: 100px;
            transition: width 0.3s, height 0.3s;
        }
        .sidebar.collapsed .logo {
            width: 80px;
            height: 80px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: left; 
        }
        .sidebar ul li {
            display: flex;
            align-items: center;
            padding: 1rem 0; 
        }
        .sidebar ul li a {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 0.5rem 1rem;
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar ul li a:hover {
            background-color: #e2e8f0; 
            color: #1a202c;
        }
        .sidebar ul li a .fas {
            margin-right: 8px;
        }
        .sidebar.collapsed ul {
            text-align: center; 
        }
        .sidebar.collapsed ul li {
            justify-content: center;
        }
        .sidebar.collapsed ul li a {
            justify-content: center;
        }
        .sidebar.collapsed ul li a .fas {
            margin-right: 0;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">

<div class="flex">
    <aside id="sidebar" class="sidebar p-4">
        <a href="{{ route('admin.dashboard') }}" class="flex flex-col items-center space-y-2 mb-4">
            <img src="{{ asset('assets/images/admin/BooksForLess_Logo.png') }}" alt="Logo" class="logo">
            <span class="text-lg font-bold brand">BooksForLess</span>
        </a>
        <ul>
            <li class="py-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                    <i class="fas fa-home w-6 h-6"></i>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>
            <li class="py-2">
                <a href="{{ route('admin.inventory.index') }}" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                    <i class="fas fa-book w-6 h-6"></i>
                    <span class="sidebar-text">Books Inventory Management</span>
                </a>
            </li>
        </ul>
    </aside>
    <main class="flex-grow">
        <nav class="top-nav">
            <div class="flex items-center space-x-4">
                <button id="toggle-button" class="text-gray-700 focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <span class="text-gray-700">{{ Auth::guard('admin')->user()->name }}</span>
        </nav>
        <div id="content" class="content p-4" style="margin-top: 0;"> 
            @yield('content')
        </div>
    </main>
</div>

<script>
    document.getElementById('toggle-button').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('collapsed');
        document.getElementById('content').classList.toggle('shifted');
    });
</script>
</body>
</html>
