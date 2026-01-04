@extends('layouts.app')

@section('title', 'Edit Layanan')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Edit Layanan</h2>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('services.update', $service) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Layanan</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $service->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" value="{{ old('price', $service->price) }}" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="unit" class="form-label">Satuan</label>
                    <select class="form-control @error('unit') is-invalid @enderror" id="unit" name="unit" required>
                        <option value="">Pilih Satuan</option>
                        <option value="kg" {{ old('unit', $service->unit) == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                        <option value="pcs" {{ old('unit', $service->unit) == 'pcs' ? 'selected' : '' }}>Pieces (pcs)</option>
                        <option value="set" {{ old('unit', $service->unit) == 'set' ? 'selected' : '' }}>Set</option>
                    </select>
                    @error('unit')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                        name="description" rows="3">{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection