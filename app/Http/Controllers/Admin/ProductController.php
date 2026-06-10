<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(private readonly ProductImageService $images)
    {
    }

    public function index(Request $request): View
    {
        $products = Product::with('category')
            ->search($request->string('q')->trim()->toString() ?: null)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    public function create(): View
    {
        return view('admin.products.create', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $this->preparedData($request);

        if ($request->hasFile('image')) {
            $data['image_path'] = $this->images->store($request->file('image'));
        }

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('status', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $data = $this->preparedData($request, $product);

        if ($request->hasFile('image')) {
            $this->images->delete($product->image_path);
            $data['image_path'] = $this->images->store($request->file('image'));
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('status', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->images->delete($product->image_path);
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('status', 'Produk berhasil dihapus.');
    }

    private function preparedData(StoreProductRequest $request, ?Product $product = null): array
    {
        $data = $request->safe()->except('image');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['rating'] = $request->input('rating') ?? 0;

        if (! $product || $request->input('name') !== $product->name) {
            $data['slug'] = $this->uniqueSlug($request->input('name'), $product?->id);
        }

        return $data;
    }

    private function uniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $counter = 2;

        while (Product::where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->whereKeyNot($ignoreId))
            ->exists()) {
            $slug = "{$base}-{$counter}";
            $counter++;
        }

        return $slug;
    }
}
