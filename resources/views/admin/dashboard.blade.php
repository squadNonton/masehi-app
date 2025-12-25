@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4">
    <!-- Stat Cards -->
    <div class="col-md-3">
        <div class="card card-stat shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="icon bg-primary text-dark me-3">
                    <i class="fas fa-images"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['carousel'] }}</h3>
                    <small class="text-muted">Carousel</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="icon bg-info text-white me-3">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['program'] }}</h3>
                    <small class="text-muted">Program</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="icon bg-success text-white me-3">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['guru'] }}</h3>
                    <small class="text-muted">Guru</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stat shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="icon bg-warning text-dark me-3">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['pendaftaran'] }}</h3>
                    <small class="text-muted">Pendaftaran</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-2">
    <!-- Pending Registrations -->
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="fas fa-clock text-warning me-2"></i>Pendaftaran Pending</h6>
            </div>
            <div class="card-body">
                <h2 class="text-warning">{{ $stats['pendaftaran_pending'] }}</h2>
                <p class="text-muted mb-0">Menunggu review</p>
                <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-sm btn-outline-warning mt-3">Lihat Semua</a>
            </div>
        </div>
    </div>

    <!-- Unread Messages -->
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="fas fa-envelope text-danger me-2"></i>Pesan Belum Dibaca</h6>
            </div>
            <div class="card-body">
                <h2 class="text-danger">{{ $stats['kontak_unread'] }}</h2>
                <p class="text-muted mb-0">Pesan baru</p>
                <a href="{{ route('admin.kontak.index') }}" class="btn btn-sm btn-outline-danger mt-3">Lihat Semua</a>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-2">
    <!-- Newsletter Stats -->
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="fas fa-newspaper text-primary me-2"></i>Newsletter Subscribers</h6>
            </div>
            <div class="card-body">
                <h2>{{ $stats['newsletter'] }}</h2>
                <p class="text-muted mb-0">Total subscriber newsletter</p>
            </div>
        </div>
    </div>
</div>
@endsection
