@include('layouts.header')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">{{ $lowongan->judul_posisi }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('karir') }}">Karir</a></li>
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
                <!-- Job Header -->
                <div class="mb-4">
                    <span class="badge bg-primary px-3 py-2 rounded-pill mb-3">{{ ucfirst($lowongan->tipe) }}</span>
                    <h2>{{ $lowongan->judul_posisi }}</h2>
                </div>

                <!-- Job Description -->
                <div class="mb-5">
                    <h5 class="text-primary mb-3"><i class="fa fa-file-alt me-2"></i>Deskripsi Pekerjaan</h5>
                    <div class="ps-4" style="line-height: 1.8;">
                        {!! nl2br(e($lowongan->deskripsi)) !!}
                    </div>
                </div>

                <!-- Requirements -->
                <div class="mb-5">
                    <h5 class="text-primary mb-3"><i class="fa fa-list-check me-2"></i>Persyaratan</h5>
                    <div class="ps-4" style="line-height: 1.8;">
                        {!! nl2br(e($lowongan->persyaratan)) !!}
                    </div>
                </div>

                <!-- Benefits -->
                @if($lowongan->benefit)
                <div class="mb-5">
                    <h5 class="text-primary mb-3"><i class="fa fa-gift me-2"></i>Benefit</h5>
                    <div class="ps-4" style="line-height: 1.8;">
                        {!! nl2br(e($lowongan->benefit)) !!}
                    </div>
                </div>
                @endif
            </div>

            <div class="col-lg-4">
                <!-- Back Button -->
                <div class="mb-4 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ route('karir') }}" class="btn btn-outline-primary rounded-pill">
                        <i class="fa fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>

                <!-- Job Info Card -->
                <div class="card border-0 shadow rounded-4 mb-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card-body p-4">
                        <h5 class="mb-4"><i class="fa fa-info-circle text-primary me-2"></i>Informasi Lowongan</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span class="text-secondary">Posisi</span>
                                <strong>{{ $lowongan->judul_posisi }}</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span class="text-secondary">Tipe</span>
                                <strong>{{ ucfirst($lowongan->tipe) }}</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span class="text-secondary">Batas Lamaran</span>
                                <strong class="{{ $lowongan->batas_lamaran->isPast() ? 'text-danger' : 'text-success' }}">
                                    {{ $lowongan->batas_lamaran->format('d M Y') }}
                                </strong>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="text-secondary">Status</span>
                                @if($lowongan->batas_lamaran->isPast())
                                <span class="badge bg-danger">Ditutup</span>
                                @else
                                <span class="badge bg-success">Dibuka</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Apply Card -->
                @if(!$lowongan->batas_lamaran->isPast())
                <div class="card border-0 shadow rounded-4 bg-primary text-white wow fadeInUp" data-wow-delay="0.3s">
                    <div class="card-body p-4 text-center">
                        <h5 class="mb-3">Tertarik dengan posisi ini?</h5>
                        <p class="mb-4 small">Kirimkan lamaran Anda sekarang!</p>
                        <a href="mailto:hrd@masehikudus.sch.id?subject=Lamaran {{ $lowongan->judul_posisi }}" class="btn btn-light rounded-pill w-100 mb-2">
                            <i class="fa fa-envelope me-2"></i>Kirim via Email
                        </a>
                        <a href="https://wa.me/62291437938?text=Halo, saya tertarik dengan lowongan {{ $lowongan->judul_posisi }}" target="_blank" class="btn btn-success rounded-pill w-100">
                            <i class="fab fa-whatsapp me-2"></i>Kirim via WhatsApp
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
