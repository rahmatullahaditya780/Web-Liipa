@extends('layouts.app')

@section('title', "Katalog Produk — Liipa'")
@section('meta_description', 'Temukan berbagai produk kerajinan unik dari kain perca daur ulang: aksesoris, tas, dan pakaian ramah lingkungan.')

@php
    $priceRanges = [
        'dibawah-50' => 'Di bawah Rp50 rb',
        '50-100' => 'Rp50–100 rb',
        'diatas-100' => 'Di atas Rp100 rb',
    ];
    $currentCategory = $categories->firstWhere('slug', $activeCategory);
@endphp

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

    {{-- Panel pencarian --}}
    <div class="container-xxl pb-4">
        <div class="container">
            <div class="catalog-filter reveal">
                <form method="GET" action="{{ route('catalog') }}" role="search">
                    @if ($activeCategory)
                        <input type="hidden" name="kategori" value="{{ $activeCategory }}">
                    @endif
                    @if ($activePrice)
                        <input type="hidden" name="harga" value="{{ $activePrice }}">
                    @endif
                    @if ($activeSort)
                        <input type="hidden" name="urutkan" value="{{ $activeSort }}">
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
    </div>

    {{-- Daftar produk --}}
    <x-wave-divider />
    <div class="container-xxl py-5 bg-light">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-7">
                    <div class="text-start mb-4 reveal">
                        <h2 class="mb-3 section-title section-title--start">Semua Produk</h2>
                        <p class="mb-2">
                            @if ($products->total())
                                Menampilkan {{ $products->firstItem() }}–{{ $products->lastItem() }} dari
                                {{ $products->total() }} produk{{ $search ? " untuk “{$search}”" : '' }}.
                            @else
                                Tidak ada produk yang cocok dengan filter saat ini.
                            @endif
                        </p>
                        @if ($search || $currentCategory || isset($priceRanges[$activePrice]))
                            <div class="d-flex flex-wrap gap-2">
                                @if ($search)
                                    <a class="filter-chip" aria-label="Hapus kata kunci {{ $search }}"
                                        href="{{ route('catalog', array_filter(['kategori' => $activeCategory, 'harga' => $activePrice, 'urutkan' => $activeSort])) }}">
                                        “{{ $search }}”<i class="bi bi-x-lg ms-2" aria-hidden="true"></i>
                                    </a>
                                @endif
                                @if ($currentCategory)
                                    <a class="filter-chip" aria-label="Hapus filter kategori {{ $currentCategory->name }}"
                                        href="{{ route('catalog', array_filter(['q' => $search, 'harga' => $activePrice, 'urutkan' => $activeSort])) }}">
                                        {{ $currentCategory->name }}<i class="bi bi-x-lg ms-2" aria-hidden="true"></i>
                                    </a>
                                @endif
                                @isset ($priceRanges[$activePrice])
                                    <a class="filter-chip" aria-label="Hapus filter harga"
                                        href="{{ route('catalog', array_filter(['q' => $search, 'kategori' => $activeCategory, 'urutkan' => $activeSort])) }}">
                                        {{ $priceRanges[$activePrice] }}<i class="bi bi-x-lg ms-2" aria-hidden="true"></i>
                                    </a>
                                @endisset
                                <a class="filter-chip filter-chip--reset" href="{{ route('catalog') }}">Reset semua</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-5 text-lg-end reveal">
                    <form method="GET" action="{{ route('catalog') }}" class="d-inline-flex align-items-center gap-2 mb-4">
                        @if ($search)
                            <input type="hidden" name="q" value="{{ $search }}">
                        @endif
                        @if ($activeCategory)
                            <input type="hidden" name="kategori" value="{{ $activeCategory }}">
                        @endif
                        @if ($activePrice)
                            <input type="hidden" name="harga" value="{{ $activePrice }}">
                        @endif
                        <label for="urutkan" class="text-nowrap mb-0">Urutkan:</label>
                        <select id="urutkan" name="urutkan" class="form-select w-auto" data-autosubmit>
                            <option value="" @selected(! $activeSort)>Terbaru</option>
                            <option value="harga-terendah" @selected($activeSort === 'harga-terendah')>Harga Terendah</option>
                            <option value="harga-tertinggi" @selected($activeSort === 'harga-tertinggi')>Harga Tertinggi</option>
                            <option value="rating" @selected($activeSort === 'rating')>Rating Tertinggi</option>
                        </select>
                        <noscript>
                            <button type="submit" class="btn btn-outline-primary">Terapkan</button>
                        </noscript>
                    </form>
                </div>
            </div>

            {{-- Filter kategori --}}
            <ul class="nav nav-pills d-flex flex-wrap gap-2 mb-3 reveal" role="list">
                <li class="nav-item">
                    <a class="btn btn-outline-primary @unless ($activeCategory) active @endunless"
                        href="{{ route('catalog', array_filter(['q' => $search, 'harga' => $activePrice, 'urutkan' => $activeSort])) }}">Semua</a>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="btn btn-outline-primary @if ($activeCategory === $category->slug) active @endif"
                            href="{{ route('catalog', array_filter(['kategori' => $category->slug, 'q' => $search, 'harga' => $activePrice, 'urutkan' => $activeSort])) }}">
                            {{ $category->name }} ({{ $category->products_count }})
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- Filter harga --}}
            <div class="d-flex flex-wrap align-items-center gap-2 mb-5 reveal">
                <span class="me-1">Harga:</span>
                <a class="btn btn-sm btn-outline-primary @unless ($activePrice) active @endunless"
                    href="{{ route('catalog', array_filter(['q' => $search, 'kategori' => $activeCategory, 'urutkan' => $activeSort])) }}">Semua Harga</a>
                @foreach ($priceRanges as $rangeKey => $rangeLabel)
                    <a class="btn btn-sm btn-outline-primary @if ($activePrice === $rangeKey) active @endif"
                        href="{{ route('catalog', array_filter(['q' => $search, 'kategori' => $activeCategory, 'urutkan' => $activeSort, 'harga' => $rangeKey])) }}">
                        {{ $rangeLabel }}
                    </a>
                @endforeach
            </div>

            @if ($products->isEmpty())
                <div class="text-center py-5">
                    <i class="bi bi-search display-4 text-primary d-block mb-3" aria-hidden="true"></i>
                    <h3 class="mb-3">
                        @if ($search)
                            Tidak ada hasil untuk “{{ $search }}”@if ($activeCategory || $activePrice) dengan filter ini @endif.
                        @else
                            Belum ada produk yang cocok dengan filter ini.
                        @endif
                    </h3>
                    <p class="mb-4">Coba kata kunci lain, longgarkan filter, atau lihat semua produk kami.</p>
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
    <x-wave-divider flip />
@endsection
