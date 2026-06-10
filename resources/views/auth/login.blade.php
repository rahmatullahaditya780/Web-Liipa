@extends('layouts.app')

@section('title', "Masuk — Liipa'")

@section('content')
    <div class="auth-page">
        <div class="auth-card">
            <div class="text-center mb-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/icon.png') }}" alt="Logo Liipa" width="80" height="40">
                </a>
                <h1 class="h3 mt-3">Masuk</h1>
            </div>

            <form method="POST" action="{{ route('login.store') }}" data-loading>
                @csrf
                <div class="mb-3">
                    <label for="identity" class="form-label">Email atau Username</label>
                    <input type="text" class="form-control @error('identity') is-invalid @enderror" id="identity"
                        name="identity" value="{{ old('identity') }}" required autofocus autocomplete="username">
                    @error('identity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" required autocomplete="current-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember" value="1">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2">Masuk</button>
            </form>

            <p class="text-center mt-4 mb-0">Belum punya akun?
                <a href="{{ route('register') }}">Daftar di sini</a>
            </p>
        </div>
    </div>
@endsection
