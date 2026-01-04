@extends('layouts.app')

@section('title', 'Edit Pesanan')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Edit Pesanan</h2>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('orders.update', $order) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="customer_id" class="form-label">Pelanggan</label>
                    <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id"
                        name="customer_id" required>
                        <option value="">Pilih Pelanggan</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('customer_id', $order->customer_id) == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }} - {{ $customer->phone }}
                            </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="service_id" class="form-label">Layanan</label>
                    <select class="form-control @error('service_id') is-invalid @enderror" id="service_id" name="service_id"
                        required>
                        <option value="">Pilih Layanan</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id', $order->service_id) == $service->id ? 'selected' : '' }}>
                                {{ $service->name }} - Rp {{ number_format($service->price, 0, ',', '.') }}/{{ $service->unit }}
                            </option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Jumlah</label>
                    <input type="number" step="0.1" class="form-control @error('quantity') is-invalid @enderror"
                        id="quantity" name="quantity" value="{{ old('quantity', $order->quantity) }}" required>
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>Pending
                        </option>
                        <option value="process" {{ old('status', $order->status) == 'process' ? 'selected' : '' }}>Proses
                        </option>
                        <option value="done" {{ old('status', $order->status) == 'done' ? 'selected' : '' }}>Selesai</option>
                        <option value="taken" {{ old('status', $order->status) == 'taken' ? 'selected' : '' }}>Diambil
                        </option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="order_date" class="form-label">Tanggal Pesan</label>
                    <input type="date" class="form-control @error('order_date') is-invalid @enderror" id="order_date"
                        name="order_date" value="{{ old('order_date', $order->order_date->format('Y-m-d')) }}" required>
                    @error('order_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="finish_date" class="form-label">Tanggal Selesai (Opsional)</label>
                    <input type="date" class="form-control @error('finish_date') is-invalid @enderror" id="finish_date"
                        name="finish_date" value="{{ old('finish_date', $order->finish_date?->format('Y-m-d')) }}">
                    @error('finish_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection