<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    private const HOME_PRODUCT_LIMIT = 4;

    public function home(): View
    {
        return view('home', [
            'products' => array_slice($this->productData(), 0, self::HOME_PRODUCT_LIMIT),
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
            'products' => $this->productData(),
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
        return [
            'alat-tulis' => ['Alat Tulis', 'Stationery', 'fa-pencil'],
            'perlengkapan' => ['Perlengkapan Sekolah', 'School Supplies', 'fa-school'],
            'makanan' => ['Makanan Ringan', 'Snacks', 'fa-cookie-bite'],
            'minuman' => ['Minuman', 'Drinks', 'fa-bottle-water'],
        ];
    }

    /**
     * @return list<array{name: string, price: int, price_max?: int, cat: string, img: string}>
     */
    private function productData(): array
    {
        return [
            // Alat tulis
            ['name' => 'Buku Tulis Big Bos', 'price' => 5500, 'cat' => 'alat-tulis', 'img' => 'buku.png'],
            ['name' => 'Pulpen', 'price' => 3500, 'cat' => 'alat-tulis', 'img' => 'pulpen.png'],
            ['name' => 'Spidol', 'price' => 4000, 'cat' => 'alat-tulis', 'img' => 'spidol.png'],
            ['name' => 'Penghapus', 'price' => 2000, 'cat' => 'alat-tulis', 'img' => 'penghapus.png'],
            ['name' => 'Pensil 2B', 'price' => 4000, 'cat' => 'alat-tulis', 'img' => 'pensil.png'],
            ['name' => 'Pensil Warna', 'price' => 6500, 'cat' => 'alat-tulis', 'img' => 'pensil-warna.png'],
            ['name' => 'Pensil Warna', 'price' => 10000, 'cat' => 'alat-tulis', 'img' => 'pensil-warna.png'],
            ['name' => 'Rautan', 'price' => 2500, 'cat' => 'alat-tulis', 'img' => 'rautan.png'],

            // Perlengkapan sekolah
            ['name' => 'Kaos Kaki', 'price' => 10000, 'price_max' => 15000, 'cat' => 'perlengkapan', 'img' => 'kaos-kaki.png'],
            ['name' => 'Penggaris', 'price' => 2500, 'cat' => 'perlengkapan', 'img' => 'penggaris.png'],
            ['name' => 'Tali Pramuka', 'price' => 5000, 'price_max' => 8000, 'cat' => 'perlengkapan', 'img' => 'tali-pramuka.png'],
            ['name' => 'Topi Pramuka', 'price' => 25000, 'cat' => 'perlengkapan', 'img' => 'topi-pramuka.png'],
            ['name' => 'Hasduk', 'price' => 19000, 'cat' => 'perlengkapan', 'img' => 'hasduk.png'],
            ['name' => 'Buku Saku', 'price' => 2500, 'cat' => 'perlengkapan', 'img' => 'busak.png'],
            ['name' => 'Ciput Pet', 'price' => 6000, 'cat' => 'perlengkapan', 'img' => 'ciput.png'],
            ['name' => 'Ikat Pinggang', 'price' => 16000, 'cat' => 'perlengkapan', 'img' => 'ikat-pinggang.png'],
            ['name' => 'Tissue', 'price' => 2500, 'cat' => 'perlengkapan', 'img' => 'tissue.png'],
            ['name' => 'Tissue Basah', 'price' => 5500, 'cat' => 'perlengkapan', 'img' => 'tissue-basah.png'],
            ['name' => 'Tissue Kecil', 'price' => 1500, 'cat' => 'perlengkapan', 'img' => 'tissue-kecil.png'],
            ['name' => 'Deodoran', 'price' => 2500, 'cat' => 'perlengkapan', 'img' => 'deodoran.png'],
            ['name' => 'Pembalut', 'price' => 3000, 'cat' => 'perlengkapan', 'img' => 'pembalut.png'],

            // Makanan ringan
            ['name' => 'Keripik Singkong', 'price' => 2500, 'cat' => 'makanan', 'img' => 'singkong.png'],
            ['name' => 'Keripik Taro', 'price' => 2000, 'cat' => 'makanan', 'img' => 'taro.png'],
            ['name' => 'Roti Coklat', 'price' => 2000, 'cat' => 'makanan', 'img' => 'roti.png'],
            ['name' => 'Biskuit', 'price' => 3000, 'cat' => 'makanan', 'img' => 'biskuit.png'],

            // Minuman
            ['name' => 'Ultramilk 200ml', 'price' => 5000, 'cat' => 'minuman', 'img' => 'ultramilk.png'],
            ['name' => 'Ultramilk 250ml', 'price' => 6500, 'cat' => 'minuman', 'img' => 'ultramilk-250.png'],
            ['name' => 'Galon Kecil', 'price' => 15000, 'cat' => 'minuman', 'img' => 'galon.png'],
            ['name' => 'Air Mineral', 'price' => 3000, 'cat' => 'minuman', 'img' => 'air.png'],
            ['name' => 'Teh Botol', 'price' => 4000, 'cat' => 'minuman', 'img' => 'teh.png'],
        ];
    }
}
