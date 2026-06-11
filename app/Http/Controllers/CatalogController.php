<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('q')->trim()->toString();
        $categorySlug = $request->string('kategori')->trim()->toString();
        $priceRange = $request->string('harga')->trim()->toString();
        $sort = $request->string('urutkan')->trim()->toString();

        $products = Product::with('category')
            ->search($search ?: null)
            ->inCategory($categorySlug ?: null)
            ->priceRange($priceRange ?: null)
            ->sortBy($sort ?: null)
            ->paginate(12)
            ->withQueryString();

        $categories = Category::withCount('products')->orderBy('name')->get();

        return view('catalog.index', [
            'products' => $products,
            'categories' => $categories,
            'search' => $search,
            'activeCategory' => $categorySlug,
            'activePrice' => $priceRange,
            'activeSort' => $sort,
        ]);
    }

    public function show(Product $product): View
    {
        $product->load('category');

        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->whereKeyNot($product->getKey())
            ->latest()
            ->take(3)
            ->get();

        return view('catalog.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
