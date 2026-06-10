@extends('layouts.app')

@section('title', "The Heroes — Program Kemitraan Liipa'")
@section('meta_description', 'Bergabunglah menjadi Eco Heroes Liipa: kumpulkan limbah tekstil, berkontribusi dalam ekonomi sirkular, dan dapatkan insentif.')

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
                    <h2 class="mb-4">Mari Menjadi Heroes</h2>
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

    {{-- Form kemitraan --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 reveal">
                    <p class="mb-4">Jika Anda tertarik untuk menjalin hubungan kemitraan dengan kami, silakan isi
                        formulir berikut.</p>
                    <form method="POST" action="{{ route('heroes.send') }}" data-loading>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Nama Anda" value="{{ old('name') }}" required>
                                    <label for="name">Nama</label>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Email Anda" value="{{ old('email') }}" required>
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
                </div>
            </div>
        </div>
    </div>
@endsection
