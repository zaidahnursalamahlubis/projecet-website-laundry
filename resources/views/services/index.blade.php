@extends('layouts.app')

@section('title', 'Layanan')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Data Layanan</h2>
        <a href="{{ route('services.create') }}" class="btn btn-primary">+ Tambah Layanan</a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Layanan</th>
                            <th>Harga</th>
                            <th>Satuan</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                            <tr>
                                <td>{{ $loop->iteration + ($services->currentPage() - 1) * $services->perPage() }}</td>
                                <td>{{ $service->name }}</td>
                                <td>Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                                <td>{{ $service->unit }}</td>
                                <td>{{ Str::limit($service->description, 30) }}</td>
                                <td>
                                    <a href="{{ route('services.edit', $service) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('services.destroy', $service) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data layanan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $services->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection