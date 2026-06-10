@extends('layouts.app')

@section('title', "Daftar Akun — Liipa'")

@section('content')
    <div class="auth-page">
        <div class="auth-card">
            <div class="text-center mb-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/icon.png') }}" alt="Logo Liipa" width="80" height="40">
                </a>
                <h1 class="h3 mt-3">Daftar Akun</h1>
            </div>

            <form method="POST" action="{{ route('register.store') }}" data-loading>
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                        name="username" value="{{ old('username') }}" required autofocus autocomplete="username">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" required autocomplete="new-password" aria-describedby="passwordHelp">
                    <div id="passwordHelp" class="form-text">Minimal 8 karakter, mengandung huruf dan angka.</div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Ulangi Kata Sandi</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        required autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2">Daftar</button>
            </form>

            <p class="text-center mt-4 mb-0">Sudah punya akun?
                <a href="{{ route('login') }}">Masuk di sini</a>
            </p>
        </div>
    </div>
@endsection
