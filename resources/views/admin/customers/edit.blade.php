@extends('admin.layouts.app')

@section('content')
<title>Edit - Customers Management</title>
<div class="container mt-8">
    <h2 class="mb-4 text-3xl font-bold text-center dark:text-white">Edit Customer</h2>
    <div class="card shadow-lg">
        <div class="card-body p-4">
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.customers.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="first_name" class="block text-gray-700 dark:text-gray-300">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>

                <div class="mb-4">
                    <label for="last_name" class="block text-gray-700 dark:text-gray-300">Last Name</label>
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>

                <div class="mb-4">
                    <label for="username" class="block text-gray-700 dark:text-gray-300">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
