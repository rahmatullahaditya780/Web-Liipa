<footer class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 reveal">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h2 class="h5 text-white mb-4">Hubungi Kami</h2>
                <p class="mb-2"><i class="bi bi-geo-alt me-3" aria-hidden="true"></i>Jl. Sultan Alauddin No. 63 Makassar, Sulawesi Selatan</p>
                <p class="mb-2"><i class="bi bi-telephone me-3" aria-hidden="true"></i>+62 123 456</p>
                <p class="mb-2"><i class="bi bi-envelope me-3" aria-hidden="true"></i>kainpercaid@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" rel="noopener" target="_blank"
                        href="https://www.instagram.com/liipa.id" aria-label="Instagram Liipa">
                        <i class="bi bi-instagram" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-outline-light btn-social" rel="noopener" target="_blank"
                        href="https://www.youtube.com/@liipaid" aria-label="YouTube Liipa">
                        <i class="bi bi-youtube" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h2 class="h5 text-white mb-4">Tautan Cepat</h2>
                <a class="btn btn-link text-white-50" href="{{ route('about') }}">Tentang Kami</a>
                <a class="btn btn-link text-white-50" href="{{ route('contact') }}">Kontak</a>
                <a class="btn btn-link text-white-50" href="{{ route('catalog') }}">Katalog</a>
                <a class="btn btn-link text-white-50" href="{{ route('heroes') }}">The Heroes</a>
            </div>
            <div class="col-lg-4 col-md-6">
                <h2 class="h5 text-white mb-4">Dapatkan Penawaran Spesial</h2>
                <p>Kirimkan email Anda untuk kami berikan penawaran menarik.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <label for="newsletter-email" class="visually-hidden">Alamat email</label>
                    <input id="newsletter-email" class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="email"
                        placeholder="Email Anda">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Daftar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; {{ date('Y') }} <a class="border-bottom" href="{{ route('home') }}">Liipa'</a>. All Rights Reserved.
                    Designed by <a class="border-bottom" rel="noopener" href="https://htmlcodex.com">HTML Codex</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('catalog') }}">Katalog</a>
                        <a href="{{ route('contact') }}">Bantuan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
