@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Dashboard</h2>
        <div class="text-muted">
            Selamat datang, {{ Auth::user()->name }}!
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Pelanggan</h6>
                            <h3 class="fw-bold mb-0">{{ $totalCustomers }}</h3>
                        </div>
                        <div class="fs-1">👥</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Layanan</h6>
                            <h3 class="fw-bold mb-0">{{ $totalServices }}</h3>
                        </div>
                        <div class="fs-1">🧼</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Pesanan</h6>
                            <h3 class="fw-bold mb-0">{{ $totalOrders }}</h3>
                        </div>
                        <div class="fs-1">📦</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Pesanan Pending</h6>
                            <h3 class="fw-bold mb-0">{{ $pendingOrders }}</h3>
                        </div>
                        <div class="fs-1">⏳</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-3">Selamat Datang di LaundryApp</h5>
                    <p class="text-muted">Kelola bisnis laundry Anda dengan mudah dan efisien. Gunakan menu di sebelah kiri
                        untuk mengelola pelanggan, layanan, dan pesanan.</p>
                </div>
            </div>
        </div>
    </div>
@endsection