<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Liipa'</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/icon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <!-- Brand -->
                <a href="index.php" class="navbar-brand d-flex align-items-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/icon.png" alt="Icon" style="width: 80px; height: 40px;">
                    </div>
                    <h1 class="m-0 text-primary">Liipa'</h1>
                </a>
        
                <!-- Toggler button untuk mobile -->
                <button class="navbar-toggler" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse"
                        aria-controls="navbarCollapse"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <!-- Menu yang di-collapse -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.php" class="nav-item nav-link">Home</a>
        
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <a href="katalog.php" class="nav-item nav-link">Katalog</a>
                            <a href="the-heroes.php" class="nav-item nav-link active">The Heroes</a>
                        <?php endif; ?>
        
                        <a href="about.php" class="nav-item nav-link">Tentang Kami</a>
                        <a href="contact.php" class="nav-item nav-link">Kontak</a>
                    </div>
        
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="/api/logout.php" class="btn btn-outline-danger px-3 d-lg-flex">Logout</a>
                    <?php else: ?>
                        <a href="/Login-SignUp-Liipa/login.php" class="btn btn-primary px-3 d-lg-flex">Masuk</a>
                    <?php endif; ?>
                </div><!-- .collapse -->
            </nav>
        </div>
        <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div style="height: 60px;"></div>
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">The Heroes</h1> 
                        <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page">The Heroes</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->

        
        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="ratio ratio-16x9">
                        <iframe
                            class="img-fluid w-100"
                            src="https://www.youtube.com/embed/xYlgCEXSG6k?si=eCrFml2AMPR1aX_7"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen>
                        </iframe>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">Mari Menjadi Heroes</h1>
                        <p class="mb-4">Liipa mengajak kamu menjadi bagian dari perubahan — sebagai Eco Heroes yang turut menjaga bumi dengan aksi nyata. Lewat program ini, kamu bisa:</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Mengumpulkan limbah tekstil dari sekitarmu untuk didaur ulang</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Berkontribusi dalam ekonomi sirkular yang berbasis nilai syariah</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Menjadi penggerak perubahan sosial & lingkungan di komunitasmu</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Mendapatkan insentif & pelatihan dari Liipa untuk setiap kontribusimu</p>
                        <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Call to Action Start -->
        <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
            <!-- Form Kontak -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <p class="mb-4">
                Jika Anda tertarik untuk menjalin hubungan kemitraan dengan kami, silakan isi formulir berikut.
                </p>
                <form id="contact-form" novalidate>
                <div class="row g-3">

                    <!-- Nama -->
                    <div class="col-md-6">
                    <div class="form-floating">
                        <input
                        type="text"
                        class="form-control"
                        id="nama"
                        name="nama"
                        placeholder="Nama Anda"
                        required
                        >
                        <label for="nama">Nama</label>
                        <div class="invalid-feedback">Tolong masukkan nama Anda.</div>
                    </div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                    <div class="form-floating">
                        <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="Email Anda"
                        required
                        >
                        <label for="email">Email</label>
                        <div class="invalid-feedback">Tolong masukkan email yang valid.</div>
                    </div>
                    </div>

                    <!-- No. HP -->
                    <div class="col-md-6">
                    <div class="form-floating">
                        <input
                        type="tel"
                        class="form-control"
                        id="phone"
                        name="phone"
                        placeholder="No. HP Anda"
                        pattern="[0-9+\-\s()]{7,}"
                        required
                        >
                        <label for="phone">No. HP</label>
                        <div class="invalid-feedback">Tolong masukkan nomor HP yang valid.</div>
                    </div>
                    </div>

                    <!-- Alamat -->
                    <div class="col-md-6">
                    <div class="form-floating">
                        <input
                        type="text"
                        class="form-control"
                        id="alamat"
                        name="alamat"
                        placeholder="Alamat lengkap Anda"
                        required
                        >
                        <label for="alamat">Alamat lengkap</label>
                        <div class="invalid-feedback">Tolong masukkan alamat tempat tinggal Anda.</div>
                    </div>
                    </div>

                    <!-- Pesan / Biografi -->
                    <div class="col-12">
                    <div class="form-floating">
                        <textarea
                        class="form-control"
                        id="message"
                        name="message"
                        placeholder="Ceritakan sedikit tentang diri Anda..."
                        style="height: 150px"
                        required
                        ></textarea>
                        <label for="message">Ceritakan sedikit tentang diri Anda dan kenapa ingin menjalin kemitraan</label>
                        <div class="invalid-feedback">Tolong tuliskan pesan atau biografi singkat.</div>
                    </div>
                    </div>

                    <!-- Submit -->
                    <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">
                        Kirim
                    </button>
                    </div>

                </div>
                </form>
                <!-- Feedback -->
                <div id="form-alert" class="mt-3" style="display:none;"></div>
            </div>
            </div>
        </div>
        </div>
        <!-- Call to Action End -->
        

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Makassar, Sulawesi Selatan</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 123 456</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>kainpercaid@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/liipa.id?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/@liipaid"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="about.php">About Us</a>
                        <a class="btn btn-link text-white-50" href="contact.php">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="#">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="#">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Dapatkan Penawaran Spesial</h5>
                        <p>Kirimkan email anda untuk kami berikan penawaran menarik.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Daftar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">2024 Liipa'</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="index.php">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        (function () {
            'use strict';
            const form = document.getElementById('contact-form');
            const alertBox = document.getElementById('form-alert');

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                e.stopPropagation();

                // Validasi form
                if (!form.checkValidity()) {
                    form.classList.add('was-validated');
                    return;
                }

                // Ambil nilai input
                const data = {
                    nama:    form.querySelector('[name="nama"]').value.trim(),
                    email:   form.querySelector('[name="email"]').value.trim(),
                    phone:   form.querySelector('[name="phone"]').value.trim(),
                    alamat:  form.querySelector('[name="alamat"]').value.trim(),
                    message: form.querySelector('[name="message"]').value.trim()
                };

                // Kirim POST JSON ke contact.php
                fetch('api/contact_for_heroes.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                })
                .then(async res => {
                    const contentType = res.headers.get('Content-Type');
                    if (!contentType || !contentType.includes('application/json')) {
                        const text = await res.text();
                        throw new Error('Respons bukan JSON: ' + text.slice(0, 100));
                    }
                    return res.json();
                })
                .then(json => {
                    alertBox.style.display = 'block';
                    if (json.success) {
                        alertBox.className = 'alert alert-success';
                        alertBox.textContent = 'Pesan berhasil terkirim!';
                        form.reset();
                        form.classList.remove('was-validated');
                    } else {
                        alertBox.className = 'alert alert-danger';
                        alertBox.textContent = 'Gagal mengirim: ' + json.error;
                    }
                })
                .catch(err => {
                    alertBox.style.display = 'block';
                    alertBox.className = 'alert alert-danger';
                    alertBox.textContent = 'Error: ' + err.message;
                });
            });
        })();
    </script>

</body>

</html>