<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $featuredProducts = Product::with('category')
            ->featured()
            ->latest()
            ->take(4)
            ->get();

        return view('home', compact('featuredProducts'));
    }
}
