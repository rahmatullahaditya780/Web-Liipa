@csrf
<div class="row g-3">
    <div class="col-md-8">
        <label for="name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
            value="{{ old('name', $product->name ?? '') }}" required maxlength="255">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="category_id" class="form-label">Kategori <span class="text-danger">*</span></label>
        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
            <option value="">— Pilih kategori —</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? null) == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
            rows="3" maxlength="2000">{{ old('description', $product->description ?? '') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="price" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
            value="{{ old('price', $product->price ?? '') }}" required min="0" step="1">
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="rating" class="form-label">Rating (0–5)</label>
        <input type="number" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating"
            value="{{ old('rating', $product->rating ?? 0) }}" min="0" max="5" step="0.1">
        @error('rating')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="color_variants_count" class="form-label">Jumlah Varian Warna <span class="text-danger">*</span></label>
        <input type="number" class="form-control @error('color_variants_count') is-invalid @enderror"
            id="color_variants_count" name="color_variants_count"
            value="{{ old('color_variants_count', $product->color_variants_count ?? 1) }}" required min="1" max="255">
        @error('color_variants_count')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="image" class="form-label">Gambar Produk</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
            accept="image/jpeg,image/png,image/webp" aria-describedby="imageHelp">
        <div id="imageHelp" class="form-text">JPG/PNG/WebP, maks 2 MB. Otomatis dikompresi ke WebP 800px.</div>
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        @if (! empty($product?->image_path) || ! empty($product?->image_url))
            <div class="mt-2 d-flex align-items-center gap-2">
                <img src="{{ $product->display_image }}" alt="Gambar produk saat ini" width="60" height="60"
                    class="rounded object-fit-cover">
                <small class="text-muted">Gambar saat ini — unggah file baru untuk mengganti.</small>
            </div>
        @endif
    </div>
    <div class="col-md-6">
        <label for="image_url" class="form-label">URL Gambar Eksternal (opsional)</label>
        <input type="url" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url"
            value="{{ old('image_url', $product->image_url ?? '') }}" maxlength="500"
            placeholder="https://… (dipakai jika tidak ada file unggahan)">
        @error('image_url')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-8">
        <label for="marketplace_url" class="form-label">Link Marketplace (Shopee, dll.)</label>
        <input type="url" class="form-control @error('marketplace_url') is-invalid @enderror" id="marketplace_url"
            name="marketplace_url" value="{{ old('marketplace_url', $product->marketplace_url ?? '') }}" maxlength="500"
            placeholder="https://shopee.co.id/…">
        @error('marketplace_url')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4 d-flex align-items-end">
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1"
                @checked(old('is_featured', $product->is_featured ?? false))>
            <label class="form-check-label" for="is_featured">Tampilkan di beranda (unggulan)</label>
        </div>
    </div>
    <div class="col-12 d-flex gap-2">
        <button type="submit" class="btn btn-primary px-4">{{ $submitLabel }}</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Batal</a>
    </div>
</div>
