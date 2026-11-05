<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_en')->nullable();
            $table->unsignedInteger('price');
            $table->unsignedInteger('price_max')->nullable();
            $table->string('category', 40)->index();
            $table->string('image');
            $table->unsignedInteger('stock')->default(0);
            $table->timestamps();
        });

        $timestamp = now();
        $catalog = [
            ['Buku Tulis Big Bos', 'Big Bos Notebook', 5500, null, 'alat-tulis', 'bigboss.jpg'],
            ['Buku Tulis', 'Notebook', 5000, null, 'alat-tulis', 'buku.png'],
            ['Pulpen Kokoro', 'Kokoro Pen', 6000, null, 'alat-tulis', 'kokoro.png'],
            ['Penghapus', 'Eraser', 2000, null, 'alat-tulis', 'penghapus.jpg'],
            ['Pensil Staedtler', 'Staedtler Pencil', 4000, null, 'alat-tulis', 'pensilsteadler.png'],
            ['Pensil Faber-Castell', 'Faber-Castell Pencil', 4000, null, 'alat-tulis', 'fbcastellpensil.jpg'],
            ['Pensil Warna', 'Colored Pencils', 10000, null, 'alat-tulis', 'pewarna.png'],
            ['Rautan', 'Pencil Sharpener', 2500, null, 'alat-tulis', 'rautan.png'],
            ['Penggaris', 'Ruler', 2500, null, 'alat-tulis', 'penggaris.jpg'],
            ['Lem Joyko', 'Joyko Glue', 3000, null, 'alat-tulis', 'gluejoyko.png'],
            ['Lem Kenko', 'Kenko Glue', 3500, null, 'alat-tulis', 'gluekenko.png'],
            ['Alat Tulis Hitech', 'Hitech Stationery', 5000, null, 'alat-tulis', 'hitech.png'],
            ['Kaos Kaki', 'Socks', 10000, 15000, 'perlengkapan', 'kaoskaki.jpg'],
            ['Tali Pramuka', 'Scout Rope', 5000, 8000, 'perlengkapan', 'tali.jpg'],
            ['Topi Pramuka', 'Scout Hat', 25000, null, 'perlengkapan', 'topi.jpg'],
            ['Hasduk', 'Scout Neckerchief', 19000, null, 'perlengkapan', 'hasduk.jpg'],
            ['Buku Saku', 'Pocket Book', 2500, null, 'perlengkapan', 'busak.png'],
            ['Ciput Pet', 'Hijab Inner Cap', 6000, null, 'perlengkapan', 'ciputpet.png'],
            ['Ikat Pinggang', 'Belt', 16000, null, 'perlengkapan', 'ikatpinggang.jpg'],
            ['Deodoran', 'Deodorant', 2500, null, 'perlengkapan', 'deodo.png'],
            ['Pembalut', 'Sanitary Pad', 3000, null, 'perlengkapan', 'pembalut.jpg'],
            ['Tissue Basah', 'Wet Tissue', 5500, null, 'perlengkapan', 'tissuebasah.png'],
            ['Tissue Kecil', 'Small Tissue', 1500, null, 'perlengkapan', 'tissuekecil.png'],
            ['Beng-Beng', 'Beng-Beng Wafer', 2500, null, 'makanan', 'bengbeng.jpg'],
            ['Aoka', 'Aoka', 2500, null, 'makanan', 'aoka.png'],
            ['Nabati', 'Nabati', 2000, null, 'makanan', 'nabati.jpg'],
            ['Pillows', 'Pillows', 2500, null, 'makanan', 'pillows.jpg'],
            ['Tic-Tic', 'Tic-Tic', 2000, null, 'makanan', 'tictic.jpg'],
            ['French Fries', 'French Fries', 5000, null, 'makanan', 'french.jpg'],
            ['Ultramilk 200ml', 'Ultramilk 200ml', 5000, null, 'minuman', 'ultra200.jpg'],
            ['Ultramilk 250ml', 'Ultramilk 250ml', 6500, null, 'minuman', 'ultra250.png'],
            ['Galon Kecil', 'Small Water Gallon', 15000, null, 'minuman', 'galon.jpg'],
            ['Le Minerale', 'Le Minerale Mineral Water', 3000, null, 'minuman', 'leminerale.jpg'],
            ['Teh Botol', 'Bottled Tea', 4000, null, 'minuman', 'tehbotol.png'],
            ['Pocari Sweat', 'Pocari Sweat', 5000, null, 'minuman', 'pocarisweat.jpg'],
            ['Mizone', 'Mizone', 5000, null, 'minuman', 'mizone.jpg'],
            ['Nipis Madu', 'Nipis Madu', 5000, null, 'minuman', 'nipismadu.jpg'],
        ];

        DB::table('products')->insert(array_map(
            static fn (array $product): array => [
                'name' => $product[0],
                'name_en' => $product[1],
                'price' => $product[2],
                'price_max' => $product[3],
                'category' => $product[4],
                'image' => 'images/'.$product[5],
                'stock' => 0,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            $catalog,
        ));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
