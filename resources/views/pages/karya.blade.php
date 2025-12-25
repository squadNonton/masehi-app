@include('layouts.header')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Karya Siswa</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Karya</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-xxl py-5">
    <div class="container">
        <!-- Filter Section -->
        <div class="row mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a href="{{ route('karya') }}" class="btn {{ !request('kategori') ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill px-4">
                        Semua
                    </a>
                    @foreach($categories as $cat)
                    <a href="{{ route('karya', ['kategori' => $cat]) }}" class="btn {{ request('kategori') == $cat ? 'btn-primary' : 'btn-outline-primary' }} rounded-pill px-4">
                        {{ ucfirst($cat) }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Karya Grid -->
        <div class="row g-4">
            @forelse($karya as $index => $item)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + (($index % 3) * 0.1) }}s">
                <div class="card border-0 shadow h-100 rounded-4 overflow-hidden" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 50px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.1)';">
                    <div class="position-relative overflow-hidden">
                        @if($item->gambar)
                        <img src="{{ asset('img/karya/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 250px; object-fit: cover; transition: transform 0.4s;" onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';">
                        @else
                        <div class="bg-primary d-flex align-items-center justify-content-center" style="height: 250px;">
                            <i class="fa fa-paint-brush fa-4x text-white"></i>
                        </div>
                        @endif
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge bg-primary px-3 py-2 rounded-pill">{{ ucfirst($item->kategori) }}</span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="mb-2">{{ $item->judul }}</h5>
                        <div class="d-flex justify-content-between text-secondary small mb-3">
                            <span><i class="fa fa-user me-1"></i> {{ $item->nama_siswa }}</span>
                            <span><i class="fa fa-graduation-cap me-1"></i> {{ $item->kelas }}</span>
                        </div>
                        <p class="text-secondary mb-3">{{ Str::limit($item->deskripsi, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-secondary">{{ $item->tahun }}</small>
                            <a href="{{ route('karya.detail', $item->slug) }}" class="btn btn-sm btn-outline-primary rounded-pill">
                                Lihat Detail <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fa fa-paint-brush fa-5x text-secondary mb-4"></i>
                <h4>Belum ada karya</h4>
                <p class="text-secondary">Karya siswa akan ditampilkan di sini.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($karya->hasPages())
        <div class="mt-5 d-flex justify-content-center">
            {{ $karya->links() }}
        </div>
        @endif
    </div>
</div>

@include('layouts.footer')
