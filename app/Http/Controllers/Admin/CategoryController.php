<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::withCount('products')->orderBy('name')->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        Category::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
        ]);

        return redirect()->route('admin.categories.index')
            ->with('status', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category): View
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
        ]);

        return redirect()->route('admin.categories.index')
            ->with('status', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category): RedirectResponse
    {
        if ($category->products()->exists()) {
            return back()->with('error', 'Kategori tidak bisa dihapus karena masih memiliki produk. Pindahkan atau hapus produknya terlebih dahulu.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('status', 'Kategori berhasil dihapus.');
    }
}
