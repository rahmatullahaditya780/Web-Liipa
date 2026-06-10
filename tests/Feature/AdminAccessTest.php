<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_tamu_diarahkan_ke_login(): void
    {
        $this->get('/admin')->assertRedirect('/login');
    }

    public function test_user_biasa_mendapat_403(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)->get('/admin')->assertForbidden();
    }

    public function test_admin_dapat_mengakses_dashboard(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)->get('/admin')->assertOk();
    }
}
