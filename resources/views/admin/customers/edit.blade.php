@extends('admin.layouts.app')

@section('content')
<title>Edit - Customers Management</title>
<div class="container mt-8">
    <h2 class="mb-4 text-3xl font-bold text-center dark:text-white">Edit Customer</h2>
    <div class="card shadow-lg">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.customers.update', $user->id) }}">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="first_name" class="block text-gray-700 dark:text-gray-300">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>

                <div class="mb-4">
                    <label for="last_name" class="block text-gray-700 dark:text-gray-300">Last Name</label>
                    <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>

                <div class="mb-4">
                    <label for="username" class="block text-gray-700 dark:text-gray-300">Username</label>
                    <input type="text" id="username" name="username" value="{{ $user->username }}" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 dark:text-gray-300">Password (Hashed)</label>
                    <input type="text" id="password" name="password" value="{{ $user->password }}" class="w-full p-2 border border-gray-300 rounded mt-1" readonly>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
