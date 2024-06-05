@include('partials.__header')
<body class="bg-background-100 font-iphone">
    <x-nav/>
    <div class="container mx-auto p-8">
        <div class="max-w-md mx-auto bg-background-200 p-8 rounded-lg shadow-lg">
            <h2 class="text-4xl font-bold mb-6 text-center text-text-900 font-butler">Customer Login</h2>
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-sm text-error-700">
                        @foreach ($errors->all() as $error)
                            <li class="text-center list-none">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="username" class="sr-only">Username or Email Address</label>
                    <input id="username" name="username" type="text" required class="appearance-none rounded w-full px-3 py-2 bg-background-50 border border-accent-300 text-secondary-900 focus:outline-none focus:ring-accent-500 focus:border-accent-500 sm:text-sm" placeholder="Username or Email Address" value="{{ old('username') }}">
                </div>
                <div class="mb-4 relative">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required class="appearance-none rounded w-full px-3 py-2 bg-background-50 border border-accent-300 text-secondary-900 focus:outline-none focus:ring-accent-500 focus:border-accent-500 sm:text-sm" placeholder="Password">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" onclick="togglePasswordVisibility('password')" class="focus:outline-none">
                            <svg id="password-toggle-icon" class="h-5 w-5 text-text-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 01-9 9m0 0a9 9 0 01-9-9m9-9a9 9 0 019 9m0 0a9 9 0 01-9 9m0 0a9 9 0 01-9-9" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <button type="submit" class="w-full py-3 px-4 border border-transparent text-lg font-bold rounded-md text-text-50 bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">Login</button>
                </div>
            </form>
            <div class="mt-6 text-center">
                <a href="{{ route('register') }}" class="text-accent-600 hover:text-accent-500 hover:decoration-4">Don't have an account? Register</a>
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
@include('partials.__footer')
