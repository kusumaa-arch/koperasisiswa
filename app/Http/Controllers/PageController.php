<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    private function categoryData(): array
    {
        return [
            'alat-tulis'   => ['Alat Tulis', 'Stationery', 'fa-pencil'],
            'perlengkapan' => ['Perlengkapan Sekolah', 'School Supplies', 'fa-school'],
            'makanan'      => ['Makanan Ringan', 'Snacks', 'fa-cookie-bite'],
            'minuman'      => ['Minuman', 'Drinks', 'fa-bottle-water'],
        ];
    }

    private function productData(): array
    {
        return [
            ['name' => 'Buku Tulis',   'price' => 5000, 'cat' => 'alat-tulis',   'img' => 'buku.png'],
            ['name' => 'Pulpen',       'price' => 3000, 'cat' => 'alat-tulis',   'img' => 'pulpen.png'],
            ['name' => 'Keripik Taro', 'price' => 5000, 'cat' => 'makanan',      'img' => 'taro.png'],
            ['name' => 'Air Mineral',  'price' => 3000, 'cat' => 'minuman',      'img' => 'air.png'],
            ['name' => 'Pensil 2B',    'price' => 2000, 'cat' => 'alat-tulis',   'img' => 'pensil.png'],
            ['name' => 'Penggaris',    'price' => 2500, 'cat' => 'perlengkapan', 'img' => 'penggaris.png'],
            ['name' => 'Roti Coklat',  'price' => 4000, 'cat' => 'makanan',      'img' => 'roti.png'],
            ['name' => 'Teh Botol',    'price' => 4000, 'cat' => 'minuman',      'img' => 'teh.png'],
            ['name' => 'Biskuit',      'price' => 3000, 'cat' => 'makanan',      'img' => 'biskuit.png'],
            ['name' => 'Pensil Warna', 'price' => 10000, 'cat' => 'alat-tulis',   'img' => 'pensil-warna.png'],
            ['name' => 'Pensil Warna', 'price' => 10000, 'cat' => 'alat-tulis',   'img' => 'pensil-warna.png'],        ];
    }

    public function home()
    {
        return view('home', [
            'products' => array_slice($this->productData(), 0, 4),
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function products()
    {
        return view('products', [
            'categories' => $this->categoryData(),
            'products'   => $this->productData(),
        ]);
    }

    public function operational()
    {
        return view('operational');
    }
}