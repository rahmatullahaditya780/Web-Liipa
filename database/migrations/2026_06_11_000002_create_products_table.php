<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            // Harga dalam rupiah penuh (situs lama menyimpan angka ribuan, dikonversi saat seeding)
            $table->decimal('price', 12, 0)->default(0);
            $table->string('image_path')->nullable();
            $table->string('image_url', 500)->nullable();
            $table->decimal('rating', 2, 1)->default(0);
            $table->unsignedTinyInteger('color_variants_count')->default(1);
            $table->string('marketplace_url', 500)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
            $table->timestamps();

            $table->index('name');
            $table->index(['category_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
