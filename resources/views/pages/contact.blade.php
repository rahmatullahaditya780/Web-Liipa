@extends('layouts.app')

@section('title', "Kontak — Liipa'")
@section('meta_description', 'Hubungi tim Liipa untuk pertanyaan, saran, atau kolaborasi seputar produk daur ulang kain perca.')

@section('content')
    {{-- Header --}}
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 mb-4">Kontak</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">Kontak</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 reveal" style="max-width: 600px;">
                <h2 class="mb-3">Hubungi Kami</h2>
                <p>Punya pertanyaan, saran, atau ingin berkolaborasi? Jangan ragu untuk menghubungi kami! Kami
                    menghargai setiap hubungan dan siap membantu Anda bergabung dalam misi menuju masa depan yang
                    lebih berkelanjutan.</p>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-6 col-lg-4 reveal">
                            <div class="bg-light rounded p-3 h-100">
                                <div class="d-flex align-items-center bg-white rounded p-3 h-100"
                                    style="border: 1px dashed rgba(246, 153, 26, .3)">
                                    <div class="icon me-3" style="width: 45px; height: 45px;">
                                        <i class="bi bi-geo-alt text-primary" aria-hidden="true"></i>
                                    </div>
                                    <span>Jl. Sultan Alauddin No. 63 Makassar, Sulawesi Selatan, Indonesia</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 reveal" style="--reveal-delay: 0.15s">
                            <div class="bg-light rounded p-3 h-100">
                                <div class="d-flex align-items-center bg-white rounded p-3 h-100"
                                    style="border: 1px dashed rgba(246, 153, 26, .3)">
                                    <div class="icon me-3" style="width: 45px; height: 45px;">
                                        <i class="bi bi-envelope-open text-primary" aria-hidden="true"></i>
                                    </div>
                                    <span>kainpercaid@gmail.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 reveal" style="--reveal-delay: 0.3s">
                            <div class="bg-light rounded p-3 h-100">
                                <div class="d-flex align-items-center bg-white rounded p-3 h-100"
                                    style="border: 1px dashed rgba(246, 153, 26, .3)">
                                    <div class="icon me-3" style="width: 45px; height: 45px;">
                                        <i class="bi bi-telephone text-primary" aria-hidden="true"></i>
                                    </div>
                                    <span>+62 123 456</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 reveal">
                    <iframe class="position-relative rounded w-100 h-100" title="Lokasi Liipa di Google Maps"
                        src="https://www.google.com/maps?q=Jl.+Sultan+Alauddin+No.63,+Makassar,+Sulawesi+Selatan&output=embed"
                        style="min-height: 400px; border:0;" allowfullscreen loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6">
                    <div class="reveal" style="--reveal-delay: 0.2s">
                        <p class="mb-4">Berikan pesan singkat melalui email dengan mengisi formulir berikut.</p>
                        <form method="POST" action="{{ route('contact.send') }}" data-loading>
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Nama Anda" value="{{ old('name') }}" required>
                                        <label for="name">Nama Anda</label>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="Email Anda" value="{{ old('email') }}" required>
                                        <label for="email">Email Anda</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                            id="subject" name="subject" placeholder="Subjek" value="{{ old('subject') }}" required>
                                        <label for="subject">Subjek</label>
                                        @error('subject')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('message') is-invalid @enderror" id="message"
                                            name="message" placeholder="Tulis pesan Anda di sini" style="height: 150px" required>{{ old('message') }}</textarea>
                                        <label for="message">Pesan</label>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
