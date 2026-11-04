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
     * @return list<array{name: string, name_en: string, price: int, price_max?: int, cat: string, img: string}>
     */
    private function productData(): array
    {
        return [
            // Alat tulis
            ['name' => 'Buku Tulis Big Bos', 'name_en' => 'Big Bos Notebook', 'price' => 5500, 'cat' => 'alat-tulis', 'img' => 'bigboss.jpg'],
            ['name' => 'Pulpen', 'name_en' => 'Pen', 'price' => 3500, 'cat' => 'alat-tulis', 'img' => 'pulpen.jpg'],
            ['name' => 'Spidol', 'name_en' => 'Marker', 'price' => 4000, 'cat' => 'alat-tulis', 'img' => 'spidol.jpg'],
            ['name' => 'Penghapus', 'name_en' => 'Eraser', 'price' => 2000, 'cat' => 'alat-tulis', 'img' => 'penghapus.jpg'],
            ['name' => 'Pensil 2B', 'name_en' => '2B Pencil', 'price' => 4000, 'cat' => 'alat-tulis', 'img' => 'pensil.png'],
            ['name' => 'Pensil Warna', 'name_en' => 'Colored Pencils', 'price' => 6500, 'cat' => 'alat-tulis', 'img' => 'pensil-warna.png'],
            ['name' => 'Pensil Warna', 'name_en' => 'Colored Pencils', 'price' => 10000, 'cat' => 'alat-tulis', 'img' => 'pensil-warna.png'],
            ['name' => 'Rautan', 'name_en' => 'Pencil Sharpener', 'price' => 2500, 'cat' => 'alat-tulis', 'img' => 'rautan.png'],
            ['name' => 'Penggaris', 'name_en' => 'Ruler', 'price' => 2500, 'cat' => 'alat-tulis', 'img' => 'penggaris.jpg'],
 
            // Perlengkapan sekolah
            ['name' => 'Kaos Kaki', 'name_en' => 'Socks', 'price' => 10000, 'price_max' => 15000, 'cat' => 'perlengkapan', 'img' => 'kaoskaki.jpg'],
            ['name' => 'Tali Pramuka', 'name_en' => 'Scout Rope', 'price' => 5000, 'price_max' => 8000, 'cat' => 'perlengkapan', 'img' => 'tali.jpg'],
            ['name' => 'Topi Pramuka', 'name_en' => 'Scout Hat', 'price' => 25000, 'cat' => 'perlengkapan', 'img' => 'topi.jpg'],
            ['name' => 'Hasduk', 'name_en' => 'Scout Neckerchief', 'price' => 19000, 'cat' => 'perlengkapan', 'img' => 'hasduk.jpg'],
            ['name' => 'Buku Saku', 'name_en' => 'Pocket Book', 'price' => 2500, 'cat' => 'perlengkapan', 'img' => 'busak.png'],
            ['name' => 'Ciput Pet', 'name_en' => 'Hijab Inner Cap', 'price' => 6000, 'cat' => 'perlengkapan', 'img' => 'ciput.png'],
            ['name' => 'Ikat Pinggang', 'name_en' => 'Belt', 'price' => 16000, 'cat' => 'perlengkapan', 'img' => 'ikatpinggang.jpg'],
            ['name' => 'Tissue', 'name_en' => 'Tissue', 'price' => 2500, 'cat' => 'perlengkapan', 'img' => 'tissue.png'],
            ['name' => 'Tissue Basah', 'name_en' => 'Wet Tissue', 'price' => 5500, 'cat' => 'perlengkapan', 'img' => 'tissue-basah.png'],
            ['name' => 'Tissue Kecil', 'name_en' => 'Small Tissue', 'price' => 1500, 'cat' => 'perlengkapan', 'img' => 'tissue-kecil.png'],
            ['name' => 'Deodoran', 'name_en' => 'Deodorant', 'price' => 2500, 'cat' => 'perlengkapan', 'img' => 'deodoran.png'],
            ['name' => 'Pembalut', 'name_en' => 'Sanitary Pad', 'price' => 3000, 'cat' => 'perlengkapan', 'img' => 'pembalut.png'],
 
            // Makanan ringan
            ['name' => 'Keripik Singkong', 'name_en' => 'Cassava Chips', 'price' => 2500, 'cat' => 'makanan', 'img' => 'singkong.png'],
            ['name' => 'Keripik Taro', 'name_en' => 'Taro Chips', 'price' => 2000, 'cat' => 'makanan', 'img' => 'taro.png'],
            ['name' => 'Roti Coklat', 'name_en' => 'Chocolate Bread', 'price' => 2000, 'cat' => 'makanan', 'img' => 'roti.png'],
            ['name' => 'Biskuit', 'name_en' => 'Biscuits', 'price' => 3000, 'cat' => 'makanan', 'img' => 'biskuit.png'],
 
            // Minuman
            ['name' => 'Ultramilk 200ml', 'name_en' => 'Ultramilk 200ml', 'price' => 5000, 'cat' => 'minuman', 'img' => 'ultramilk.png'],
            ['name' => 'Ultramilk 250ml', 'name_en' => 'Ultramilk 250ml', 'price' => 6500, 'cat' => 'minuman', 'img' => 'ultramilk-250.png'],
            ['name' => 'Galon Kecil', 'name_en' => 'Small Water Gallon', 'price' => 15000, 'cat' => 'minuman', 'img' => 'galon.png'],
            ['name' => 'Air Mineral', 'name_en' => 'Mineral Water', 'price' => 3000, 'cat' => 'minuman', 'img' => 'air.png'],
            ['name' => 'Teh Botol', 'name_en' => 'Bottled Tea', 'price' => 4000, 'cat' => 'minuman', 'img' => 'teh.png'],
        ];
    }
}
