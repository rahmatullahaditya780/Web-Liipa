@extends('layouts.app')

@section('title', "Katalog Produk — Liipa'")
@section('meta_description', 'Temukan berbagai produk kerajinan unik dari kain perca daur ulang: aksesoris, tas, dan pakaian ramah lingkungan.')

@section('content')
    {{-- Header --}}
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 mb-4">Katalog</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">Katalog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {{-- Pencarian --}}
    <div class="container-fluid bg-primary mb-5" style="padding: 35px">
        <div class="container">
            <form method="GET" action="{{ route('catalog') }}" role="search">
                @if ($activeCategory)
                    <input type="hidden" name="kategori" value="{{ $activeCategory }}">
                @endif
                <div class="row g-2">
                    <div class="col-md-10">
                        <label for="cari_produk" class="visually-hidden">Cari produk</label>
                        <input id="cari_produk" name="q" type="search" class="form-control border-0 py-3"
                            placeholder="Cari produk, mis. tas, bros, scrunchie…" value="{{ $search }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-dark border-0 w-100 py-3">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Daftar produk --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 reveal">
                        <h2 class="mb-3">Semua Produk</h2>
                        <p>Temukan berbagai macam produk kerajinan unik dari kain perca di sini:</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end reveal">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5" role="list">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary @unless ($activeCategory) active @endunless"
                                href="{{ route('catalog', array_filter(['q' => $search])) }}">Semua</a>
                        </li>
                        @foreach ($categories as $category)
                            <li class="nav-item @if ($loop->last) me-0 @else me-2 @endif">
                                <a class="btn btn-outline-primary @if ($activeCategory === $category->slug) active @endif"
                                    href="{{ route('catalog', array_filter(['kategori' => $category->slug, 'q' => $search])) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            @if ($products->isEmpty())
                <div class="text-center py-5">
                    <i class="bi bi-search display-4 text-primary d-block mb-3" aria-hidden="true"></i>
                    <h3 class="mb-3">
                        @if ($search)
                            Tidak ada hasil untuk “{{ $search }}”@if ($activeCategory) di kategori ini @endif.
                        @else
                            Belum ada produk di kategori ini.
                        @endif
                    </h3>
                    <p class="mb-4">Coba kata kunci lain atau lihat semua produk kami.</p>
                    <a class="btn btn-primary py-2 px-4" href="{{ route('catalog') }}">Reset Pencarian</a>
                </div>
            @else
                <div class="row g-4">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 reveal" style="--reveal-delay: {{ ($loop->index % 3) * 0.1 }}s">
                            <x-product-card :product="$product" />
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
