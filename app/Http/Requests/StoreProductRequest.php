<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'price' => ['required', 'integer', 'min:0', 'max:999999999999'],
            'rating' => ['nullable', 'numeric', 'between:0,5'],
            'color_variants_count' => ['required', 'integer', 'between:1,255'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'image_url' => ['nullable', 'url', 'max:500'],
            'marketplace_url' => ['nullable', 'url', 'max:500'],
            'is_featured' => ['nullable', 'boolean'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nama produk',
            'description' => 'deskripsi',
            'price' => 'harga',
            'rating' => 'rating',
            'color_variants_count' => 'jumlah varian warna',
            'category_id' => 'kategori',
            'image' => 'gambar',
            'image_url' => 'URL gambar',
            'marketplace_url' => 'link marketplace',
        ];
    }
}
