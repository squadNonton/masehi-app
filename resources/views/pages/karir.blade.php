@include('layouts.header')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Karir</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Karir</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-xxl py-5">
    <div class="container">
        <!-- Header Section -->
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase mb-2">Bergabung Bersama Kami</h6>
            <h1 class="display-6 mb-4">Lowongan Kerja</h1>
            <p class="text-secondary">
                Jadilah bagian dari keluarga besar SMA Masehi Kudus. Kami mencari individu yang berdedikasi untuk berkontribusi dalam pendidikan generasi penerus bangsa.
            </p>
        </div>

        <!-- Job Listings -->
        <div class="row g-4">
            @forelse($lowongan as $index => $item)
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="{{ 0.1 + (($index % 2) * 0.1) }}s">
                <div class="card border-0 shadow h-100 rounded-4" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 50px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.1)';">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="badge bg-primary px-3 py-2 rounded-pill mb-2">{{ ucfirst($item->tipe) }}</span>
                                <h4 class="mb-0">{{ $item->judul_posisi }}</h4>
                            </div>
                            <div class="btn-square bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fa fa-briefcase text-primary"></i>
                            </div>
                        </div>
                        
                        <p class="text-secondary mb-3">{{ Str::limit($item->deskripsi, 150) }}</p>
                        
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="badge bg-light text-dark">
                                <i class="fa fa-clock me-1"></i>Batas: {{ $item->batas_lamaran->format('d M Y') }}
                            </span>
                            @if($item->batas_lamaran->diffInDays(now()) <= 7)
                            <span class="badge bg-danger">
                                <i class="fa fa-exclamation-circle me-1"></i>Segera Tutup!
                            </span>
                            @endif
                        </div>
                        
                        <a href="{{ route('karir.detail', $item->slug) }}" class="btn btn-primary rounded-pill">
                            Lihat Detail <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fa fa-briefcase fa-5x text-secondary mb-4"></i>
                <h4>Tidak ada lowongan saat ini</h4>
                <p class="text-secondary">Saat ini belum ada lowongan yang tersedia. Silakan cek kembali nanti.</p>
            </div>
            @endforelse
        </div>

        <!-- CTA Section -->
        <div class="row mt-5 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12">
                <div class="bg-primary text-white text-center p-5 rounded-4">
                    <h3 class="mb-3">Tidak menemukan posisi yang sesuai?</h3>
                    <p class="mb-4">Kirimkan CV dan lamaran Anda ke email kami. Kami akan menghubungi Anda jika ada posisi yang cocok.</p>
                    <a href="mailto:hrd@masehikudus.sch.id" class="btn btn-light rounded-pill px-4">
                        <i class="fa fa-envelope me-2"></i>Kirim Lamaran
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
