<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Data produk dipindahkan dari db_liipa.tb_produk (situs lama).
     * Harga lama disimpan dalam ribuan (15 = Rp15.000), dikonversi ke rupiah penuh.
     */
    public function run(): void
    {
        $aksesorisImg = 'https://down-id.img.susercontent.com/file/id-11134207-7qul6-lhh5spslfvtz9e';
        $bajuImg = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9JxF-1I7yhPNbTTFQuRK8Pm_pdmR-8zTJxA&s';

        $aksesoris = Category::where('slug', 'aksesoris')->first();
        $pakaian = Category::where('slug', 'pakaian')->first();

        $products = [
            ['name' => 'Gantungan Kunci Perca', 'description' => 'Aksesoris unik dari kain perca pilihan, dibuat tangan oleh pengrajin lokal.', 'price' => 15000, 'rating' => 4.5, 'color_variants_count' => 3, 'image_url' => $aksesorisImg, 'category_id' => $aksesoris->id, 'is_featured' => true],
            ['name' => 'Baju Patchwork', 'description' => 'Baju unik dari kain perca dengan motif patchwork yang khas.', 'price' => 30000, 'rating' => 4.2, 'color_variants_count' => 2, 'image_url' => $bajuImg, 'category_id' => $pakaian->id, 'is_featured' => true],
            ['name' => 'Bros Kain Perca', 'description' => 'Aksesoris unik dari kain perca, cocok untuk pelengkap gaya harianmu.', 'price' => 15000, 'rating' => 4.5, 'color_variants_count' => 3, 'image_url' => $aksesorisImg, 'category_id' => $aksesoris->id, 'is_featured' => true],
            ['name' => 'Scrunchie Perca', 'description' => 'Ikat rambut dari kain perca berkualitas dengan beragam pilihan warna.', 'price' => 15000, 'rating' => 4.5, 'color_variants_count' => 3, 'image_url' => $aksesorisImg, 'category_id' => $aksesoris->id, 'is_featured' => true],
            ['name' => 'Outer Patchwork', 'description' => 'Outer kasual dari kain perca daur ulang, nyaman dipakai sehari-hari.', 'price' => 30000, 'rating' => 4.2, 'color_variants_count' => 2, 'image_url' => $bajuImg, 'category_id' => $pakaian->id, 'is_featured' => false],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(
                ['slug' => Str::slug($product['name'])],
                $product
            );
        }
    }
}
