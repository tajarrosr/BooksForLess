@extends('layouts.admin')

@section('title', 'Admin Dashboard - BooksForLess')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h1>
    <div class="text-muted">
        <i class="fas fa-calendar me-1"></i>{{ date('F j, Y') }}
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card stats-card">
            <div class="card-body text-center">
                <i class="fas fa-book fa-2x mb-2"></i>
                <h3>{{ $totalBooks }}</h3>
                <p class="mb-0">Total Books</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stats-card">
            <div class="card-body text-center">
                <i class="fas fa-users fa-2x mb-2"></i>
                <h3>{{ $totalCustomers }}</h3>
                <p class="mb-0">Total Customers</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stats-card">
            <div class="card-body text-center">
                <i class="fas fa-shopping-cart fa-2x mb-2"></i>
                <h3>0</h3>
                <p class="mb-0">Total Orders</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stats-card">
            <div class="card-body text-center">
                <i class="fas fa-peso-sign fa-2x mb-2"></i>
                <h3>₱0</h3>
                <p class="mb-0">Total Revenue</p>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.inventory.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-plus me-2"></i>Add New Book
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.inventory.index') }}" class="btn btn-info w-100">
                            <i class="fas fa-boxes me-2"></i>Manage Inventory
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-success w-100">
                            <i class="fas fa-users me-2"></i>View Customers
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="#" class="btn btn-warning w-100">
                            <i class="fas fa-chart-line me-2"></i>View Reports
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-clock me-2"></i>Recent Activity</h5>
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex align-items-center">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                            <i class="fas fa-book"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">New book added to inventory</h6>
                            <small class="text-muted">2 hours ago</small>
                        </div>
                    </div>
                    <div class="list-group-item d-flex align-items-center">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">New customer registered</h6>
                            <small class="text-muted">5 hours ago</small>
                        </div>
                    </div>
                    <div class="list-group-item d-flex align-items-center">
                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">New order received</h6>
                            <small class="text-muted">1 day ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-exclamation-triangle me-2"></i>Low Stock Alert</h5>
            </div>
            <div class="card-body">
                <p class="text-muted">Books with low stock levels:</p>
                <div class="list-group list-group-flush">
                    <div class="list-group-item px-0">
                        <div class="d-flex justify-content-between">
                            <span>Sample Book Title</span>
                            <span class="badge bg-warning">3 left</span>
                        </div>
                    </div>
                    <div class="list-group-item px-0">
                        <div class="d-flex justify-content-between">
                            <span>Another Book</span>
                            <span class="badge bg-danger">1 left</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
