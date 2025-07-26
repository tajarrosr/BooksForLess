@extends('layouts.minimal')

@section('title', 'Register - BooksForLess')

@section('content')
<div class="min-h-screen bg-base-200 py-12">
  <div class="container mx-auto px-4">
      <div class="max-w-2xl mx-auto">
          <div class="card bg-base-100 shadow-2xl">
              <div class="card-header bg-primary text-primary-content p-6 rounded-t-2xl text-center">
                  <h2 class="text-3xl font-bold">
                      <i class="fas fa-user-plus mr-2"></i>
                      Create Your Account
                  </h2>
                  <p class="mt-2 opacity-90">Join thousands of book lovers</p>
              </div>
              <div class="card-body p-8">
                  <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-6">
                      @csrf
                      
                      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                          <div class="form-control">
                              <label class="label">
                                  <span class="label-text font-semibold">First Name</span>
                              </label>
                              <input type="text" name="first_name" value="{{ old('first_name') }}" 
                                     class="input input-bordered @error('first_name') input-error @enderror" required>
                              @error('first_name')
                                  <label class="label">
                                      <span class="label-text-alt text-error">{{ $message }}</span>
                                  </label>
                              @enderror
                          </div>
                          
                          <div class="form-control">
                              <label class="label">
                                  <span class="label-text font-semibold">Last Name</span>
                              </label>
                              <input type="text" name="last_name" value="{{ old('last_name') }}" 
                                     class="input input-bordered @error('last_name') input-error @enderror" required>
                              @error('last_name')
                                  <label class="label">
                                      <span class="label-text-alt text-error">{{ $message }}</span>
                                  </label>
                              @enderror
                          </div>
                      </div>
                      
                      <div class="form-control">
                          <label class="label">
                              <span class="label-text font-semibold">Username</span>
                          </label>
                          <input type="text" name="username" value="{{ old('username') }}" 
                                 class="input input-bordered @error('username') input-error @enderror" required>
                          @error('username')
                              <label class="label">
                                  <span class="label-text-alt text-error">{{ $message }}</span>
                              </label>
                          @enderror
                      </div>
                      
                      <div class="form-control">
                          <label class="label">
                              <span class="label-text font-semibold">Email Address</span>
                          </label>
                          <input type="email" name="email" value="{{ old('email') }}" 
                                 class="input input-bordered @error('email') input-error @enderror" required>
                          @error('email')
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
                          <label class="label">
                              <span class="label-text font-semibold">Confirm Password</span>
                          </label>
                          <input type="password" name="password_confirmation" 
                                 class="input input-bordered" required>
                      </div>
                      
                      <div class="form-control">
                          <label class="label">
                              <span class="label-text font-semibold">Profile Picture (Optional)</span>
                          </label>
                          <input type="file" name="picture" accept="image/*" 
                                 class="file-input file-input-bordered @error('picture') file-input-error @enderror">
                          @error('picture')
                              <label class="label">
                                  <span class="label-text-alt text-error">{{ $message }}</span>
                              </label>
                          @enderror
                      </div>
                      
                      <div class="form-control mt-8">
                          <button type="submit" class="btn btn-primary btn-lg btn-gradient">
                              <i class="fas fa-user-plus"></i>
                              Create Account
                          </button>
                      </div>
                  </form>
                  
                  <div class="divider">Already have an account?</div>
                  <div class="text-center">
                      <a href="{{ route('login') }}" class="btn btn-outline btn-wide">
                          <i class="fas fa-sign-in-alt"></i>
                          Login Here
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
