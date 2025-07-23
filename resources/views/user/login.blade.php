@extends('layouts.app')

@section('title', 'Login - BooksForLess')

@section('content')
<div class="min-h-screen bg-base-200 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto">
            <div class="card bg-base-100 shadow-2xl">
                <div class="card-header bg-primary text-primary-content p-6 rounded-t-2xl text-center">
                    <h2 class="text-3xl font-bold">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Welcome Back
                    </h2>
                    <p class="mt-2 opacity-90">Sign in to your account</p>
                </div>
                <div class="card-body p-8">
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Username or Email</span>
                            </label>
                            <input type="text" name="username" value="{{ old('username') }}" 
                                   class="input input-bordered @error('username') input-error @enderror" 
                                   required autofocus>
                            @error('username')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>
                        
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text font-semibold">Password</span>
                            </label>
                            <input type="password" name="password" 
                                   class="input input-bordered @error('password') input-error @enderror" required>
                            @error('password')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>
                        
                        <div class="form-control">
                            <label class="cursor-pointer label justify-start gap-3">
                                <input type="checkbox" name="remember" class="checkbox checkbox-primary" />
                                <span class="label-text">Remember me</span>
                            </label>
                        </div>
                        
                        <div class="form-control mt-8">
                            <button type="submit" class="btn btn-primary btn-lg btn-gradient">
                                <i class="fas fa-sign-in-alt"></i>
                                Login
                            </button>
                        </div>
                    </form>
                    
                    <div class="divider">Don't have an account?</div>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="btn btn-outline btn-wide">
                            <i class="fas fa-user-plus"></i>
                            Register Here
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
