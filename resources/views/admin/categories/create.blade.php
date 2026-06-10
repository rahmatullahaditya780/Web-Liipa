@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="card border-0 shadow-sm" style="max-width: 480px;">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.categories.store') }}" data-loading>
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name') }}" required maxlength="100" autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4">Simpan</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
