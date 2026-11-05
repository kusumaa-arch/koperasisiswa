<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminProductManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_product_catalog_keeps_its_existing_products(): void
    {
        $this->get(route('products'))
            ->assertOk()
            ->assertSee('Buku Tulis Big Bos')
            ->assertSee('Mizone')
            ->assertSee('Varian belum diatur');
    }

    public function test_admin_login_requires_valid_credentials_and_protects_product_management(): void
    {
        config([
            'admin.username' => 'kopsis-admin',
            'admin.password' => 'rahasia-admin',
        ]);

        $this->get(route('admin.products.index'))
            ->assertRedirect(route('admin.login'));

        $this->post(route('admin.authenticate'), [
            'username' => 'kopsis-admin',
            'password' => 'short',
        ])->assertSessionHasErrors('password');

        $this->post(route('admin.authenticate'), [
            'username' => 'kopsis-admin',
            'password' => 'password-salah',
        ])->assertSessionHasErrors('credentials');

        $this->post(route('admin.authenticate'), [
            'username' => 'kopsis-admin',
            'password' => 'rahasia-admin',
        ])->assertRedirect(route('admin.products.index'));

        $this->get(route('admin.products.index'))->assertOk();

        $this->post(route('admin.logout'))
            ->assertRedirect(route('admin.login'));

        $this->get(route('admin.products.index'))
            ->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_create_update_stock_and_delete_a_product(): void
    {
        config([
            'admin.username' => 'kopsis-admin',
            'admin.password' => 'rahasia-admin',
        ]);
        Storage::fake('public');

        $this->post(route('admin.authenticate'), [
            'username' => 'kopsis-admin',
            'password' => 'rahasia-admin',
        ])->assertRedirect(route('admin.products.index'));

        $this->post(route('admin.products.store'), [
            'name' => 'Produk Tes',
            'name_en' => 'Test Product',
            'category' => 'makanan',
            'price' => 12000,
            'price_max' => 15000,
            'stock' => 5,
            'variants' => 'Pedas, Original',
            'image' => UploadedFile::fake()->image('produk.png'),
        ])->assertRedirect(route('admin.products.index'));

        $product = Product::query()->where('name', 'Produk Tes')->firstOrFail();
        $imagePath = str_replace('storage/', '', $product->image);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'price' => 12000,
            'price_max' => 15000,
            'stock' => 5,
        ]);
        $this->assertSame(['Pedas', 'Original'], $product->variants);
        Storage::disk('public')->assertExists($imagePath);
        $this->get(route('products'))->assertOk()->assertSee('Pedas')->assertSee('Stok: 5');

        $this->put(route('admin.products.update', $product), [
            'name' => 'Produk Tes Diperbarui',
            'name_en' => 'Updated Test Product',
            'category' => 'minuman',
            'price' => 13000,
            'price_max' => null,
            'stock' => 5,
            'variants' => 'Lemon, Original',
        ])->assertRedirect(route('admin.products.index'));

        $product->refresh();
        $this->assertSame('Produk Tes Diperbarui', $product->name);
        $this->assertSame('minuman', $product->category);
        $this->assertSame(['Lemon', 'Original'], $product->variants);

        $this->patch(route('admin.products.stock', $product), ['stock' => 12])
            ->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseHas('products', ['id' => $product->id, 'stock' => 12]);

        $this->delete(route('admin.products.destroy', $product))
            ->assertRedirect(route('admin.products.index'));
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
        Storage::disk('public')->assertMissing($imagePath);
    }
}
