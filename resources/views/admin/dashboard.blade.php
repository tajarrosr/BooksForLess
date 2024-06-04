@extends('admin.layouts.app')

@section('content')
<div class="flex flex-col items-start"> <!-- Aligned items to start -->
    <h2 class="text-2xl font-bold mb-4 uppercase">Dashboard</h2>
    <div class="bg-blue-200 p-4 rounded-lg shadow-md text-center w-48">
        <h3 class="text-xl">Total Books</h3>
        <p class="text-3xl">5</p>
        <a href="{{ route('admin.inventory.index') }}" class="text-blue-600">View Details</a>
    </div>
</div>
@endsection
