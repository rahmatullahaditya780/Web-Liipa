@extends('layouts.admin')

@section('title', 'Ubah Produk')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" data-loading>
                @method('PUT')
                @include('admin.products._form', ['submitLabel' => 'Simpan Perubahan'])
            </form>
        </div>
    </div>
@endsection
