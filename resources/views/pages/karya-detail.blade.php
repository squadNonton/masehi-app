@include('layouts.header')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">{{ $karya->judul }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('karya') }}">Karya</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <!-- Image -->
                @if($karya->gambar)
                <div class="mb-4">
                    <img src="{{ asset('img/karya/' . $karya->gambar) }}" class="w-100 rounded-4" alt="{{ $karya->judul }}" style="max-height: 500px; object-fit: cover;">
                </div>
                @endif

                <!-- Content -->
                <div class="mb-4">
                    <span class="badge bg-primary px-3 py-2 rounded-pill mb-3">{{ ucfirst($karya->kategori) }}</span>
                    <h2>{{ $karya->judul }}</h2>
                </div>

                <div class="article-content mb-4" style="line-height: 1.8; text-align: justify;">
                    {!! nl2br(e($karya->deskripsi)) !!}
                </div>

                <!-- Download File -->
                @if($karya->file)
                <div class="mt-4">
                    <a href="{{ asset('files/karya/' . $karya->file) }}" class="btn btn-primary rounded-pill" download>
                        <i class="fa fa-download me-2"></i>Download File
                    </a>
                </div>
                @endif
            </div>

            <div class="col-lg-4">
                <!-- Back Button -->
                <div class="mb-4 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ route('karya') }}" class="btn btn-outline-primary rounded-pill">
                        <i class="fa fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>

                <!-- Info Card -->
                <div class="card border-0 shadow rounded-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-body p-4">
                        <h5 class="mb-4"><i class="fa fa-info-circle text-primary me-2"></i>Informasi Karya</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span class="text-secondary">Pembuat</span>
                                <strong>{{ $karya->nama_siswa }}</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span class="text-secondary">Kelas</span>
                                <strong>{{ $karya->kelas }}</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span class="text-secondary">Kategori</span>
                                <strong>{{ ucfirst($karya->kategori) }}</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="text-secondary">Tahun</span>
                                <strong>{{ $karya->tahun }}</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
