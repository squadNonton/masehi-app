@include('layouts.header')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Galeri</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Galeri</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-xxl py-5">
    <div class="container">
        <!-- Filter Tabs -->
        <div class="row mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
                    <a href="{{ route('galeri') }}" class="btn {{ !request('tipe') ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill px-4">
                        <i class="fa fa-th-large me-2"></i>Semua
                    </a>
                    <a href="{{ route('galeri', ['tipe' => 'foto']) }}" class="btn {{ request('tipe') == 'foto' ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill px-4">
                        <i class="fa fa-image me-2"></i>Foto
                    </a>
                    <a href="{{ route('galeri', ['tipe' => 'video']) }}" class="btn {{ request('tipe') == 'video' ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill px-4">
                        <i class="fa fa-video me-2"></i>Video
                    </a>
                </div>
                
                <!-- Category Filter -->
                @if($categories->count() > 0)
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a href="{{ route('galeri', request()->except('kategori')) }}" class="btn btn-sm {{ !request('kategori') ? 'btn-dark' : 'btn-outline-dark' }} rounded-pill px-3">
                        Semua Kategori
                    </a>
                    @foreach($categories as $cat)
                    <a href="{{ route('galeri', array_merge(request()->all(), ['kategori' => $cat])) }}" class="btn btn-sm {{ request('kategori') == $cat ? 'btn-dark' : 'btn-outline-dark' }} rounded-pill px-3">
                        {{ ucfirst($cat) }}
                    </a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="row g-4">
            @forelse($galeri as $index => $item)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + (($index % 3) * 0.1) }}s">
                <div class="position-relative rounded-4 overflow-hidden" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 50px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.1)';">
                    @if($item->tipe == 'foto')
                        @if($item->file_path)
                        <a href="{{ asset('img/galeri/' . $item->file_path) }}" data-lightbox="gallery" data-title="{{ $item->judul }}">
                            <img src="{{ asset('img/galeri/' . $item->file_path) }}" class="w-100" alt="{{ $item->judul }}" style="height: 280px; object-fit: cover; transition: transform 0.4s;" onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="btn btn-light btn-sm rounded-circle"><i class="fa fa-search-plus"></i></span>
                            </div>
                        </a>
                        @else
                        <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 280px;">
                            <i class="fa fa-image fa-4x text-white"></i>
                        </div>
                        @endif
                    @else
                        <!-- Video -->
                        <div class="position-relative" style="height: 280px;">
                            @if($item->video_url)
                                @php
                                    $videoId = '';
                                    if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $item->video_url, $match)) {
                                        $videoId = $match[1];
                                    }
                                @endphp
                                @if($videoId)
                                <img src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg" class="w-100 h-100" alt="{{ $item->judul }}" style="object-fit: cover;">
                                <a href="{{ $item->video_url }}" target="_blank" class="position-absolute top-50 start-50 translate-middle">
                                    <div class="btn btn-primary btn-lg rounded-circle" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </a>
                                @endif
                            @else
                            <div class="bg-dark d-flex align-items-center justify-content-center h-100">
                                <i class="fa fa-video fa-4x text-white"></i>
                            </div>
                            @endif
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge bg-danger px-3 py-2 rounded-pill"><i class="fa fa-play me-1"></i>Video</span>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Caption -->
                    <div class="position-absolute bottom-0 start-0 end-0 p-3" style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                        <h6 class="text-white mb-1">{{ $item->judul }}</h6>
                        <small class="text-white-50">{{ ucfirst($item->kategori) }}</small>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fa fa-images fa-5x text-secondary mb-4"></i>
                <h4>Belum ada galeri</h4>
                <p class="text-secondary">Foto dan video akan ditampilkan di sini.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($galeri->hasPages())
        <div class="mt-5 d-flex justify-content-center">
            {{ $galeri->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Lightbox CSS (Add to header if not already included) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

@include('layouts.footer')
