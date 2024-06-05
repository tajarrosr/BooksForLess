@extends('admin.layouts.app')
@section('content')
<title>Admin Panel</title>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg card">
        <h3 class="text-xl font-semibold mb-2 dark:text-gray-300">Total Books</h3>
        <p class="text-3xl font-bold mb-4 dark:text-gray-100">{{ $totalBooks }}</p>
        <a href="{{ route('admin.inventory.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">View Details</a>
    </div>
    <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg card">
        <h3 class="text-xl font-semibold mb-2 dark:text-gray-300">Total Customers</h3>
        <p class="text-3xl font-bold mb-4 dark:text-gray-100">{{ $totalCustomers }}</p>
        <a href="{{ route('admin.customers.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">View Details</a>
    </div>
</div>
@endsection
