@extends('admin.layouts.app')

@section('title', 'Edit Fasilitas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Edit Fasilitas</h4>
    <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.fasilitas.update', $fasilitas) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label class="form-label">Nama Fasilitas <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $fasilitas->nama) }}" required>
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Urutan</label>
                    <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $fasilitas->urutan) }}" min="0">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
                    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Icon (Font Awesome Class)</label>
                    <input type="text" name="icon" class="form-control" value="{{ old('icon', $fasilitas->icon) }}" placeholder="Contoh: fa fa-building">
                    @if($fasilitas->icon)
                    <div class="mt-2">
                        Preview: <i class="{{ $fasilitas->icon }} fa-2x text-primary"></i>
                    </div>
                    @endif
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar</label>
                    @if($fasilitas->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('img/fasilitas/' . $fasilitas->gambar) }}" alt="{{ $fasilitas->nama }}" class="img-thumbnail" style="max-width: 200px;">
                    </div>
                    @endif
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ $fasilitas->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Update
            </button>
        </form>
    </div>
</div>
@endsection
