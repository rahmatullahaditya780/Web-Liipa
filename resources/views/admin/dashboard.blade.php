@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="row g-4 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-box-seam fs-1 text-primary me-3" aria-hidden="true"></i>
                    <div>
                        <div class="fs-3 fw-bold">{{ $productCount }}</div>
                        <div class="text-muted">Produk</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-tags fs-1 text-primary me-3" aria-hidden="true"></i>
                    <div>
                        <div class="fs-3 fw-bold">{{ $categoryCount }}</div>
                        <div class="text-muted">Kategori</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-star fs-1 text-primary me-3" aria-hidden="true"></i>
                    <div>
                        <div class="fs-3 fw-bold">{{ $featuredCount }}</div>
                        <div class="text-muted">Produk Unggulan</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-people fs-1 text-primary me-3" aria-hidden="true"></i>
                    <div>
                        <div class="fs-3 fw-bold">{{ $userCount }}</div>
                        <div class="text-muted">Pengguna Terdaftar</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <span class="fw-bold">Produk Terbaru</span>
            <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary">
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
                        <th scope="col">Ditambahkan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestProducts as $product)
                        <tr>
                            <td>
                                <img src="{{ $product->display_image }}" alt="" width="40" height="40"
                                    class="rounded object-fit-cover me-2">
                                {{ $product->name }}
                            </td>
                            <td>{{ $product->category->name }}</td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">Belum ada produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
