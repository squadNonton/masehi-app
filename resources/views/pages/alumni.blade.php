@include('layouts.header')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Alumni Kami</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Alumni</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Alumni Stats Section -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card border-0 shadow text-center p-4 rounded-4" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)';" onmouseout="this.style.transform='translateY(0)';">
                    <div class="btn-square bg-primary text-white rounded-circle mx-auto mb-3" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                        <i class="fa fa-users fa-2x"></i>
                    </div>
                    <h2 class="text-primary mb-1">{{ $alumni->count() }}+</h2>
                    <p class="text-secondary mb-0">Total Alumni</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="card border-0 shadow text-center p-4 rounded-4" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)';" onmouseout="this.style.transform='translateY(0)';">
                    <div class="btn-square bg-primary text-white rounded-circle mx-auto mb-3" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                        <i class="fa fa-graduation-cap fa-2x"></i>
                    </div>
                    <h2 class="text-primary mb-1">50+</h2>
                    <p class="text-secondary mb-0">Universitas Tujuan</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="card border-0 shadow text-center p-4 rounded-4" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)';" onmouseout="this.style.transform='translateY(0)';">
                    <div class="btn-square bg-primary text-white rounded-circle mx-auto mb-3" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                        <i class="fa fa-star fa-2x"></i>
                    </div>
                    <h2 class="text-primary mb-1">{{ $featuredAlumni->count() }}</h2>
                    <p class="text-secondary mb-0">Alumni Berprestasi</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Alumni Section -->
@if($featuredAlumni->count() > 0)
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase mb-2">Alumni Berprestasi</h6>
            <h1 class="display-6 mb-4">Kebanggaan Kami</h1>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($featuredAlumni as $index => $item)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.1) }}s">
                <div class="card border-0 shadow h-100 rounded-4 overflow-hidden" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 50px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.1)';">
                    <div class="position-relative">
                        @if($item->foto)
                        <img src="{{ asset('img/alumni/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 280px; object-fit: cover;">
                        @else
                        <div class="bg-primary d-flex align-items-center justify-content-center" style="height: 280px;">
                            <i class="fa fa-user fa-5x text-white"></i>
                        </div>
                        @endif
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                <i class="fa fa-star me-1"></i> Featured
                            </span>
                        </div>
                    </div>
                    <div class="card-body p-4 text-center">
                        <h5 class="mb-1">{{ $item->nama }}</h5>
                        <p class="text-primary mb-2">Angkatan {{ $item->tahun_lulus }}</p>
                        @if($item->pekerjaan)
                        <p class="text-secondary small mb-2">
                            <i class="fa fa-briefcase me-1"></i> {{ $item->pekerjaan }}
                            @if($item->perusahaan) di {{ $item->perusahaan }} @endif
                        </p>
                        @endif
                        @if($item->universitas)
                        <p class="text-secondary small mb-0">
                            <i class="fa fa-graduation-cap me-1"></i> {{ $item->universitas }}
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- Alumni Testimonials -->
@if($alumni->whereNotNull('testimoni')->count() > 0)
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase mb-2">Testimoni</h6>
            <h1 class="display-6 mb-4">Kata Mereka</h1>
        </div>
        <div class="row g-4">
            @foreach($alumni->whereNotNull('testimoni')->take(3) as $index => $item)
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                <div class="card border-0 shadow h-100 rounded-4 p-4" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)';" onmouseout="this.style.transform='translateY(0)';">
                    <div class="d-flex align-items-center mb-4">
                        @if($item->foto)
                        <img src="{{ asset('img/alumni/' . $item->foto) }}" class="rounded-circle me-3" alt="{{ $item->nama }}" style="width: 60px; height: 60px; object-fit: cover;">
                        @else
                        <div class="bg-primary rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="fa fa-user text-white"></i>
                        </div>
                        @endif
                        <div>
                            <h6 class="mb-0">{{ $item->nama }}</h6>
                            <small class="text-primary">Angkatan {{ $item->tahun_lulus }}</small>
                        </div>
                    </div>
                    <p class="text-secondary fst-italic mb-0">
                        <i class="fa fa-quote-left text-primary me-2"></i>
                        {{ Str::limit($item->testimoni, 200) }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- All Alumni Section -->
@if($alumni->count() > 0)
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase mb-2">Daftar Alumni</h6>
            <h1 class="display-6 mb-4">Alumni SMA Masehi Kudus</h1>
        </div>
        <div class="row g-4">
            @foreach($alumni as $index => $item)
            <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="{{ 0.1 + (($index % 4) * 0.1) }}s">
                <div class="card border-0 shadow text-center rounded-4 overflow-hidden" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-8px)';" onmouseout="this.style.transform='translateY(0)';">
                    @if($item->foto)
                    <img src="{{ asset('img/alumni/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama }}" style="height: 200px; object-fit: cover;">
                    @else
                    <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fa fa-user fa-3x text-white"></i>
                    </div>
                    @endif
                    <div class="card-body p-3">
                        <h6 class="mb-1">{{ $item->nama }}</h6>
                        <small class="text-primary">Angkatan {{ $item->tahun_lulus }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@else
<div class="container-xxl py-5">
    <div class="container text-center">
        <i class="fa fa-users fa-5x text-secondary mb-4"></i>
        <h4>Belum ada data alumni</h4>
        <p class="text-secondary">Data alumni akan ditampilkan di sini.</p>
    </div>
</div>
@endif

@include('layouts.footer')
