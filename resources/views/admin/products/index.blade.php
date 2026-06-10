@extends('layouts.admin')

@section('title', 'Kelola Produk')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <form method="GET" action="{{ route('admin.products.index') }}" class="d-flex" role="search">
                <label for="q" class="visually-hidden">Cari produk</label>
                <input type="search" class="form-control me-2" id="q" name="q" placeholder="Cari produk…"
                    value="{{ request('q') }}">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
            </form>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>Tambah Produk
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th scope="col">Produk</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Unggulan</th>
                        <th scope="col" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>
                                <img src="{{ $product->display_image }}" alt="" width="40" height="40"
                                    class="rounded object-fit-cover me-2">
                                {{ $product->name }}
                            </td>
                            <td>{{ $product->category->name }}</td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ number_format($product->rating, 1, ',') }}</td>
                            <td>
                                @if ($product->is_featured)
                                    <span class="badge text-bg-success">Ya</span>
                                @else
                                    <span class="badge text-bg-secondary">Tidak</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary"
                                    aria-label="Ubah {{ $product->name }}">
                                    <i class="bi bi-pencil" aria-hidden="true"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="d-inline"
                                    onsubmit="return confirm('Hapus produk “{{ $product->name }}”? Tindakan ini tidak bisa dibatalkan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        aria-label="Hapus {{ $product->name }}">
                                        <i class="bi bi-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                @if (request('q'))
                                    Tidak ada produk yang cocok dengan “{{ request('q') }}”.
                                    <a href="{{ route('admin.products.index') }}">Reset pencarian</a>
                                @else
                                    Belum ada produk. <a href="{{ route('admin.products.create') }}">Tambah produk pertama Anda</a>.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($products->hasPages())
            <div class="card-footer bg-white">
                {{ $products->links() }}
            </div>
        @endif
    </div>
@endsection
