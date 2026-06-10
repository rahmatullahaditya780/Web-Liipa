@extends('layouts.admin')

@section('title', 'Kelola Kategori')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <span class="fw-bold">Daftar Kategori</span>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>Tambah Kategori
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Jumlah Produk</th>
                        <th scope="col" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td><code>{{ $category->slug }}</code></td>
                            <td>{{ $category->products_count }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.categories.edit', $category) }}"
                                    class="btn btn-sm btn-outline-primary" aria-label="Ubah {{ $category->name }}">
                                    <i class="bi bi-pencil" aria-hidden="true"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="d-inline"
                                    onsubmit="return confirm('Hapus kategori “{{ $category->name }}”?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        aria-label="Hapus {{ $category->name }}" @disabled($category->products_count > 0)
                                        @if ($category->products_count > 0) title="Tidak bisa dihapus — masih ada produk" @endif>
                                        <i class="bi bi-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                Belum ada kategori. <a href="{{ route('admin.categories.create') }}">Tambah kategori pertama Anda</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($categories->hasPages())
            <div class="card-footer bg-white">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
@endsection
