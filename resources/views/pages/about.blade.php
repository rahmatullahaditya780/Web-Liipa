@extends('layouts.app')

@section('title', "Tentang Kami — Liipa'")
@section('meta_description', 'Liipa.id adalah platform syariah pengelola limbah tekstil. Kenali misi, proses, dan tim di balik gerakan sustainable fashion kami.')

@section('content')
    {{-- Header --}}
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 mb-4">Tentang Kami</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">Tentang Kami</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6">
                <picture>
                    <source type="image/webp" srcset="{{ asset('img/hero1-600.webp') }} 600w, {{ asset('img/hero1-800.webp') }} 800w"
                        sizes="(max-width: 767px) 100vw, 50vw">
                    <img class="img-fluid w-100" src="{{ asset('img/hero1.jpeg') }}" width="800" height="800"
                        fetchpriority="high" alt="Produk kerajinan kain perca Liipa">
                </picture>
            </div>
        </div>
    </div>

    {{-- Tentang --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 reveal">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('img/hero2-600.webp') }} 600w, {{ asset('img/hero2-1200.webp') }} 1200w"
                                sizes="(max-width: 991px) 100vw, 50vw">
                            <img class="img-fluid w-100" src="{{ asset('img/hero2.jpg') }}" width="1200" height="1200"
                                loading="lazy" decoding="async" alt="Pengrajin mengolah kain perca menjadi produk baru">
                        </picture>
                    </div>
                </div>
                <div class="col-lg-6 reveal" style="--reveal-delay: 0.2s">
                    <h2 class="mb-4">Tempat No.1 untuk mencari produk kerajinan unik dari kain perca</h2>
                    <p class="mb-4">Liipa' lahir dari keprihatinan terhadap limbah tekstil yang terus menumpuk.
                        Kami percaya setiap potongan kain perca punya potensi menjadi produk bernilai — sekaligus
                        membuka lapangan kerja bagi pengrajin lokal dan mengurangi jejak karbon industri mode.</p>
                    <p><i class="bi bi-check-lg text-primary me-3" aria-hidden="true"></i>Bahan baku 100% kain perca daur ulang</p>
                    <p><i class="bi bi-check-lg text-primary me-3" aria-hidden="true"></i>Dikerjakan tangan oleh pengrajin lokal</p>
                    <p><i class="bi bi-check-lg text-primary me-3" aria-hidden="true"></i>Berbasis ekonomi sirkular dan nilai syariah</p>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="{{ route('contact') }}">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Tim --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 reveal" style="max-width: 600px;">
                <h2 class="mb-3">Tim Kami</h2>
                <p>Kesuksesan Liipa' tidak terlepas dari dedikasi tim kami yang penuh kreativitas, semangat, dan inovasi.</p>
            </div>
            <div class="row g-4">
                @foreach ([
                    ['name' => 'Mohammad Djafar Ramadhan', 'role' => "CEO & Founder Liipa'"],
                    ['name' => 'Muhammad Rofiq Roihan', 'role' => 'Front-end Developer'],
                    ['name' => 'Aditya Rahmatullah', 'role' => 'Full Stack Developer'],
                    ['name' => 'Fathier Muhammad Ariesta', 'role' => 'Front-end Developer'],
                ] as $member)
                    <div class="col-lg-3 col-md-6 reveal" style="--reveal-delay: {{ $loop->index * 0.15 }}s">
                        <div class="team-item rounded overflow-hidden h-100">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{ asset('img/placeholder-avatar.svg') }}"
                                    loading="lazy" decoding="async" width="300" height="300"
                                    alt="Foto {{ $member['name'] }}">
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h3 class="h5 fw-bold mb-0">{{ $member['name'] }}</h3>
                                <small>{{ $member['role'] }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
