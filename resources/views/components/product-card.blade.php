@props(['product'])

<div class="property-item rounded overflow-hidden h-100 d-flex flex-column">
    <div class="position-relative overflow-hidden">
        <img class="img-fluid w-100 object-fit-cover" style="height: 250px" loading="lazy" decoding="async"
            width="400" height="250" src="{{ $product->display_image }}" alt="{{ $product->name }}">
        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
            {{ $product->category->name }}
        </div>
    </div>
    <div class="p-4 pb-0 flex-grow-1">
        <h3 class="h5 mb-2">{{ $product->name }}</h3>
        <p class="h5 text-primary mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        <p class="mb-3">{{ $product->description }}</p>
        @if ($product->marketplace_url)
            <a class="btn btn-sm btn-outline-primary mb-3" rel="noopener" target="_blank"
                href="{{ $product->marketplace_url }}">
                Beli di marketplace <i class="bi bi-box-arrow-up-right ms-1" aria-hidden="true"></i>
            </a>
        @endif
    </div>
    <div class="d-flex border-top">
        <small class="flex-fill text-center border-end py-2">
            <i class="bi bi-star-fill text-primary me-2" aria-hidden="true"></i>{{ number_format($product->rating, 1, ',') }}
        </small>
        <small class="flex-fill text-center py-2">
            <i class="bi bi-palette text-primary me-2" aria-hidden="true"></i>{{ $product->color_variants_count }} varian warna
        </small>
    </div>
</div>
