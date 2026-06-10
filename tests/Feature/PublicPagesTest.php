<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_semua_halaman_publik_dapat_diakses(): void
    {
        Product::factory()->featured()->count(2)->create();

        foreach (['/', '/katalog', '/tentang-kami', '/kontak', '/the-heroes', '/login', '/daftar'] as $uri) {
            $this->get($uri)->assertOk();
        }
    }

    public function test_halaman_tidak_dikenal_menampilkan_404(): void
    {
        $this->get('/halaman-tidak-ada')->assertNotFound();
    }

    public function test_security_headers_terpasang(): void
    {
        $this->get('/')
            ->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
            ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
    }
}
