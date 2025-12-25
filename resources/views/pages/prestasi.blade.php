@include('layouts.header')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Prestasi</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Prestasi</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Stats Section -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4 justify-content-center mb-5">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card border-0 shadow text-center p-4 rounded-4 h-100" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)';" onmouseout="this.style.transform='translateY(0)';">
                    <div class="btn-square bg-primary text-white rounded-circle mx-auto mb-3" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                        <i class="fa fa-trophy fa-2x"></i>
                    </div>
                    <h2 class="text-primary mb-1">{{ $totalPrestasi }}</h2>
                    <p class="text-secondary mb-0">Total Prestasi</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="card border-0 shadow text-center p-4 rounded-4 h-100" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)';" onmouseout="this.style.transform='translateY(0)';">
                    <div class="btn-square bg-warning text-white rounded-circle mx-auto mb-3" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                        <i class="fa fa-medal fa-2x"></i>
                    </div>
                    <h2 class="text-warning mb-1">{{ $juara1 }}</h2>
                    <p class="text-secondary mb-0">Juara 1</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="card border-0 shadow text-center p-4 rounded-4 h-100" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)';" onmouseout="this.style.transform='translateY(0)';">
                    <div class="btn-square bg-success text-white rounded-circle mx-auto mb-3" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                        <i class="fa fa-flag fa-2x"></i>
                    </div>
                    <h2 class="text-success mb-1">{{ $nasional }}</h2>
                    <p class="text-secondary mb-0">Tingkat Nasional</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="card border-0 shadow text-center p-4 rounded-4 h-100" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)';" onmouseout="this.style.transform='translateY(0)';">
                    <div class="btn-square bg-info text-white rounded-circle mx-auto mb-3" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                        <i class="fa fa-globe fa-2x"></i>
                    </div>
                    <h2 class="text-info mb-1">{{ $internasional }}</h2>
                    <p class="text-secondary mb-0">Tingkat Internasional</p>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="row mb-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-12">
                <div class="card border-0 shadow rounded-4 p-4">
                    <form action="{{ route('prestasi') }}" method="GET" class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label class="form-label">Tingkat</label>
                            <select name="tingkat" class="form-select rounded-pill">
                                <option value="">Semua Tingkat</option>
                                @foreach($tingkatList as $tingkat)
                                <option value="{{ $tingkat }}" {{ request('tingkat') == $tingkat ? 'selected' : '' }}>{{ ucfirst($tingkat) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Kategori</label>
                            <select name="kategori" class="form-select rounded-pill">
                                <option value="">Semua Kategori</option>
                                @foreach($kategoriList as $kat)
                                <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>{{ ucfirst($kat) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tahun</label>
                            <select name="tahun" class="form-select rounded-pill">
                                <option value="">Semua Tahun</option>
                                @foreach($tahunList as $thn)
                                <option value="{{ $thn }}" {{ request('tahun') == $thn ? 'selected' : '' }}>{{ $thn }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary rounded-pill w-100">
                                <i class="fa fa-filter me-2"></i>Filter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Prestasi Grid -->
        <div class="row g-4">
            @forelse($prestasi as $index => $item)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + (($index % 3) * 0.1) }}s">
                <div class="card border-0 shadow h-100 rounded-4 overflow-hidden" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 50px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.1)';">
                    <div class="position-relative">
                        @if($item->gambar)
                        <img src="{{ asset('img/prestasi/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 200px; object-fit: cover;">
                        @else
                        <div class="bg-primary d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="fa fa-trophy fa-4x text-white"></i>
                        </div>
                        @endif
                        <div class="position-absolute top-0 start-0 m-3">
                            @php
                                $badgeColor = 'secondary';
                                if (str_contains(strtolower($item->peringkat), '1')) $badgeColor = 'warning';
                                elseif (str_contains(strtolower($item->peringkat), '2')) $badgeColor = 'secondary';
                                elseif (str_contains(strtolower($item->peringkat), '3')) $badgeColor = 'danger';
                            @endphp
                            <span class="badge bg-{{ $badgeColor }} px-3 py-2 rounded-pill">
                                <i class="fa fa-medal me-1"></i>{{ $item->peringkat }}
                            </span>
                        </div>
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-dark px-3 py-2 rounded-pill">{{ ucfirst($item->tingkat) }}</span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <span class="badge bg-light text-primary mb-2">{{ ucfirst($item->kategori) }}</span>
                        <h5 class="mb-2">{{ $item->judul }}</h5>
                        @if($item->nama_peserta)
                        <p class="text-secondary small mb-2">
                            <i class="fa fa-user me-1"></i> {{ $item->nama_peserta }}
                        </p>
                        @endif
                        @if($item->deskripsi)
                        <p class="text-secondary small mb-0">{{ Str::limit($item->deskripsi, 80) }}</p>
                        @endif
                    </div>
                    <div class="card-footer bg-white border-0 p-4 pt-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-secondary">
                                <i class="fa fa-calendar me-1"></i>{{ $item->tahun }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fa fa-trophy fa-5x text-secondary mb-4"></i>
                <h4>Belum ada prestasi</h4>
                <p class="text-secondary">Prestasi sekolah akan ditampilkan di sini.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($prestasi->hasPages())
        <div class="mt-5 d-flex justify-content-center">
            {{ $prestasi->appends(request()->query())->links() }}
        </div>
        @endif
    </div>
</div>

@include('layouts.footer')
