<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('home', [
            'categories' => $this->categoryData(),
        ]);
    }

    public function about(): View
    {
        return view('about');
    }

    public function products(): View
    {
        return view('products', [
            'categories' => $this->categoryData(),
            'products' => Product::query()->orderBy('id')->get(),
        ]);
    }

    public function operational(): View
    {
        return view('operational');
    }

    /**
     * @return array<string, array{0: string, 1: string, 2: string}> Kunci kategori => [label ID, label EN, ikon Font Awesome]
     */
    private function categoryData(): array
    {
        return Product::categoryData();
    }
}
