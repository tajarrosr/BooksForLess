@include('partials.__header')
<body class="min-h-screen bg-gradient-to-br from-green-50 to-emerald-100 flex items-center justify-center p-4">
    <x-nav/>
    <div class="w-full max-w-lg">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Create Account</h2>
                <p class="text-gray-600">Join our community of book lovers</p>
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
            
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                        <input id="first_name" name="first_name" type="text" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" 
                               placeholder="First name" 
                               value="{{ old('first_name') }}">
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                        <input id="last_name" name="last_name" type="text" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" 
                               placeholder="Last name" 
                               value="{{ old('last_name') }}">
                    </div>
                </div>
                
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <input id="username" name="username" type="text" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" 
                           placeholder="Choose a username" 
                           value="{{ old('username') }}">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input id="email" name="email" type="email" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" 
                           placeholder="your@email.com" 
                           value="{{ old('email') }}">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required 
                               class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" 
                               placeholder="Create a password">
                        <button type="button" onclick="togglePasswordVisibility('password')" 
                                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg id="password-toggle-icon" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <div class="relative">
                        <input id="password_confirmation" name="password_confirmation" type="password" required 
                               class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" 
                               placeholder="Confirm your password">
                        <button type="button" onclick="togglePasswordVisibility('password_confirmation')" 
                                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg id="password-confirmation-toggle-icon" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <div>
                    <label for="picture" class="block text-sm font-medium text-gray-700 mb-2">Profile Picture</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="picture" class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                    <span>Upload a file</span>
                                    <input id="picture" name="picture" type="file" class="sr-only" accept="image/jpeg,image/jpg,image/png">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, JPEG up to 2MB</p>
                        </div>
                    </div>
                </div>
                
                <button type="submit" 
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Create Account
                </button>
            </form>
            
            <div class="mt-8 text-center">
                <p class="text-gray-600">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-green-600 hover:text-green-700 font-medium hover:underline">
                        Sign in here
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
