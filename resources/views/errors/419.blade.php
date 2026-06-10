@extends('layouts.app')

@section('title', "Sesi Kedaluwarsa — Liipa'")

@section('content')
    <div class="container-xxl py-5 my-5 text-center">
        <i class="bi bi-hourglass-bottom display-1 text-primary d-block mb-4" aria-hidden="true"></i>
        <h1 class="display-4 mb-3">419</h1>
        <p class="lead mb-4">Sesi Anda sudah kedaluwarsa. Silakan muat ulang halaman dan coba lagi.</p>
        <a class="btn btn-primary py-3 px-5" href="{{ url()->previous() }}">Coba Lagi</a>
    </div>
@endsection
