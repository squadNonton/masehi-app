@extends('admin.layouts.app')

@section('title', 'Pesan Kontak')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Pesan dari Pengunjung</h5>
        <span class="badge bg-danger">{{ $kontaks->where('is_dibaca', false)->count() }} Belum Dibaca</span>
    </div>
    <div class="card-body">
        @forelse($kontaks as $kontak)
        <div class="card mb-3 {{ !$kontak->is_dibaca ? 'border-primary' : '' }}">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="mb-1">
                            {{ $kontak->nama }}
                            @if(!$kontak->is_dibaca)
                            <span class="badge bg-primary">Baru</span>
                            @endif
                        </h5>
                        <small class="text-muted">
                            <i class="fas fa-envelope me-1"></i>{{ $kontak->email }}
                            @if($kontak->telepon)
                            | <i class="fas fa-phone me-1"></i>{{ $kontak->telepon }}
                            @endif
                        </small>
                    </div>
                    <div class="text-end">
                        <small class="text-muted">{{ $kontak->created_at->format('d M Y H:i') }}</small>
                        @if(!$kontak->is_dibaca)
                        <form action="{{ route('admin.kontak.markAsRead', $kontak->id) }}" method="POST" class="d-inline">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-outline-success ms-2">
                                <i class="fas fa-check"></i> Tandai Dibaca
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
                @if($kontak->subjek)
                <p class="fw-bold mt-2 mb-1">{{ $kontak->subjek }}</p>
                @endif
                <p class="mb-0 mt-2">{{ $kontak->pesan }}</p>
            </div>
        </div>
        @empty
        <div class="text-center text-muted py-5">
            <i class="fas fa-inbox fa-3x mb-3"></i>
            <p>Belum ada pesan dari pengunjung</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
