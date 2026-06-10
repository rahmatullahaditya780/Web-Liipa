<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\ImageManager;

class ProductImageService
{
    /**
     * Simpan gambar produk: resize maksimal 800px lalu encode WebP q80.
     * Mengembalikan path relatif pada disk public.
     */
    public function store(UploadedFile $file): string
    {
        $manager = new ImageManager(Driver::class);

        $encoded = $manager->decodePath($file->getRealPath())
            ->scaleDown(width: 800)
            ->encode(new WebpEncoder(quality: 80));

        $path = 'products/'.Str::uuid().'.webp';
        Storage::disk('public')->put($path, (string) $encoded);

        return $path;
    }

    public function delete(?string $path): void
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }
}
