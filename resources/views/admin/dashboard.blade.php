@extends('admin.layouts.app')

@section('content')
<h2>Admin Dashboard</h2>
<div class="card mt-3">
    <div class="card-body">
        <p>Welcome, {{ $admin->name }}!</p>
    </div>
</div>
<div class="card mt-3">
    <div class="card-body">
        <a href="{{ route('admin.inventory.index') }}">
            <h5>Inventory Management</h5>
            <p>Add, edit, and remove books from your inventory.</p>
        </a>
    </div>
</div>
@endsection
