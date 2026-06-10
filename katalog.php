<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Liipa'</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/icon.png" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
  </head>

  <body>
    <div class="container-xxl bg-white p-0">
      <!-- Spinner Start -->
      <div
        id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
      >
        <div
          class="spinner-border text-primary"
          style="width: 3rem; height: 3rem"
          role="status"
        >
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
                            <a href="katalog.php" class="nav-item nav-link  active">Katalog</a>
                            <a href="the-heroes.php" class="nav-item nav-link">The Heroes</a>
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
          <div style="height: 60px"></div>
          <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Katalog</h1>
            <nav aria-label="breadcrumb animated fadeIn">
              <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li
                  class="breadcrumb-item text-body active"
                  aria-current="page"
                >
                  Katalog
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <!-- Header End -->

      <!-- Search Start -->
      <div
        class="container-fluid bg-primary mb-5 wow fadeIn"
        data-wow-delay="0.1s"
        style="padding: 35px"
      >
        <div class="container">
          <div class="row g-2">
            <div class="col-md-10">
              <div class="row g-2">
                <div class="col-md-4">
                  <input
                    id="cari_produk"
                    type="text"
                    class="form-control border-0 py-3"
                    placeholder="Search Keyword"
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>"
                  />
                </div>  
              </div>
            </div>
            <div class="col-md-2">
              <button onclick="search_produk()" class="btn btn-dark border-0 w-100 py-3">Search</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Search End -->

      <!-- Katalog Start -->
      <div class="container-xxl py-5">
        <div class="container">
          <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
              <div
                class="text-start mx-auto mb-5 wow slideInLeft"
                data-wow-delay="0.1s"
              >
                <h1 class="mb-3">Katalog</h1>
                <p>
                  Temukan berbagai macam produk kerajinan unik dari kain perca
                  disini:
                </p>
              </div>
            </div>
            <div
              class="col-lg-6 text-start text-lg-end wow slideInRight"
              data-wow-delay="0.1s"
            >
              <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                <li class="nav-item me-2">
                  <a
                    class="btn btn-outline-primary active"
                    data-bs-toggle="pill"
                    href="#tab-1"
                    >Featured</a
                  >
                </li>
                <li class="nav-item me-2">
                  <a
                    class="btn btn-outline-primary"
                    data-bs-toggle="pill"
                    href="#"
                    onclick="filterProduk('Aksesoris')"
                    >Aksesoris</a
                  >
                </li>
                <li class="nav-item me-2">
                  <a
                    class="btn btn-outline-primary"
                    data-bs-toggle="pill"
                    href="#"
                    onclick="filterProduk('Pakaian')"
                    >Pakaian</a
                  >
                </li>
                <li class="nav-item me-0">
                  <a
                    class="btn btn-outline-primary"
                    data-bs-toggle="pill"
                    href="#"
                    onclick="filterProduk('Tas')"
                    >Tas</a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="tab-content">
            <div id="tab-1" class="tab-pane show active fade p-0">
              <div id="list_produk" class="row g-4">
  
                
                
                

              </div>
              <div class="row g-4 load-more-wrapper">
                <div class="col-12 text-center mt-5 wow fadeInUp" data-wow-delay="0.5s">
                  <a class="btn btn-primary py-3 px-5" href="#">Muat lebih banyak</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Katalog End -->

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
      <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
        ><i class="bi bi-arrow-up"></i
      ></a>
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
      $(function() {
        const $list      = $("#list_produk");
        const $loadMore  = $(".load-more-wrapper");

        // state pencarian & kategori
        let currentSearch   = null;
        let currentCategory = null;

        // 1) Render produk
        function renderProduk(data) {
          let html = "";
          data.forEach(p => {
            html += `
              <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="property-item rounded overflow-hidden">
                  <div class="position-relative overflow-hidden">
                    <a href="#"><img class="img-fluid w-100 object-fit-cover" style="height:250px"
                        src="${p.gambar_produk}" alt="Gambar"></a>
                    <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                      ${p.detail_produk.nama_kategori}
                    </div>
                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                      ${p.nama_produk}
                    </div>
                  </div>
                  <div class="p-4 pb-0">
                    <h5 class="text-primary mb-3">Rp ${p.harga_produk}.000,00</h5>
                    <a class="d-block h5 mb-2" href="#">${p.deskripsi_produk}</a>
                  </div>
                  <div class="d-flex border-top">
                    <small class="flex-fill text-center border-end py-2">
                      <i class="fa fa-star text-primary me-2"></i>${p.rating}
                    </small>
                    <small class="flex-fill text-center py-2">
                      <i class="fa fa-palette text-primary me-2"></i>${p.jumlah_varian_warna} Varian
                    </small>
                  </div>
                </div>
              </div>`;
          });
          $list.html(html);
          $loadMore.toggle(data.length > 0);
        }

        // 2) Load featured (atau hasil search jika ada)
        function loadFeatured() {
          $list.empty();
          $loadMore.show();

          if (currentSearch) {
            // gunakan fungsi searchAjax tanpa kategori
            searchAjax(currentSearch, null);
          } else {
            // data default
            $.getJSON("/api/list_katalog.php")
              .done(data => {
                if (Array.isArray(data) && data.length) renderProduk(data);
                else {
                  $list.html("<h3>Produk kosong</h3>");
                  $loadMore.hide();
                }
              })
              .fail(() => {
                $list.html("<h3>Gagal memuat daftar produk</h3>");
                $loadMore.hide();
              });
          }
        }

        // 3) Filter kategori
        function filterProduk(kategori) {
          currentCategory = kategori;
          $list.empty();
          $loadMore.hide();

          if (currentSearch) {
            // kombinasi search + kategori
            searchAjax(currentSearch, kategori);
          } else {
            // hanya kategori
            $.getJSON("/api/filter_produk.php", { kategori })
              .done(resp => {
                if (resp.status && resp.result.length) {
                  renderProduk(resp.result);
                } else {
                  $list.html(`<h3>Produk kosong untuk kategori “${kategori}”</h3>`);
                }
              })
              .fail(() => {
                $list.html("<h3>Gagal memuat data kategori</h3>");
              });
          }
        }

        // 4) Pencarian (state + URL) lalu AJAX
        function searchProduk(query) {
          currentSearch = query;
          currentCategory = null;
          history.replaceState(null, '', "?search=" + encodeURIComponent(query));
          $list.empty();
          $loadMore.hide();
          searchAjax(query, null);
        }

        function searchAjax(query, kategori) {
          const data = { search: query };
          if (kategori) data.kategori = kategori;

          $.getJSON("/api/search.php", data)
            .done(resp => {
              if (resp.status && resp.result.length) {
                renderProduk(resp.result);
              } else {
                let msg = `Hasil “${query}”`;
                if (kategori) msg += ` kategori “${kategori}”`;
                msg += " tidak ditemukan";
                $list.html(`<h3>${msg}</h3>`);
              }
            })
            .fail(() => {
              $list.html("<h3>Gagal memuat hasil pencarian</h3>");
            });
        }

        // 5) Tangkap Enter & klik Search
        $("#cari_produk").on("keydown", e => {
          if (e.key === "Enter") {
            e.preventDefault();
            const q = $(e.target).val().trim();
            if (q) searchProduk(q);
          }
        });
        $(".btn-dark").on("click", () => {
          const q = $("#cari_produk").val().trim();
          if (q) searchProduk(q);
        });

        // 6) Nav pills
        // Featured
        $('a.btn-outline-primary[href="#tab-1"]').on("click", e => {
          e.preventDefault();
          new bootstrap.Tab(e.currentTarget).show();
          loadFeatured();
        });
        // Kategori lain
        $(".nav-pills a.btn-outline-primary")
          .not('[href="#tab-1"]')
          .on("click", e => {
            e.preventDefault();
            const kategori = $(e.currentTarget).text().trim();
            new bootstrap.Tab(e.currentTarget).show();
            filterProduk(kategori);
          });

        // 7) Inisialisasi
        const params = new URLSearchParams(window.location.search);
        if (params.has("search") && params.get("search").trim()) {
          const q0 = params.get("search").trim();
          $("#cari_produk").val(q0);
          currentSearch = q0;
          loadFeatured();
        } else {
          loadFeatured();
        }
      });
  </script>

  </body>
</html>
