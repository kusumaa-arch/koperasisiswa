<?php

namespace App\Http\Controllers;

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
     * @return list<array{name: string, name_en: string, price: int, price_max?: int, cat: string, img: string}>
     */
    private function productData(): array
    {
        return [
            // Alat tulis
            ['name' => 'Buku Tulis Big Bos', 'name_en' => 'Big Bos Notebook', 'price' => 5500, 'cat' => 'alat-tulis', 'img' => 'bigboss.jpg'],
            ['name' => 'Buku Tulis', 'name_en' => 'Notebook', 'price' => 5000, 'cat' => 'alat-tulis', 'img' => 'buku.png'],
            ['name' => 'Pulpen Kokoro', 'name_en' => 'Kokoro Pen', 'price' => 6000, 'cat' => 'alat-tulis', 'img' => 'kokoro.png'],
            ['name' => 'Penghapus', 'name_en' => 'Eraser', 'price' => 2000, 'cat' => 'alat-tulis', 'img' => 'penghapus.jpg'],
            ['name' => 'Pensil Staedtler', 'name_en' => 'Staedtler Pencil', 'price' => 4000, 'cat' => 'alat-tulis', 'img' => 'pensilsteadler.png'],
            ['name' => 'Pensil Faber-Castell', 'name_en' => 'Faber-Castell Pencil', 'price' => 4000, 'cat' => 'alat-tulis', 'img' => 'fbcastellpensil.jpg'],
            ['name' => 'Pensil Warna', 'name_en' => 'Colored Pencils', 'price' => 10000, 'cat' => 'alat-tulis', 'img' => 'pewarna.png'],
            ['name' => 'Rautan', 'name_en' => 'Pencil Sharpener', 'price' => 2500, 'cat' => 'alat-tulis', 'img' => 'rautan.png'],
            ['name' => 'Penggaris', 'name_en' => 'Ruler', 'price' => 2500, 'cat' => 'alat-tulis', 'img' => 'penggaris.jpg'],
            ['name' => 'Lem Joyko', 'name_en' => 'Joyko Glue', 'price' => 3000, 'cat' => 'alat-tulis', 'img' => 'gluejoyko.png'],
            ['name' => 'Lem Kenko', 'name_en' => 'Kenko Glue', 'price' => 3500, 'cat' => 'alat-tulis', 'img' => 'gluekenko.png'],
            ['name' => 'Alat Tulis Hitech', 'name_en' => 'Hitech Stationery', 'price' => 5000, 'cat' => 'alat-tulis', 'img' => 'hitech.png'],

            // Perlengkapan sekolah
            ['name' => 'Kaos Kaki', 'name_en' => 'Socks', 'price' => 10000, 'price_max' => 15000, 'cat' => 'perlengkapan', 'img' => 'kaoskaki.jpg'],
            ['name' => 'Tali Pramuka', 'name_en' => 'Scout Rope', 'price' => 5000, 'price_max' => 8000, 'cat' => 'perlengkapan', 'img' => 'tali.jpg'],
            ['name' => 'Topi Pramuka', 'name_en' => 'Scout Hat', 'price' => 25000, 'cat' => 'perlengkapan', 'img' => 'topi.jpg'],
            ['name' => 'Hasduk', 'name_en' => 'Scout Neckerchief', 'price' => 19000, 'cat' => 'perlengkapan', 'img' => 'hasduk.jpg'],
            ['name' => 'Buku Saku', 'name_en' => 'Pocket Book', 'price' => 2500, 'cat' => 'perlengkapan', 'img' => 'busak.png'],
            ['name' => 'Ciput Pet', 'name_en' => 'Hijab Inner Cap', 'price' => 6000, 'cat' => 'perlengkapan', 'img' => 'ciputpet.png'],
            ['name' => 'Ikat Pinggang', 'name_en' => 'Belt', 'price' => 16000, 'cat' => 'perlengkapan', 'img' => 'ikatpinggang.jpg'],
            ['name' => 'Deodoran', 'name_en' => 'Deodorant', 'price' => 2500, 'cat' => 'perlengkapan', 'img' => 'deodo.png'],
            ['name' => 'Pembalut', 'name_en' => 'Sanitary Pad', 'price' => 3000, 'cat' => 'perlengkapan', 'img' => 'pembalut.jpg'],
            ['name' => 'Tissue Basah', 'name_en' => 'Wet Tissue', 'price' => 5500, 'cat' => 'perlengkapan', 'img' => 'tissuebasah.png'],
            ['name' => 'Tissue Kecil', 'name_en' => 'Small Tissue', 'price' => 1500, 'cat' => 'perlengkapan', 'img' => 'tissuekecil.png'],

            // Makanan ringan
            ['name' => 'Beng-Beng', 'name_en' => 'Beng-Beng Wafer', 'price' => 2500, 'cat' => 'makanan', 'img' => 'bengbeng.jpg'],

            // Minuman
            ['name' => 'Ultramilk 200ml', 'name_en' => 'Ultramilk 200ml', 'price' => 5000, 'cat' => 'minuman', 'img' => 'ultra200.jpg'],
            ['name' => 'Ultramilk 250ml', 'name_en' => 'Ultramilk 250ml', 'price' => 6500, 'cat' => 'minuman', 'img' => 'ultra250.png'],
            ['name' => 'Galon Kecil', 'name_en' => 'Small Water Gallon', 'price' => 15000, 'cat' => 'minuman', 'img' => 'galon.jpg'],
            ['name' => 'Le Minerale', 'name_en' => 'Le Minerale Mineral Water', 'price' => 3000, 'cat' => 'minuman', 'img' => 'leminerale.jpg'],
            ['name' => 'Teh Botol', 'name_en' => 'Bottled Tea', 'price' => 4000, 'cat' => 'minuman', 'img' => 'tehbotol.png'],
        ];
    }
}
