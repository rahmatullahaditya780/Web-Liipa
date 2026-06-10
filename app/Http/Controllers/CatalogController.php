<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function __invoke(Request $request): View
    {
        $search = $request->string('q')->trim()->toString();
        $categorySlug = $request->string('kategori')->trim()->toString();

        $products = Product::with('category')
            ->search($search ?: null)
            ->inCategory($categorySlug ?: null)
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $categories = Category::orderBy('name')->get();

        return view('catalog.index', [
            'products' => $products,
            'categories' => $categories,
            'search' => $search,
            'activeCategory' => $categorySlug,
        ]);
    }
}
