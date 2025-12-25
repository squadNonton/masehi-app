<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SMA Masehi Kudus</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/floating.css') }}" rel="stylesheet">
    <style>
        /* .blue-tr-bg {
            background-color: rgb(0, 191, 255);
            color: #000000;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
            opacity: 10%;
            } */

            .foncam{
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            }
            .focol{
                color: rgb(255, 238, 0);
            }
    </style>
</head>

<body">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark text-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Jl.KH.Wahid Hasyim N0 51 59317 Kudus Central Java</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Mon - Fri : 09.00 AM - 09.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+62 291 437938</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-instagram"></i></a>
                    <!-- Admin Login Icon -->
                    <a class="btn btn-square btn-link rounded-0 border-0" href="{{ auth()->check() ? route('admin.dashboard') : route('login') }}" title="{{ auth()->check() ? 'Admin Panel' : 'Login Admin' }}"><i class="fas fa-user-shield"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
            <h2 class="m-0"><i class="text-primary me-2"><img src="{{ asset('img/logomasehi.png') }}" width="50" height="50" alt="Image"></i></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang Kami</a>
                <a href="{{ route('alumni') }}" class="nav-item nav-link {{ request()->routeIs('alumni') ? 'active' : '' }}">Alumni</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ request()->routeIs('kegiatan*') || request()->routeIs('karya*') || request()->routeIs('galeri*') || request()->routeIs('prestasi*') || request()->routeIs('karir*') ? 'active' : '' }}" data-bs-toggle="dropdown">Informasi</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="{{ route('kegiatan') }}" class="dropdown-item"><i class="fas fa-calendar-alt me-2 text-primary"></i>Kegiatan</a>
                        <a href="{{ route('karya') }}" class="dropdown-item"><i class="fas fa-paint-brush me-2 text-primary"></i>Karya</a>
                        <a href="{{ route('galeri') }}" class="dropdown-item"><i class="fas fa-images me-2 text-primary"></i>Galeri</a>
                        <a href="{{ route('prestasi') }}" class="dropdown-item"><i class="fas fa-trophy me-2 text-primary"></i>Prestasi</a>
                        <a href="{{ route('karir') }}" class="dropdown-item"><i class="fas fa-briefcase me-2 text-primary"></i>Karir</a>
                    </div>
                </div>
                <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Hubungi Kami</a>
                <!-- Mobile Login Link -->
                <a href="{{ auth()->check() ? route('admin.dashboard') : route('login') }}" class="nav-item nav-link d-lg-none">
                    <i class="fas fa-user-shield me-1"></i> {{ auth()->check() ? 'Admin Panel' : 'Login Admin' }}
                </a>
            </div>
            <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">WhatsApps<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->