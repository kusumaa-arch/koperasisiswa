<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'name_en', 'price', 'price_max', 'category', 'image', 'stock', 'variants'])]
class Product extends Model
{
    public const CATEGORIES = [
        'alat-tulis' => ['name' => 'Alat Tulis', 'name_en' => 'Stationery', 'icon' => 'fa-pencil'],
        'perlengkapan' => ['name' => 'Perlengkapan Sekolah', 'name_en' => 'School Supplies', 'icon' => 'fa-school'],
        'makanan' => ['name' => 'Makanan Ringan', 'name_en' => 'Snacks', 'icon' => 'fa-cookie-bite'],
        'minuman' => ['name' => 'Minuman', 'name_en' => 'Drinks', 'icon' => 'fa-bottle-water'],
    ];

    /**
     * @return array<string, array{name: string, name_en: string, icon: string}>
     */
    public static function categoryOptions(): array
    {
        return self::CATEGORIES;
    }

    /**
     * @return array<string, array{0: string, 1: string, 2: string}>
     */
    public static function categoryData(): array
    {
        return array_map(
            static fn (array $category): array => [$category['name'], $category['name_en'], $category['icon']],
            self::CATEGORIES,
        );
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'price_max' => 'integer',
            'stock' => 'integer',
            'variants' => 'array',
        ];
    }
}
