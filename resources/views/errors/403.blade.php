@extends('layouts.app')

@section('title', "Akses Ditolak — Liipa'")

@section('content')
    <div class="container-xxl py-5 my-5 text-center">
        <i class="bi bi-shield-lock display-1 text-primary d-block mb-4" aria-hidden="true"></i>
        <h1 class="display-4 mb-3">403</h1>
        <p class="lead mb-4">{{ $exception->getMessage() ?: 'Anda tidak memiliki akses ke halaman ini.' }}</p>
        <a class="btn btn-primary py-3 px-5" href="{{ route('home') }}">Kembali ke Beranda</a>
    </div>
@endsection
