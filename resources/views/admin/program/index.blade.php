@extends('admin.layouts.app')

@section('title', 'Kelola Program')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Daftar Program</h4>
    <a href="{{ route('admin.program.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Program
    </a>
</div>

<div class="row">
    @forelse($programs as $program)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100">
            @if($program->gambar)
            <img src="{{ asset('img/program/' . $program->gambar) }}" class="card-img-top" style="height: 150px; object-fit: cover;">
            @endif
            <div class="card-body">
                <span class="badge bg-primary mb-2">{{ $program->badge }}</span>
                <h5 class="card-title">{{ $program->judul }}</h5>
                <p class="card-text text-muted small">{{ Str::limit($program->deskripsi, 100) }}</p>
                <ul class="list-unstyled">
                    @foreach($program->items as $item)
                    <li class="small"><i class="{{ $item->icon }} text-primary me-1"></i>{{ $item->judul }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                <span class="badge {{ $program->is_active ? 'bg-success' : 'bg-secondary' }}">
                    {{ $program->is_active ? 'Aktif' : 'Nonaktif' }}
                </span>
                <div>
                    <a href="{{ route('admin.program.edit', $program) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.program.destroy', $program) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info">Belum ada data program</div>
    </div>
    @endforelse
</div>
@endsection
