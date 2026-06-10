<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (! $email || ! $password) {
            $this->command?->warn('ADMIN_EMAIL / ADMIN_PASSWORD belum diset di .env — akun admin dilewati.');

            return;
        }

        User::firstOrCreate(
            ['email' => $email],
            [
                'name' => 'Admin Liipa',
                'username' => env('ADMIN_USERNAME', 'admin'),
                'password' => $password,
                'role' => 'admin',
            ]
        );
    }
}
