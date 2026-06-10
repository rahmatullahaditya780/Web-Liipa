<?php

// Konversi gambar hero ke WebP multi-ukuran (sekali jalan, dev only).
// Jalankan: php scripts/convert-hero-images.php

$jobs = [
    ['src' => __DIR__.'/../public/img/hero1.jpeg', 'out' => 'hero1'],
    ['src' => __DIR__.'/../public/img/hero2.jpg', 'out' => 'hero2'],
];

$widths = [600, 1200];

foreach ($jobs as $job) {
    $source = match (strtolower(pathinfo($job['src'], PATHINFO_EXTENSION))) {
        'jpg', 'jpeg' => imagecreatefromjpeg($job['src']),
        'png' => imagecreatefrompng($job['src']),
        default => null,
    };

    if (! $source) {
        fwrite(STDERR, "Gagal membaca {$job['src']}\n");
        exit(1);
    }

    $srcW = imagesx($source);
    $srcH = imagesy($source);

    foreach ($widths as $width) {
        $targetW = min($width, $srcW);
        $targetH = (int) round($srcH * $targetW / $srcW);

        $resized = imagecreatetruecolor($targetW, $targetH);
        imagecopyresampled($resized, $source, 0, 0, 0, 0, $targetW, $targetH, $srcW, $srcH);

        $outPath = __DIR__."/../public/img/{$job['out']}-{$width}.webp";
        imagewebp($resized, $outPath, 80);
        imagedestroy($resized);

        printf("%s (%dx%d) -> %s KB\n", basename($outPath), $targetW, $targetH, round(filesize($outPath) / 1024));
    }

    imagedestroy($source);
}

echo "Selesai.\n";
