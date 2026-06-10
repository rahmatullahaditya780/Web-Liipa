<?php

namespace Tests\Feature;

use App\Mail\ContactMessage;
use App\Mail\HeroApplication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_form_kontak_mengirim_email(): void
    {
        Mail::fake();

        $this->post('/kontak', [
            'name' => 'Budi',
            'email' => 'budi@example.com',
            'subject' => 'Tanya produk',
            'message' => 'Apakah tas tersedia warna biru?',
        ])->assertRedirect()->assertSessionHas('status');

        Mail::assertSent(ContactMessage::class);
    }

    public function test_form_kontak_menolak_data_tidak_lengkap(): void
    {
        Mail::fake();

        $this->post('/kontak', ['name' => '', 'email' => 'bukan-email'])
            ->assertSessionHasErrors(['name', 'email', 'subject', 'message']);

        Mail::assertNothingSent();
    }

    public function test_form_heroes_mengirim_email(): void
    {
        Mail::fake();

        $this->post('/the-heroes', [
            'name' => 'Siti',
            'email' => 'siti@example.com',
            'phone' => '0812345678',
            'address' => 'Jl. Mawar No. 1, Makassar',
            'message' => 'Saya ingin menjadi mitra pengumpul limbah tekstil.',
        ])->assertRedirect()->assertSessionHas('status');

        Mail::assertSent(HeroApplication::class);
    }

    public function test_form_kontak_dibatasi_rate_limit(): void
    {
        Mail::fake();

        $payload = [
            'name' => 'Budi',
            'email' => 'budi@example.com',
            'subject' => 'Spam test',
            'message' => 'Pesan berulang.',
        ];

        for ($i = 0; $i < 5; $i++) {
            $this->post('/kontak', $payload);
        }

        $this->post('/kontak', $payload)->assertStatus(429);
    }
}
