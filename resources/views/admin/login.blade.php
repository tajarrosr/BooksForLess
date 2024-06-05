<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style scoped>
        @keyframes slideIn {
            from {
                transform: translateX(-1rem);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .animate-slide-in {
            animation: slideIn 0.5s ease-out forwards;
        }
    </style>
</head>
<body style="background-image: url('/assets/images/admin/admin_login_big.jpg'); background-size: cover; background-position: center;">
    <div class="flex justify-center items-center min-h-screen p-4">
        <div class="max-w-4xl w-full bg-white p-8 rounded-lg shadow-lg transform translate-y-0 opacity-100 transition-transform duration-500 animate-slide-in flex flex-col md:flex-row">
            <div class="w-full md:w-1/2 bg-cover bg-center" style="background-image: url('/assets/images/admin/admin_login_small.jpg');"></div>

            <div class="w-full md:w-1/2 p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Admin Login</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="mb-4">
                        <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-3 bg-gray-100 border-none placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" value="{{ old('email') }}" placeholder="Email">
                    </div>
                    <div class="mb-4">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-3 bg-gray-100 border-none placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm" placeholder="Password">
                    </div>
                    <div class="mb-4">
                        <input type="checkbox" class="form-check-input" id="show_password">
                        <label class="form-check-label" for="show_password">Show Password</label>
                    </div>
                    <div class="mb-4">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    <div>
                        <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-green-400 to-blue-500 text-white rounded-lg hover:bg-gradient-to-r focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-300">
                            Login
                        </button>
                    </div>
                </form>
                <div class="mt-3">
                    No account yet? <a href="{{ route('admin.register') }}" class="text-blue-500 hover:text-blue-700 font-bold">Register here</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('show_password').addEventListener('change', function () {
            const passwordField = document.getElementById('password');
            if (this.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
</body>
</html>
