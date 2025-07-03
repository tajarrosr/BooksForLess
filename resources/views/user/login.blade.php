@include('partials.__header')
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center p-4">
    <x-nav/>
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h2>
                <p class="text-gray-600">Sign in to your account</p>
            </div>
            
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <ul class="text-sm text-red-600 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username or Email</label>
                    <input id="username" name="username" type="text" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                           placeholder="Enter your username or email" 
                           value="{{ old('username') }}">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required 
                               class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                               placeholder="Enter your password">
                        <button type="button" onclick="togglePasswordVisibility('password')" 
                                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg id="password-toggle-icon" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Sign In
                </button>
            </form>
            
            <div class="mt-8 text-center">
                <p class="text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 font-medium hover:underline">
                        Create one here
                    </a>
                </p>
            </div>
        </div>
    </div>
    <script>
        function togglePasswordVisibility(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(`${fieldId}-toggle-icon`);
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.replace('text-gray-400', 'text-gray-600');
            } else {
                field.type = 'password';
                icon.classList.replace('text-gray-600', 'text-gray-400');
            }
        }
    </script>
</body>
@include('partials.__footer')
