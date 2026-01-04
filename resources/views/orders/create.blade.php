@extends('layouts.app')

@section('title', 'Tambah Pesanan')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Tambah Pesanan</h2>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="customer_id" class="form-label">Pelanggan</label>
                    <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id"
                        name="customer_id" required>
                        <option value="">Pilih Pelanggan</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
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
                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
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
                        id="quantity" name="quantity" value="{{ old('quantity') }}" required>
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="order_date" class="form-label">Tanggal Pesan</label>
                    <input type="date" class="form-control @error('order_date') is-invalid @enderror" id="order_date"
                        name="order_date" value="{{ old('order_date', date('Y-m-d')) }}" required>
                    @error('order_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="finish_date" class="form-label">Tanggal Selesai (Opsional)</label>
                    <input type="date" class="form-control @error('finish_date') is-invalid @enderror" id="finish_date"
                        name="finish_date" value="{{ old('finish_date') }}">
                    @error('finish_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection