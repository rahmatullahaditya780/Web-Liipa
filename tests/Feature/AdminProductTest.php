<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminProductTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create(['role' => 'admin']);
    }

    public function test_admin_dapat_membuat_produk_dengan_gambar(): void
    {
        Storage::fake('public');
        $category = Category::factory()->create();

        $response = $this->actingAs($this->admin)->post('/admin/products', [
            'name' => 'Tas Baru',
            'description' => 'Tas dari kain perca pilihan.',
            'price' => 45000,
            'rating' => 4.5,
            'color_variants_count' => 3,
            'category_id' => $category->id,
            'image' => UploadedFile::fake()->image('produk.jpg', 1200, 900),
            'is_featured' => 1,
        ]);

        $response->assertRedirect('/admin/products');

        $product = Product::firstWhere('slug', 'tas-baru');
        $this->assertNotNull($product);
        $this->assertTrue($product->is_featured);
        $this->assertStringEndsWith('.webp', $product->image_path);
        Storage::disk('public')->assertExists($product->image_path);
    }

    public function test_admin_dapat_mengubah_produk(): void
    {
        $product = Product::factory()->create(['name' => 'Lama', 'slug' => 'lama']);

        $this->actingAs($this->admin)->put("/admin/products/{$product->id}", [
            'name' => 'Nama Baru',
            'description' => $product->description,
            'price' => 99000,
            'rating' => 4.0,
            'color_variants_count' => 2,
            'category_id' => $product->category_id,
        ])->assertRedirect('/admin/products');

        $product->refresh();
        $this->assertSame('Nama Baru', $product->name);
        $this->assertSame('nama-baru', $product->slug);
        $this->assertSame(99000, $product->price);
    }

    public function test_hapus_produk_ikut_menghapus_file_gambar(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('products/test.webp', 'isi');

        $product = Product::factory()->create(['image_path' => 'products/test.webp']);

        $this->actingAs($this->admin)->delete("/admin/products/{$product->id}")
            ->assertRedirect('/admin/products');

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
        Storage::disk('public')->assertMissing('products/test.webp');
    }

    public function test_user_biasa_tidak_bisa_membuat_produk(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $category = Category::factory()->create();

        $this->actingAs($user)->post('/admin/products', [
            'name' => 'Produk Ilegal',
            'price' => 1000,
            'color_variants_count' => 1,
            'category_id' => $category->id,
        ])->assertForbidden();
    }

    public function test_kategori_berisi_produk_tidak_bisa_dihapus(): void
    {
        $product = Product::factory()->create();

        $this->actingAs($this->admin)
            ->from('/admin/categories')
            ->delete("/admin/categories/{$product->category_id}")
            ->assertRedirect('/admin/categories')
            ->assertSessionHas('error');

        $this->assertDatabaseHas('categories', ['id' => $product->category_id]);
    }
}
