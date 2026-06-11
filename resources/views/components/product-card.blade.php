@props(['product'])

<div class="property-item rounded overflow-hidden h-100 d-flex flex-column">
    <div class="position-relative overflow-hidden">
        <img class="img-fluid w-100 object-fit-cover" style="height: 250px" loading="lazy" decoding="async"
            width="400" height="250" src="{{ $product->display_image }}" alt="{{ $product->name }}">
        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
            {{ $product->category->name }}
        </div>
        @if ($product->is_featured)
            <div class="featured-badge rounded position-absolute end-0 top-0 m-4 py-1 px-3">
                <i class="bi bi-star-fill me-1" aria-hidden="true"></i>Unggulan
            </div>
        @endif
    </div>
    <div class="p-4 pb-0 flex-grow-1">
        <h3 class="h5 mb-2">{{ $product->name }}</h3>
        <p class="h5 text-primary mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        <p class="mb-3">{{ $product->description }}</p>
    </div>
    <div class="d-flex border-top">
        <a class="card-action flex-fill text-center border-end py-2"
            href="{{ route('catalog.show', $product) }}">
            <i class="bi bi-eye text-primary me-2" aria-hidden="true"></i>Lihat Detail
        </a>
        @if ($product->marketplace_url)
            <a class="card-action flex-fill text-center py-2" rel="noopener" target="_blank"
                href="{{ $product->marketplace_url }}">
                <i class="bi bi-bag-check text-primary me-2" aria-hidden="true"></i>Beli di Marketplace
            </a>
        @endif
    </div>
</div>
