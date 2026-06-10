@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" data-loading>
                @include('admin.products._form', ['product' => null, 'submitLabel' => 'Simpan Produk'])
            </form>
        </div>
    </div>
@endsection
