<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">Customer Register</h2>
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label for="first_name" class="sr-only">First Name</label>
                    <input id="first_name" name="first_name" type="text" required class="appearance-none rounded w-full px-3 py-2 bg-gray-100 border border-gray-300 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="First Name" value="{{ old('first_name') }}">
                </div>
                <div class="mb-4">
                    <label for="last_name" class="sr-only">Last Name</label>
                    <input id="last_name" name="last_name" type="text" required class="appearance-none rounded w-full px-3 py-2 bg-gray-100 border border-gray-300 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Last Name" value="{{ old('last_name') }}">
                </div>
                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input id="username" name="username" type="text" required class="appearance-none rounded w-full px-3 py-2 bg-gray-100 border border-gray-300 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Username" value="{{ old('username') }}">
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Email Address</label>
                    <input id="email" name="email" type="email" required class="appearance-none rounded w-full px-3 py-2 bg-gray-100 border border-gray-300 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Email Address" value="{{ old('email') }}">
                </div>
                <div class="mb-4 relative">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required class="appearance-none rounded w-full px-3 py-2 bg-gray-100 border border-gray-300 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Password">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" onclick="togglePasswordVisibility('password')" class="focus:outline-none">
                            <svg id="password-toggle-icon" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 01-9 9m0 0a9 9 0 01-9-9m9-9a9 9 0 019 9m0 0a9 9 0 01-9 9m0 0a9 9 0 01-9-9m9-9a9 9 0 019 9m0 0a9 9 0 01-9 9m0 0a9 9 0 01-9-9" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mb-4 relative">
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none rounded w-full px-3 py-2 bg-gray-100 border border-gray-300 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Confirm Password">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" onclick="togglePasswordVisibility('password_confirmation')" class="focus:outline-none">
                            <svg id="password-confirmation-toggle-icon" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 01-9 9m0 0a9 9 0 01-9-9m9-9a9 9 0 019 9m0 0a9 9 0 01-9 9m0 0a9 9 0 01-9-9m9-9a9 9 0 019 9m0 0a9 9 0 01-9 9m0 0a9 9 0 01-9-9" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <button type="submit" class="w-full py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</button>
                </div>
            </form>
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500">Already have an account? Login</a>
            </div>
        </div>
    </div>
    <script>
        function togglePasswordVisibility(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(`${fieldId}-toggle-icon`);
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.replace('text-gray-500', 'text-gray-700');
            } else {
                field.type = 'password';
                icon.classList.replace('text-gray-700', 'text-gray-500');
            }
        }
    </script>
</body>
</html>
