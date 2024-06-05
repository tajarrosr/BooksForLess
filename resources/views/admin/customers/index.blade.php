@extends('admin.layouts.app')

@section('content')
<title>Admin - Customers Management</title>
<div class="container mt-8">
    <h2 class="mb-4 text-3xl font-bold text-center dark:text-white">Customer List</h2>
    <div class="card shadow-lg">
        <div class="card-body p-0">
            <table class="table-auto w-full mb-0">
                <thead class="custom-bg text-color">
                    <tr>
                        <th class="py-2 px-4 text-center">ID</th>
                        <th class="py-2 px-4 text-center">Last Name</th>
                        <th class="py-2 px-4 text-center">First Name</th>
                        <th class="py-2 px-4 text-center">Username</th>
                        <th class="py-2 px-4 text-center">Email</th>
                        <th class="py-2 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="custom-bg">
                    @foreach($users as $user)
                        <tr class="border">
                            <td class="py-2 px-4 text-center">{{ $user->id }}</td>
                            <td class="py-2 px-4 text-center">{{ $user->last_name }}</td>
                            <td class="py-2 px-4 text-center">{{ $user->first_name }}</td>
                            <td class="py-2 px-4 text-center">{{ $user->username }}</td>
                            <td class="py-2 px-4 text-center">{{ $user->email }}</td>
                            <td class="py-2 px-4 text-center">
                                <a href="{{ route('admin.customers.edit', $user->id) }}" class="btn btn-warning btn-sm bg-yellow-500 text-white py-1 px-2 rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('admin.customers.destroy', $user->id) }}" method="POST" style="display:inline-block;" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                if (confirm('Are you sure you want to delete this customer?')) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
