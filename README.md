# Liipa' — Sustainable Fashion dari Kain Perca

Situs katalog e-commerce Liipa.id, dibangun dengan **Laravel 13 + Bootstrap 5 (Vite)**.
Hasil migrasi penuh dari versi vanilla PHP (lihat branch `legacy`).

## Fitur

- **Publik**: beranda (hero carousel, produk unggulan, tim, testimoni), katalog dengan pencarian + filter kategori + pagination, halaman tentang kami, form kontak & form kemitraan The Heroes (kirim email).
- **Auth**: daftar/masuk dengan email atau username, rate limiting login (5/menit), kebijakan password minimal 8 karakter huruf+angka.
- **Admin** (`/admin`, role `admin`): dashboard statistik, CRUD produk & kategori, upload gambar (otomatis di-resize 800px dan dikonversi WebP).
- **Keamanan**: CSRF di semua form, query Eloquent (anti SQL injection), kredensial di `.env`, session hardening, security headers, kategori berisi produk tidak bisa dihapus.
- **Performa**: aset dibundel & diminifikasi Vite, font self-host, nol dependensi CDN, gambar hero WebP responsif (`<picture>` + `srcset`), lazy loading, cache header di `.htaccess`.

## Persyaratan

- PHP >= 8.3 (ekstensi: `gd`, `fileinfo`, `pdo_mysql`, `mbstring`, `openssl`, `curl`, `zip`)
- Composer, Node.js >= 20, MySQL 8

## Setup

```bash
composer install
npm install
copy .env.example .env        # lalu isi DB_*, ADMIN_EMAIL, ADMIN_PASSWORD
php artisan key:generate
php artisan migrate --seed    # buat tabel + seed kategori/produk + akun admin
php artisan storage:link
npm run build                 # atau `npm run dev` saat pengembangan
```

Jalankan dengan Laragon (vhost otomatis `http://liipa.test`) atau `php artisan serve`.

## Test

```bash
php artisan test
```

Meliputi: smoke test semua halaman publik, auth (registrasi, login email/username, throttle, password lemah), otorisasi admin (guest/user/admin), CRUD produk dengan upload gambar (verifikasi file WebP), pencarian/filter/pagination katalog, form kontak (Mail fake + rate limit), dan security headers.

## Catatan Produksi

- Set `APP_ENV=production`, `APP_DEBUG=false`, `SESSION_SECURE_COOKIE=true` (perlu HTTPS).
- Isi `MAIL_MAILER=smtp` dengan **app password Gmail baru** — password lama sudah bocor di history git versi lama dan wajib dirotasi.
- Jalankan `php artisan optimize` setelah deploy (`optimize:clear` untuk membersihkan).
- Skrip sekali-pakai `scripts/convert-hero-images.php` tersedia bila perlu regenerasi WebP hero.
