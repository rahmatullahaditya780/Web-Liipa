<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogTest extends TestCase
{
    use RefreshDatabase;

    public function test_pencarian_memfilter_produk(): void
    {
        Product::factory()->create(['name' => 'Tas Perca Cantik', 'slug' => 'tas-perca-cantik']);
        Product::factory()->create(['name' => 'Bros Bunga', 'slug' => 'bros-bunga']);

        $this->get('/katalog?q=Tas')
            ->assertOk()
            ->assertSee('Tas Perca Cantik')
            ->assertDontSee('Bros Bunga');
    }

    public function test_filter_kategori_memakai_slug(): void
    {
        $tas = Category::factory()->create(['name' => 'Tas', 'slug' => 'tas']);
        $aksesoris = Category::factory()->create(['name' => 'Aksesoris', 'slug' => 'aksesoris']);

        Product::factory()->for($tas)->create(['name' => 'Tote Bag Perca', 'slug' => 'tote-bag-perca']);
        Product::factory()->for($aksesoris)->create(['name' => 'Gelang Kain', 'slug' => 'gelang-kain']);

        $this->get('/katalog?kategori=tas')
            ->assertOk()
            ->assertSee('Tote Bag Perca')
            ->assertDontSee('Gelang Kain');
    }

    public function test_katalog_terpaginasi_12_per_halaman(): void
    {
        Product::factory()->count(15)->create();

        $response = $this->get('/katalog');

        $response->assertOk();
        $this->assertCount(12, $response->viewData('products'));
    }

    public function test_pencarian_tanpa_hasil_menampilkan_empty_state(): void
    {
        $this->get('/katalog?q=tidakadaproduknya')
            ->assertOk()
            ->assertSee('Reset Pencarian');
    }
}
