@extends('layouts.app')

@section('title', "{$product->name} — Liipa'")
@section('meta_description', Str::limit($product->description, 150))

@section('content')
    {{-- Header --}}
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 mb-4">{{ $product->name }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('catalog') }}">Katalog</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">{{ $product->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {{-- Detail produk --}}
    <x-wave-divider />
    <div class="container-xxl py-5 bg-light">
        <div class="container">
            <div class="row g-5 align-items-start">
                <div class="col-lg-6 reveal">
                    <div class="property-item position-relative overflow-hidden rounded">
                        <img class="img-fluid w-100 object-fit-cover" style="max-height: 480px" decoding="async"
                            src="{{ $product->display_image }}" alt="{{ $product->name }}">
                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                            {{ $product->category->name }}
                        </div>
                        @if ($product->is_featured)
                            <div class="featured-badge rounded position-absolute end-0 top-0 m-4 py-1 px-3">
                                <i class="bi bi-star-fill me-1" aria-hidden="true"></i>Unggulan
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 reveal">
                    <h2 class="mb-3 section-title section-title--start">Detail Produk</h2>
                    <p class="h3 text-primary mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <div class="d-flex flex-wrap gap-4 mb-4">
                        <span>
                            <i class="bi bi-star-fill text-primary me-2" aria-hidden="true"></i>{{ number_format($product->rating, 1, ',') }} rating
                        </span>
                        <span>
                            <i class="bi bi-palette text-primary me-2" aria-hidden="true"></i>{{ $product->color_variants_count }} varian warna
                        </span>
                    </div>
                    <p class="mb-4">{{ $product->description }}</p>
                    <div class="d-flex flex-wrap gap-2">
                        @if ($product->marketplace_url)
                            <a class="btn btn-primary py-2 px-4" rel="noopener" target="_blank"
                                href="{{ $product->marketplace_url }}">
                                Beli di Marketplace <i class="bi bi-box-arrow-up-right ms-2" aria-hidden="true"></i>
                            </a>
                        @endif
                        <a class="btn btn-outline-primary py-2 px-4" href="{{ route('catalog') }}">
                            <i class="bi bi-arrow-left me-2" aria-hidden="true"></i>Kembali ke Katalog
                        </a>
                    </div>
                </div>
            </div>

            {{-- Produk serupa --}}
            @if ($relatedProducts->isNotEmpty())
                <div class="mt-5 pt-4">
                    <h2 class="mb-4 section-title section-title--start">Produk Serupa</h2>
                    <div class="row g-4">
                        @foreach ($relatedProducts as $related)
                            <div class="col-lg-4 col-md-6 reveal" style="--reveal-delay: {{ ($loop->index % 3) * 0.1 }}s">
                                <x-product-card :product="$related" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    <x-wave-divider flip />
@endsection
