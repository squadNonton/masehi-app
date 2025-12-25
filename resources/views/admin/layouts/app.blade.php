<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - SMA Masehi Kudus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #F3BD00;
            --secondary: #757575;
            --dark: #0C2B4B;
        }
        body { background-color: #f4f6f9; }
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: var(--dark);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
        }
        .sidebar .brand {
            padding: 20px;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 12px 20px;
            border-left: 3px solid transparent;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: var(--primary);
            border-left-color: var(--primary);
        }
        .sidebar .nav-link i { width: 25px; }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .top-bar {
            background: white;
            padding: 15px 20px;
            margin: -20px -20px 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .card-stat {
            border: none;
            border-radius: 10px;
            transition: transform 0.2s;
        }
        .card-stat:hover { transform: translateY(-5px); }
        .card-stat .icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        .btn-primary { background: var(--primary); border-color: var(--primary); color: var(--dark); }
        .btn-primary:hover { background: #d4a500; border-color: #d4a500; color: var(--dark); }
        /* Summernote fix */
        .note-editor { border: 1px solid #dee2e6; border-radius: 0.375rem; }
        .note-editable { min-height: 150px; }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="brand">
            <i class="fas fa-school me-2"></i> Admin Panel
        </div>
        <nav class="nav flex-column mt-3">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('admin.carousel.*') ? 'active' : '' }}" href="{{ route('admin.carousel.index') }}">
                <i class="fas fa-images"></i> Carousel
            </a>
            <a class="nav-link {{ request()->routeIs('admin.program.*') ? 'active' : '' }}" href="{{ route('admin.program.index') }}">
                <i class="fas fa-graduation-cap"></i> Program
            </a>
            <a class="nav-link {{ request()->routeIs('admin.guru.*') ? 'active' : '' }}" href="{{ route('admin.guru.index') }}">
                <i class="fas fa-chalkboard-teacher"></i> Guru
            </a>
            <a class="nav-link {{ request()->routeIs('admin.pendaftaran.*') ? 'active' : '' }}" href="{{ route('admin.pendaftaran.index') }}">
                <i class="fas fa-user-graduate"></i> Pendaftaran
            </a>
            <a class="nav-link {{ request()->routeIs('admin.kontak.*') ? 'active' : '' }}" href="{{ route('admin.kontak.index') }}">
                <i class="fas fa-envelope"></i> Pesan Kontak
            </a>
            <a class="nav-link {{ request()->routeIs('admin.newsletter.*') ? 'active' : '' }}" href="{{ route('admin.newsletter.index') }}">
                <i class="fas fa-newspaper"></i> Newsletter
            </a>
            <hr class="text-white-50 mx-3">
            <small class="text-white-50 px-3 mb-2 d-block">KONTEN WEBSITE</small>
            <a class="nav-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}" href="{{ route('admin.berita.index') }}">
                <i class="fas fa-bullhorn"></i> Berita/Kegiatan
            </a>
            <a class="nav-link {{ request()->routeIs('admin.alumni.*') ? 'active' : '' }}" href="{{ route('admin.alumni.index') }}">
                <i class="fas fa-user-graduate"></i> Alumni
            </a>
            <a class="nav-link {{ request()->routeIs('admin.karya.*') ? 'active' : '' }}" href="{{ route('admin.karya.index') }}">
                <i class="fas fa-paint-brush"></i> Karya Siswa
            </a>
            <a class="nav-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}" href="{{ route('admin.galeri.index') }}">
                <i class="fas fa-photo-video"></i> Galeri
            </a>
            <a class="nav-link {{ request()->routeIs('admin.prestasi.*') ? 'active' : '' }}" href="{{ route('admin.prestasi.index') }}">
                <i class="fas fa-trophy"></i> Prestasi
            </a>
            <a class="nav-link {{ request()->routeIs('admin.karir.*') ? 'active' : '' }}" href="{{ route('admin.karir.index') }}">
                <i class="fas fa-briefcase"></i> Karir
            </a>
            <a class="nav-link {{ request()->routeIs('admin.fasilitas.*') ? 'active' : '' }}" href="{{ route('admin.fasilitas.index') }}">
                <i class="fas fa-building"></i> Fasilitas
            </a>
            <hr class="text-white-50 mx-3">
            <a class="nav-link" href="{{ route('home') }}" target="_blank">
                <i class="fas fa-external-link-alt"></i> Lihat Website
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar d-flex justify-content-between align-items-center">
            <h5 class="mb-0">@yield('title', 'Dashboard')</h5>
            <span class="text-muted">Selamat datang, {{ Auth::user()->name }}</span>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        // Initialize Summernote for all .summernote elements
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Georgia', 'Helvetica', 'Impact', 'Lucida Grande', 'Tahoma', 'Times New Roman', 'Verdana'],
                fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '24', '36', '48'],
            });
        });
    </script>
    @stack('scripts')
</body>
</html>

