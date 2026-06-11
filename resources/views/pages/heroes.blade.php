@extends('layouts.app')

@section('title', "The Heroes — Program Kemitraan Liipa'")
@section('meta_description', 'Bergabunglah menjadi Eco Heroes Liipa: donasikan kain bekas atau jadilah pengrajin mitra, dan ubah limbah tekstil menjadi karya yang lebih bernilai.')

@section('content')
    {{-- Header --}}
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 mb-4">The Heroes</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">The Heroes</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {{-- Program --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 reveal">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube-nocookie.com/embed/xYlgCEXSG6k" title="Video program The Heroes Liipa"
                            loading="lazy" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 reveal" style="--reveal-delay: 0.2s">
                    <h2 class="mb-4 section-title section-title--start">Mari Menjadi Heroes</h2>
                    <p class="mb-4">Liipa mengajak kamu menjadi bagian dari perubahan — sebagai Eco Heroes yang turut
                        menjaga bumi dengan aksi nyata. Lewat program ini, kamu bisa:</p>
                    <p><i class="bi bi-check-lg text-primary me-3" aria-hidden="true"></i>Mengumpulkan limbah tekstil dari sekitarmu untuk didaur ulang</p>
                    <p><i class="bi bi-check-lg text-primary me-3" aria-hidden="true"></i>Berkontribusi dalam ekonomi sirkular yang berbasis nilai syariah</p>
                    <p><i class="bi bi-check-lg text-primary me-3" aria-hidden="true"></i>Menjadi penggerak perubahan sosial &amp; lingkungan di komunitasmu</p>
                    <p><i class="bi bi-check-lg text-primary me-3" aria-hidden="true"></i>Mendapatkan insentif &amp; pelatihan dari Liipa untuk setiap kontribusimu</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Pilih peran: donatur atau pengrajin --}}
    <x-wave-divider />
    <div class="container-xxl py-5 bg-light">
        <div class="container">
            <div class="text-center mx-auto mb-5 reveal" style="max-width: 600px;">
                <h2 class="mb-3 section-title">Pilih Peranmu</h2>
                <p>Apa pun titik mulaimu, selalu ada cara untuk ikut mengubah limbah tekstil menjadi sesuatu yang lebih bernilai.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-5 col-md-6 reveal">
                    <div class="role-card">
                        <span class="role-icon"><i class="bi bi-box-seam" aria-hidden="true"></i></span>
                        <h3 class="h4 mb-3">Donatur Kain Bekas</h3>
                        <p>Punya kain perca, pakaian tak terpakai, atau sisa produksi? Jangan biarkan berakhir
                            di tempat pembuangan — setorkan kepada kami dan jadikan awal dari cerita baru.</p>
                        <p class="mb-2"><i class="bi bi-check-lg text-primary me-2" aria-hidden="true"></i>Setiap setoran tercatat dan berdampak nyata</p>
                        <p class="mb-2"><i class="bi bi-check-lg text-primary me-2" aria-hidden="true"></i>Dapatkan insentif untuk setiap kontribusimu</p>
                        <p class="mb-4"><i class="bi bi-check-lg text-primary me-2" aria-hidden="true"></i>Ikut mengurangi emisi dan timbunan limbah tekstil</p>
                        <a href="#form-kemitraan" class="btn btn-primary py-2 px-4">Mulai Donasi<i class="bi bi-arrow-down ms-2" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 reveal" style="--reveal-delay: 0.15s">
                    <div class="role-card">
                        <span class="role-icon"><i class="bi bi-scissors" aria-hidden="true"></i></span>
                        <h3 class="h4 mb-3">Pengrajin Mitra</h3>
                        <p>Punya keterampilan menjahit atau membuat kerajinan? Dapatkan pasokan kain bekas
                            terkurasi dan ubah menjadi aksesori, tas, serta produk harian yang bernilai jual.</p>
                        <p class="mb-2"><i class="bi bi-check-lg text-primary me-2" aria-hidden="true"></i>Bahan baku terseleksi dan terklasifikasi kualitasnya</p>
                        <p class="mb-2"><i class="bi bi-check-lg text-primary me-2" aria-hidden="true"></i>Pelatihan dan pendampingan dari tim Liipa</p>
                        <p class="mb-4"><i class="bi bi-check-lg text-primary me-2" aria-hidden="true"></i>Akses pasar lewat katalog Liipa untuk karyamu</p>
                        <a href="#form-kemitraan" class="btn btn-primary py-2 px-4">Jadi Pengrajin<i class="bi bi-arrow-down ms-2" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-wave-divider flip />

    {{-- Cara bergabung --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 reveal" style="max-width: 600px;">
                <h2 class="mb-3 section-title">Bagaimana Cara Bergabung?</h2>
                <p>Empat langkah mudah untuk menjadi bagian dari Eco Heroes.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 reveal">
                    <div class="how-step">
                        <span class="step-num" aria-hidden="true">1</span>
                        <h3 class="h6 mb-2">Daftar Akun</h3>
                        <p class="mb-0">Buat akun Liipa' secara gratis — cukup nama, email, dan kata sandi.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 reveal" style="--reveal-delay: 0.15s">
                    <div class="how-step">
                        <span class="step-num" aria-hidden="true">2</span>
                        <h3 class="h6 mb-2">Isi Formulir</h3>
                        <p class="mb-0">Lengkapi formulir kemitraan dan ceritakan peran yang kamu inginkan.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 reveal" style="--reveal-delay: 0.3s">
                    <div class="how-step">
                        <span class="step-num" aria-hidden="true">3</span>
                        <h3 class="h6 mb-2">Verifikasi</h3>
                        <p class="mb-0">Tim Liipa menghubungimu untuk berkenalan dan menyiapkan kemitraan.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 reveal" style="--reveal-delay: 0.45s">
                    <div class="how-step">
                        <span class="step-num" aria-hidden="true">4</span>
                        <h3 class="h6 mb-2">Mulai Berkontribusi</h3>
                        <p class="mb-0">Setor kain bekas atau terima bahan baku, dan dapatkan insentifmu.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Form kemitraan (khusus pengguna terdaftar) --}}
    <div id="form-kemitraan" class="container-xxl pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 reveal">
                    @auth
                        <div class="text-center mb-4">
                            <h2 class="mb-3 section-title">Formulir Kemitraan</h2>
                            <p>Ceritakan peran yang kamu inginkan — donatur kain bekas, pengrajin, atau keduanya.
                                Kami akan segera menghubungimu.</p>
                        </div>
                        <form method="POST" action="{{ route('heroes.send') }}" data-loading>
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Nama Anda" value="{{ old('name', auth()->user()->name) }}" required>
                                        <label for="name">Nama</label>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="Email Anda" value="{{ old('email', auth()->user()->email) }}" required>
                                        <label for="email">Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" placeholder="No. HP Anda" value="{{ old('phone') }}" required>
                                        <label for="phone">No. HP</label>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            id="address" name="address" placeholder="Alamat lengkap Anda" value="{{ old('address') }}" required>
                                        <label for="address">Alamat lengkap</label>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message"
                                            placeholder="Ceritakan sedikit tentang diri Anda..." style="height: 150px" required>{{ old('message') }}</textarea>
                                        <label for="message">Ceritakan tentang diri Anda dan alasan ingin bermitra</label>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Kirim Formulir</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="form-lock-card">
                            <span class="role-icon"><i class="bi bi-lock-fill" aria-hidden="true"></i></span>
                            <h2 class="h4 mb-3">Formulir Khusus Pengguna Terdaftar</h2>
                            <p class="mb-4">Masuk atau buat akun gratis terlebih dahulu untuk mengisi formulir
                                kemitraan The Heroes. Hanya butuh waktu kurang dari satu menit.</p>
                            <div class="d-flex flex-wrap justify-content-center gap-2">
                                <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4">Masuk</a>
                                <a href="{{ route('register') }}" class="btn btn-outline-primary py-2 px-4">Daftar Akun<i class="bi bi-arrow-right ms-2" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
