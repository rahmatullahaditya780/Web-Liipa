<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'image_path',
        'image_url',
        'rating',
        'color_variants_count',
        'marketplace_url',
        'is_featured',
        'category_id',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'rating' => 'float',
            'price' => 'integer',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * URL gambar yang ditampilkan: upload lokal lebih diutamakan,
     * lalu URL eksternal lama, terakhir placeholder.
     */
    protected function displayImage(): Attribute
    {
        return Attribute::get(function (): string {
            if ($this->image_path) {
                return Storage::url($this->image_path);
            }

            return $this->image_url ?: asset('img/placeholder-product.svg');
        });
    }

    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        return $query->when($term, fn (Builder $q) => $q->where(function (Builder $sub) use ($term) {
            $sub->where('name', 'like', "%{$term}%")
                ->orWhere('description', 'like', "%{$term}%");
        }));
    }

    public function scopeInCategory(Builder $query, ?string $categorySlug): Builder
    {
        return $query->when($categorySlug, fn (Builder $q) => $q->whereHas(
            'category',
            fn (Builder $c) => $c->where('slug', $categorySlug)
        ));
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }
}
