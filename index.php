<?php
session_start();
include "koneksi/ceksession.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Arsip Surat | Balai Spektrum Frekuensi Radio Kelas 1 Samarinda</title>
    <meta name="description" content="Sistem Informasi Pengarsipan Surat Balai Spektrum Frekuensi Radio Kelas 1 Samarinda">
    <meta name="author" content="Alpian - PPLG SMKN 7 Samarinda">

    <!-- Modern CSS frameworks and fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" href="img/icon.ico">

    <style>
      :root {
        --primary-color: #2563eb;
        --primary-dark: #1e40af;
        --secondary-color: #64748b;
        --dark-color: #0f172a;
        --light-color: #f8fafc;
        --gray-color: #e2e8f0;
        --success-color: #22c55e;
        --warning-color: #eab308;
        --danger-color: #ef4444;
      }

      body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        line-height: 1.6;
        color: var(--dark-color);
        background-color: var(--light-color);
      }

      .navbar {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        padding: 1rem 0;
        transition: all 0.3s ease;
      }

      .navbar.scrolled {
        padding: 0.5rem 0;
      }

      .navbar-brand {
        font-weight: 700;
        color: var(--primary-color);
        font-size: 1.5rem;
        transition: all 0.3s ease;
      }

      .navbar-brand .logo-dec {
        font-size: 0.875rem;
        color: var(--secondary-color);
        opacity: 0.9;
      }

      .nav-link {
        font-weight: 500;
        color: var(--dark-color);
        padding: 0.5rem 1rem;
        margin: 0 0.25rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
      }

      .nav-link:hover, .nav-link.active {
        color: var(--primary-color);
        background: rgba(37, 99, 235, 0.1);
      }

      .bg-color {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        min-height: 100vh;
        position: relative;
        overflow: hidden;
      }

      .bg-color::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml,<svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="40" stroke="rgba(255,255,255,0.1)" stroke-width="8" fill="none"/></svg>') repeat;
        opacity: 0.1;
      }

      .banner-info {
        padding-top: 10rem;
        position: relative;
      }

      .logo img {
        max-width: 100%;
        height: auto;
        filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
        animation: float 6s ease-in-out infinite;
      }

      @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
      }

      .btn {
        padding: 0.875rem 2.5rem;
        font-weight: 600;
        border-radius: 1rem;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.875rem;
      }

      .btn-light {
        background: rgba(255, 255, 255, 0.9);
        color: var(--primary-color);
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }

      .btn-light:hover {
        background: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
      }

      .btn-outline-light {
        border: 2px solid rgba(255, 255, 255, 0.9);
      }

      .btn-outline-light:hover {
        color: var(--primary-color);
        background: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
      }

      .section-padding {
        padding: 8rem 0;
      }

      .wrap-item {
        transition: all 0.4s ease;
        padding: 3rem;
        border-radius: 1.5rem;
        background: white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--gray-color);
        height: 100%;
        position: relative;
        overflow: hidden;
      }

      .wrap-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        opacity: 0;
        transition: all 0.4s ease;
        z-index: 0;
      }

      .wrap-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      }

      .wrap-item:hover::before {
        opacity: 0.03;
      }

      .wrap-item > * {
        position: relative;
        z-index: 1;
      }

      .portfolio-item {
        position: relative;
        overflow: hidden;
        border-radius: 1.5rem;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      }

      .portfolio-item img {
        transition: all 0.5s ease;
        width: 100%;
      }

      .portfolio-item:hover img {
        transform: scale(1.05);
      }

      #testimonial {
        background: var(--light-color);
        position: relative;
        overflow: hidden;
      }

      #testimonial::before {
        content: '';
        position: absolute;
        width: 200%;
        height: 200%;
        top: -50%;
        left: -50%;
        background: radial-gradient(circle, var(--primary-color) 0%, transparent 70%);
        opacity: 0.03;
      }

      .bottom-line {
        border: none;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        width: 80px;
        margin: 2.5rem auto;
        border-radius: 2px;
      }

      .loader {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: white;
      }

      #myDiv {
        display: none;
      }
    </style>
  </head>
  <body>
    <div class="loader"></div>
    <div id="myDiv">
      <div class="header">
        <div class="bg-color">
          <header id="main-header">
            <nav class="navbar navbar-expand-lg navbar-light fixed-top">
              <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="#">
                  <i class="fas fa-archive me-2"></i>
                  ARSIP SURAT
                  <span class="logo-dec ms-2">Balai Spektrum Frekuensi Radio Kelas 1 Samarinda</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                      <a class="nav-link active" href="#main-header">Beranda</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#feature">Tentang</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#portfolio">Pengembang</a>
                    </li>
                    <li class="nav-item ms-2">
                      <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                          <i class="fas fa-user me-2"></i>Masuk
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                          <li><a class="dropdown-item" href="admin/login"><i class="fas fa-user-shield me-2"></i>Admin</a></li>
                          <li><a class="dropdown-item" href="bagian/login"><i class="fas fa-users me-2"></i>Bagian</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </header>
          <div class="wrapper">
            <div class="container">
              <div class="row min-vh-100 align-items-center">
                <div class="col-lg-7 banner-info text-center text-lg-start">
                  <h1 class="display-4 text-white fw-bold mb-4">SISTEM INFORMASI PENGARSIPAN SURAT</h1>
                  <h3 class="text-white mb-4">Balai Spektrum Frekuensi Radio Kelas 1 Samarinda</h3>
                  <div class="d-flex gap-3 justify-content-center justify-content-lg-start">
                    <a href="#feature" class="btn btn-light">Pelajari Lebih Lanjut</a>
                    <a href="admin/login" class="btn btn-outline-light">Masuk</a>
                  </div>
                </div>
                <div class="col-lg-5 text-center mt-5 mt-lg-0">
                  <div class="logo">
                    <img src="img/balmon2.png" alt="Balmon Logo" class="img-fluid" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <section id="feature" class="section-padding wow fadeIn delay-05s">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <h2 class="display-5 fw-bold mb-4">Tentang</h2>
            <p class="lead mb-4">Website ini berguna untuk pengarsipan Surat Masuk dan Surat Keluar di Balai Spektrum Frekuensi Radio Kelas 1 Samarinda</p>
            <p class="mb-4">Surat diarsipkan dalam format PDF lalu disesuaikan nomor urutnya.</p>
            <div class="d-flex align-items-center justify-content-center gap-2 mb-5">
              <div class="border-3 border-primary" style="width: 50px; height: 3px;"></div>
              <h4 class="text-primary m-0">Pengarsipan Surat itu <strong>PENTING</strong></h4>
              <div class="border-3 border-primary" style="width: 50px; height: 3px;"></div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center g-4">
          <div class="col-md-5 col-lg-4">
            <div class="card border-0 shadow-sm h-100 wrap-item">
              <div class="card-body text-center p-4">
                <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-4">
                  <img src="img/inbox.png" alt="Surat Masuk" class="img-fluid" style="height: 48px;">
                </div>
                <h3 class="h4 mb-3">Surat Masuk</h3>
                <p class="text-muted mb-0">Kelola semua surat masuk dengan mudah dan terorganisir</p>
              </div>
            </div>
          </div>

          <div class="col-md-5 col-lg-4">
            <div class="card border-0 shadow-sm h-100 wrap-item">
              <div class="card-body text-center p-4">
                <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-4">
                  <img src="img/outbox.png" alt="Surat Keluar" class="img-fluid" style="height: 48px;">
                </div>
                <h3 class="h4 mb-3">Surat Keluar</h3>
                <p class="text-muted mb-0">Atur dan pantau surat keluar dengan sistem yang terintegrasi</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="portfolio" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <h2 class="display-5 fw-bold mb-4">Pengembang</h2>
            <p class="lead mb-5">"The difference between success and failure is a great team"</p>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm overflow-hidden">
              <img src="img/alpian.jpg" class="card-img-top" alt="Alpian">
              <div class="card-body text-center p-4">
                <h4 class="card-title mb-2">Alpian</h4>
                <p class="text-primary mb-3">PPLG SMKN 7 Samarinda</p>
                <p class="card-text text-muted">"Never put off till tomorrow what you can do today"</p>
                <div class="d-flex justify-content-center gap-3 mt-4">
                  <a href="#" class="btn btn-outline-primary btn-sm rounded-circle">
                    <i class="fab fa-github"></i>
                  </a>
                  <a href="#" class="btn btn-outline-primary btn-sm rounded-circle">
                    <i class="fab fa-linkedin"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="testimonial" class="py-5 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="text-center">
                    <i class="fas fa-quote-left fa-3x text-primary mb-4"></i>
                    <p class="lead mb-4">"Talent wins games, but teamwork and intelligence win championships."</p>
                    <div class="d-flex align-items-center justify-content-center">
                      <div>
                        <h5 class="mb-1">Michael Jordan</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="text-center">
                    <i class="fas fa-quote-left fa-3x text-primary mb-4"></i>
                    <p class="lead mb-4">"Alone we can do so little, together we can do so much."</p>
                    <div class="d-flex align-items-center justify-content-center">
                      <div>
                        <h5 class="mb-1">Helen Keller</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="bg-dark text-light py-4">
      <div class="container">
        <div class="row text-center">
          <div class="col-12">
            <p class="mb-2">© 2025 Alpian - PPLG SMKN 7 Samarinda. All Rights Reserved.</p>
            <p class="small text-muted mb-0">
              Developed with <i class="fas fa-heart text-danger"></i> by Alpian
            </p>
          </div>
        </div>
      </div>
    </footer>
    </div>

    <!-- Modern JavaScript dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="js/wow.js"></script>
    <script>
      // Initialize animations
      new WOW().init();

      // Remove loader when page is loaded
      $(window).on('load', function() {
        $(".loader").fadeOut();
        $("#myDiv").fadeIn();
      });
    </script>
  </body>
</html>
