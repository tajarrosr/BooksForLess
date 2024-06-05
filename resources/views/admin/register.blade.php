<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style scoped>
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
        .animate-fade-in {
            animation: fadeIn 1s ease-in forwards;
            opacity: 0;
        }
    </style>
</head>
<body class="flex min-h-screen bg-gray-200 bg-cover bg-center" style="background-image: url('/assets/images/admin/admin_register.jpg');">
    <div class="w-full flex items-center justify-center p-4 sm:p-8">
        <div class="max-w-xl w-full bg-white p-6 sm:p-10 rounded-lg shadow-lg animate-fade-in">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Admin Registration</h2>
                <p class="text-gray-600">Welcome to the BooksForLess Admin Registration</p>
            </div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('admin.register') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="sr-only">Name</label>
                    <input id="name" name="name" type="text" required class="appearance-none rounded-full w-full px-4 py-3 bg-gray-100 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('name') }}" placeholder="Name">
                </div>
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none rounded-full w-full px-4 py-3 bg-gray-100 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('email') }}" placeholder="Email">
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required class="appearance-none rounded-full w-full px-4 py-3 bg-gray-100 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Password">
                </div>
                <div>
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="appearance-none rounded-full w-full px-4 py-3 bg-gray-100 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Confirm Password">
                </div>
                <div class="flex items-center mb-4">
                    <input type="checkbox" class="form-check-input" id="show_password">
                    <label class="form-check-label ml-2" for="show_password">Show Password</label>
                </div>
                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-full text-white bg-gradient-to-r from-green-400 to-blue-500 hover:from-green-500 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
                        Register
                    </button>
                </div>
            </form>
            <div class="mt-3 text-center">
                Already have an account? <a href="{{ route('admin.login') }}" class="text-blue-500 hover:text-blue-700 font-bold">Sign in here</a>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('show_password').addEventListener('change', function () {
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('password_confirmation');
            if (this.checked) {
                passwordField.type = 'text';
                confirmPasswordField.type = 'text';
            } else {
                passwordField.type = 'password';
                confirmPasswordField.type = 'password';
            }
        });
    </script>
</body>
</html>
