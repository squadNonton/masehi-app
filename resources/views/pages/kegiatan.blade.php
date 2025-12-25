@include('layouts.header')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Kegiatan & Berita</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kegiatan</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Featured Article -->
                @if($featured)
                <div class="mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative rounded-4 overflow-hidden" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-5px)';" onmouseout="this.style.transform='translateY(0)';">
                        <a href="{{ route('kegiatan.detail', $featured->slug) }}">
                            <img src="{{ asset('img/berita/' . $featured->gambar) }}" class="w-100" alt="{{ $featured->judul }}" style="height: 400px; object-fit: cover;">
                            <div class="position-absolute bottom-0 start-0 end-0 p-4" style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                                <span class="badge bg-primary px-3 py-2 rounded-pill mb-2">{{ ucfirst($featured->kategori) }}</span>
                                <h3 class="text-white mb-2">{{ $featured->judul }}</h3>
                                <p class="text-white-50 mb-0">
                                    <i class="fa fa-calendar me-2"></i>{{ $featured->tanggal->format('d M Y') }}
                                    <span class="mx-2">|</span>
                                    <i class="fa fa-eye me-2"></i>{{ $featured->view_count }} views
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                @endif

                <!-- News Grid -->
                <div class="row g-4">
                    @forelse($berita as $index => $item)
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + (($index % 2) * 0.1) }}s">
                        <div class="card border-0 shadow h-100 rounded-4 overflow-hidden" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 50px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.1)';">
                            <div class="position-relative overflow-hidden">
                                @if($item->gambar)
                                <img src="{{ asset('img/berita/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 200px; object-fit: cover; transition: transform 0.4s;" onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';">
                                @else
                                <div class="bg-primary d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fa fa-newspaper fa-4x text-white"></i>
                                </div>
                                @endif
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge bg-primary px-3 py-2 rounded-pill">{{ ucfirst($item->kategori) }}</span>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between text-secondary small mb-2">
                                    <span><i class="fa fa-calendar me-1"></i> {{ $item->tanggal->format('d M Y') }}</span>
                                    <span><i class="fa fa-eye me-1"></i> {{ $item->view_count }}</span>
                                </div>
                                <h5 class="mb-3">
                                    <a href="{{ route('kegiatan.detail', $item->slug) }}" class="text-dark text-decoration-none">
                                        {{ Str::limit($item->judul, 50) }}
                                    </a>
                                </h5>
                                <p class="text-secondary mb-3">{{ Str::limit($item->excerpt ?? strip_tags($item->konten), 100) }}</p>
                                <a href="{{ route('kegiatan.detail', $item->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill">
                                    Baca Selengkapnya <i class="fa fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <i class="fa fa-newspaper fa-5x text-secondary mb-4"></i>
                        <h4>Belum ada berita</h4>
                        <p class="text-secondary">Berita dan kegiatan akan ditampilkan di sini.</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($berita->hasPages())
                <div class="mt-5 d-flex justify-content-center">
                    {{ $berita->links() }}
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Search -->
                <div class="card border-0 shadow rounded-4 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card-body p-4">
                        <h5 class="mb-3"><i class="fa fa-search text-primary me-2"></i>Cari Berita</h5>
                        <form action="{{ route('kegiatan') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-start" name="search" placeholder="Kata kunci..." value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Categories -->
                <div class="card border-0 shadow rounded-4 mb-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-body p-4">
                        <h5 class="mb-3"><i class="fa fa-folder text-primary me-2"></i>Kategori</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <a href="{{ route('kegiatan') }}" class="text-decoration-none d-flex justify-content-between align-items-center p-2 rounded {{ !request('kategori') ? 'bg-primary text-white' : 'text-dark' }}" style="transition: all 0.3s;">
                                    <span><i class="fa fa-angle-right me-2"></i>Semua</span>
                                    <span class="badge {{ !request('kategori') ? 'bg-white text-primary' : 'bg-primary' }}">{{ $berita->total() }}</span>
                                </a>
                            </li>
                            @foreach($categories as $cat)
                            <li class="mb-2">
                                <a href="{{ route('kegiatan', ['kategori' => $cat]) }}" class="text-decoration-none d-flex justify-content-between align-items-center p-2 rounded {{ request('kategori') == $cat ? 'bg-primary text-white' : 'text-dark' }}" style="transition: all 0.3s;">
                                    <span><i class="fa fa-angle-right me-2"></i>{{ ucfirst($cat) }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Recent Posts -->
                @if($berita->count() > 0)
                <div class="card border-0 shadow rounded-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="card-body p-4">
                        <h5 class="mb-3"><i class="fa fa-clock text-primary me-2"></i>Berita Terbaru</h5>
                        @foreach($berita->take(5) as $recent)
                        <div class="d-flex mb-3 pb-3 border-bottom">
                            @if($recent->gambar)
                            <img src="{{ asset('img/berita/' . $recent->gambar) }}" class="rounded me-3" alt="{{ $recent->judul }}" style="width: 80px; height: 60px; object-fit: cover;">
                            @else
                            <div class="bg-primary rounded me-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 60px;">
                                <i class="fa fa-newspaper text-white"></i>
                            </div>
                            @endif
                            <div>
                                <a href="{{ route('kegiatan.detail', $recent->slug) }}" class="text-dark text-decoration-none fw-bold small">
                                    {{ Str::limit($recent->judul, 40) }}
                                </a>
                                <br>
                                <small class="text-secondary">{{ $recent->tanggal->format('d M Y') }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
