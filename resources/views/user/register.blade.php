@include('partials.__header')
<body class="bg-background-100 font-iphone">
    <x-nav/>
    <div class="container mx-auto p-8">
        <div class="max-w-lg mx-auto bg-background-200 p-8 rounded-lg shadow-lg">
            <h2 class="text-4xl font-bold mb-6 text-center font-butler-stencil text-text-900">Customer Register</h2>
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-sm text-error-700">
                        @foreach ($errors->all() as $error)
                            <li class="text-center list-none">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="first_name" class="sr-only">First Name</label>
                    <input id="first_name" name="first_name" type="text" required class="appearance-none rounded w-full px-3 py-2 bg-background-100 border border-accent-300 text-text-900 focus:outline-none focus:ring-accent-500 focus:border-accent-500 sm:text-sm" placeholder="First Name" value="{{ old('first_name') }}">
                </div>
                <div class="mb-4">
                    <label for="last_name" class="sr-only">Last Name</label>
                    <input id="last_name" name="last_name" type="text" required class="appearance-none rounded w-full px-3 py-2 bg-background-100 border border-accent-300 text-text-900 focus:outline-none focus:ring-accent-500 focus:border-accent-500 sm:text-sm" placeholder="Last Name" value="{{ old('last_name') }}">
                </div>
                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input id="username" name="username" type="text" required class="appearance-none rounded w-full px-3 py-2 bg-background-100 border border-accent-300 text-text-900 focus:outline-none focus:ring-accent-500 focus:border-accent-500 sm:text-sm" placeholder="Username" value="{{ old('username') }}">
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Email Address</label>
                    <input id="email" name="email" type="email" required class="appearance-none rounded w-full px-3 py-2 bg-background-100 border border-accent-300 text-text-900 focus:outline-none focus:ring-accent-500 focus:border-accent-500 sm:text-sm" placeholder="Email Address" value="{{ old('email') }}">
                </div>
                <div class="mb-4 relative">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required class="appearance-none rounded w-full px-3 py-2 bg-background-100 border border-accent-300 text-text-900 focus:outline-none focus:ring-secondary-500 focus:border-accent-500 sm:text-sm" placeholder="Password">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" onclick="togglePasswordVisibility('password')" class="focus:outline-none">
                            <svg id="password-toggle-icon" class="h-5 w-5 text-text-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 01-9 9m0 0a9 9 0 01-9-9m9-9a9 9 0 019 9m0 0a9 9 0 01-9 9m0 0a9 9 0 01-9-9" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mb-4 relative">
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none rounded w-full px-3 py-2 bg-background-100 border border-accent-300 text-text-900 focus:outline-none focus:ring-secondary-500 focus:border-accent-500 sm:text-sm" placeholder="Confirm Password">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" onclick="togglePasswordVisibility('password_confirmation')" class="focus:outline-none">
                            <svg id="password-confirmation-toggle-icon" class="h-5 w-5 text-text-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 01-9 9m0 0a9 9 0 01-9-9m9-9a9 9 0 019 9m0 0a9 9 0 01-9 9m0 0a9 9 0 01-9-9m9-9a9 9 0 019 9" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="picture" class="sr-only">Profile Picture</label>
                    <div class="text-text-900 mb-2 text-center">Please insert a profile picture (JPEG, JPG, PNG)</div>
                    <input id="picture" name="picture" type="file" class="appearance-none rounded w-full px-3 py-2 bg-background-100 border border-accent-300 text-text-900 focus:outline-none focus:ring-accent-500 focus:border-accent-500 sm:text-sm" accept="image/jpeg,image/jpg,image/png">
                </div>
                <div>
                    <button type="submit" class="w-full py-3 px-4 border border-transparent text-lg font-bold rounded-md text-text-50 bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">Register</button>
                </div>
            </form>
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="text-text-600 hover:text-text-500">Already have an account? Login</a>
            </div>
        </div>
    </div>
    <script>
        function togglePasswordVisibility(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(`${fieldId}-toggle-icon`);
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.replace('text-text-500', 'text-text-700');
            } else {
                field.type = 'password';
                icon.classList.replace('text-text-700', 'text-text-500');
            }
        }
    </script>
</body>
@include('partials.__footer')
