@include('layouts.header')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">{{ $berita->judul }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kegiatan') }}">Kegiatan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
                <article class="wow fadeInUp" data-wow-delay="0.1s">
                    <!-- Article Header -->
                    <div class="mb-4">
                        <span class="badge bg-primary px-3 py-2 rounded-pill mb-3">{{ ucfirst($berita->kategori) }}</span>
                        <h1 class="display-6 mb-3">{{ $berita->judul }}</h1>
                        <div class="d-flex flex-wrap text-secondary mb-4">
                            <span class="me-4"><i class="fa fa-calendar me-2"></i>{{ $berita->tanggal->format('d F Y') }}</span>
                            @if($berita->author)
                            <span class="me-4"><i class="fa fa-user me-2"></i>{{ $berita->author }}</span>
                            @endif
                            <span><i class="fa fa-eye me-2"></i>{{ $berita->view_count }} kali dibaca</span>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    @if($berita->gambar)
                    <div class="mb-4">
                        <img src="{{ asset('img/berita/' . $berita->gambar) }}" class="w-100 rounded-4" alt="{{ $berita->judul }}" style="max-height: 500px; object-fit: cover;">
                    </div>
                    @endif

                    <!-- Article Content -->
                    <div class="article-content mb-5" style="line-height: 1.8; text-align: justify;">
                        {!! $berita->konten !!}
                    </div>

                    <!-- Share Buttons -->
                    <div class="border-top border-bottom py-4 mb-5">
                        <div class="d-flex align-items-center">
                            <span class="me-3 fw-bold">Bagikan:</span>
                            <a href="https://wa.me/?text={{ urlencode($berita->judul . ' - ' . route('kegiatan.detail', $berita->slug)) }}" target="_blank" class="btn btn-success btn-sm rounded-circle me-2" title="WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('kegiatan.detail', $berita->slug) }}" target="_blank" class="btn btn-primary btn-sm rounded-circle me-2" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ route('kegiatan.detail', $berita->slug) }}" target="_blank" class="btn btn-info btn-sm rounded-circle me-2" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <button onclick="navigator.clipboard.writeText('{{ route('kegiatan.detail', $berita->slug) }}'); alert('Link berhasil disalin!');" class="btn btn-secondary btn-sm rounded-circle" title="Salin Link">
                                <i class="fa fa-link"></i>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- Related Articles -->
                @if($related->count() > 0)
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <h4 class="mb-4">Berita Terkait</h4>
                    <div class="row g-4">
                        @foreach($related as $item)
                        <div class="col-md-4">
                            <div class="card border-0 shadow h-100 rounded-4 overflow-hidden" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-5px)';" onmouseout="this.style.transform='translateY(0)';">
                                @if($item->gambar)
                                <img src="{{ asset('img/berita/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 150px; object-fit: cover;">
                                @else
                                <div class="bg-primary d-flex align-items-center justify-content-center" style="height: 150px;">
                                    <i class="fa fa-newspaper fa-2x text-white"></i>
                                </div>
                                @endif
                                <div class="card-body p-3">
                                    <small class="text-secondary">{{ $item->tanggal->format('d M Y') }}</small>
                                    <h6 class="mt-2">
                                        <a href="{{ route('kegiatan.detail', $item->slug) }}" class="text-dark text-decoration-none">
                                            {{ Str::limit($item->judul, 40) }}
                                        </a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Back Button -->
                <div class="mb-4 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ route('kegiatan') }}" class="btn btn-outline-primary rounded-pill">
                        <i class="fa fa-arrow-left me-2"></i>Kembali ke Daftar
                    </a>
                </div>

                <!-- Article Info -->
                <div class="card border-0 shadow rounded-4 mb-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-body p-4">
                        <h5 class="mb-3"><i class="fa fa-info-circle text-primary me-2"></i>Informasi</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span class="text-secondary">Tanggal</span>
                                <strong>{{ $berita->tanggal->format('d M Y') }}</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span class="text-secondary">Kategori</span>
                                <strong>{{ ucfirst($berita->kategori) }}</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="text-secondary">Dilihat</span>
                                <strong>{{ $berita->view_count }}x</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
