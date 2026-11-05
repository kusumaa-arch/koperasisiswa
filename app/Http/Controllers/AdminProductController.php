<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use RuntimeException;

class AdminProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index', [
            'products' => Product::query()->orderBy('category')->orderBy('name')->get(),
            'categories' => Product::categoryOptions(),
        ]);
    }

    public function create(): View
    {
        return view('admin.products.form', [
            'product' => new Product(),
            'categories' => Product::categoryOptions(),
            'formTitle' => 'Tambah Produk',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProduct($request);
        $image = $request->file('image');

        if (!$image instanceof UploadedFile) {
            throw new RuntimeException('Gambar produk tidak tersedia setelah validasi.');
        }

        $validated['image'] = 'storage/'.$this->storeImage($image);

        Product::query()->create($validated);

        return redirect()->route('admin.products.index')->with('status', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.form', [
            'product' => $product,
            'categories' => Product::categoryOptions(),
            'formTitle' => 'Edit Produk',
        ]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $this->validateProduct($request, true);
        $image = $request->file('image');
        unset($validated['image']);

        $oldImage = $product->image;
        if ($image instanceof UploadedFile) {
            $validated['image'] = 'storage/'.$this->storeImage($image);
        }

        $product->update($validated);

        if (isset($validated['image'])) {
            $this->deleteStoredImage($oldImage);
        }

        return redirect()->route('admin.products.index')->with('status', 'Produk berhasil diperbarui.');
    }

    public function updateStock(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'stock' => ['required', 'integer', 'min:0'],
        ], [
            'stock.required' => 'Stok wajib diisi.',
            'stock.integer' => 'Stok harus berupa bilangan bulat.',
            'stock.min' => 'Stok tidak boleh kurang dari 0.',
        ]);

        $product->update(['stock' => $validated['stock']]);

        return redirect()->route('admin.products.index')->with('status', 'Stok produk berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $image = $product->image;
        $product->delete();
        $this->deleteStoredImage($image);

        return redirect()->route('admin.products.index')->with('status', 'Produk berhasil dihapus.');
    }

    /**
     * @return array{name: string, name_en: ?string, price: int, price_max: ?int, category: string, stock: int, image?: UploadedFile|null}
     */
    private function validateProduct(Request $request, bool $isUpdate = false): array
    {
        $variantInput = $request->validate([
            'variants' => ['nullable', 'string', 'max:1000'],
        ])['variants'] ?? '';
        $variants = array_values(array_unique(array_filter(
            array_map('trim', explode(',', $variantInput)),
            static fn (string $variant): bool => $variant !== '',
        )));
        $request->merge(['variants' => $variants]);

        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'price_max' => ['nullable', 'integer', 'gte:price'],
            'category' => ['required', 'string', Rule::in(array_keys(Product::categoryOptions()))],
            'stock' => ['required', 'integer', 'min:0'],
            'variants' => ['array', 'max:20'],
            'variants.*' => ['required', 'string', 'max:80'],
            'image' => [$isUpdate ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'price.required' => 'Harga wajib diisi.',
            'price.integer' => 'Harga harus berupa bilangan bulat.',
            'price_max.gte' => 'Harga maksimal tidak boleh lebih kecil dari harga.',
            'category.required' => 'Kategori wajib dipilih.',
            'stock.required' => 'Stok wajib diisi.',
            'stock.integer' => 'Stok harus berupa bilangan bulat.',
            'image.required' => 'Gambar produk wajib diunggah.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Gambar harus berformat JPG, JPEG, PNG, atau WEBP.',
            'image.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);
    }

    private function storeImage(UploadedFile $image): string
    {
        $path = $image->storePublicly('products', 'public');

        if (!is_string($path)) {
            throw new RuntimeException('Gambar produk gagal disimpan.');
        }

        return $path;
    }

    private function deleteStoredImage(string $image): void
    {
        if (!str_starts_with($image, 'storage/products/')) {
            return;
        }

        $path = substr($image, strlen('storage/'));
        $disk = Storage::disk('public');

        if ($disk->exists($path) && !$disk->delete($path)) {
            throw new RuntimeException('Gambar produk lama gagal dihapus.');
        }
    }
}
