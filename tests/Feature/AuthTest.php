<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        RateLimiter::clear('login');
    }

    public function test_pendaftaran_berhasil_dan_langsung_login(): void
    {
        $response = $this->post('/daftar', [
            'username' => 'budi123',
            'email' => 'budi@example.com',
            'password' => 'rahasia123',
            'password_confirmation' => 'rahasia123',
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['username' => 'budi123', 'role' => 'user']);
    }

    public function test_password_lemah_ditolak(): void
    {
        $response = $this->post('/daftar', [
            'username' => 'budi123',
            'email' => 'budi@example.com',
            'password' => 'abc123',
            'password_confirmation' => 'abc123',
        ]);

        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }

    public function test_login_dengan_email_dan_username(): void
    {
        $user = User::factory()->create([
            'username' => 'siti',
            'email' => 'siti@example.com',
            'password' => 'rahasia123',
        ]);

        $this->post('/login', ['identity' => 'siti@example.com', 'password' => 'rahasia123'])
            ->assertRedirect('/');
        $this->assertAuthenticatedAs($user);

        $this->post('/logout');
        $this->assertGuest();

        $this->post('/login', ['identity' => 'siti', 'password' => 'rahasia123'])
            ->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }

    public function test_kredensial_salah_ditolak(): void
    {
        User::factory()->create(['email' => 'siti@example.com', 'password' => 'rahasia123']);

        $this->post('/login', ['identity' => 'siti@example.com', 'password' => 'salah-total'])
            ->assertSessionHasErrors('identity');
        $this->assertGuest();
    }

    public function test_login_dibatasi_setelah_5_percobaan(): void
    {
        User::factory()->create(['email' => 'siti@example.com', 'password' => 'rahasia123']);

        for ($i = 0; $i < 5; $i++) {
            $this->post('/login', ['identity' => 'siti@example.com', 'password' => 'salah']);
        }

        $this->post('/login', ['identity' => 'siti@example.com', 'password' => 'salah'])
            ->assertStatus(429);
    }
}
