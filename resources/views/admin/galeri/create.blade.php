@extends('admin.layouts.app')

@section('title', 'Tambah Galeri')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Tambah Galeri</h4>
    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required>
                    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tipe <span class="text-danger">*</span></label>
                    <select name="tipe" class="form-select @error('tipe') is-invalid @enderror" required id="tipe-select">
                        <option value="foto" {{ old('tipe') == 'foto' ? 'selected' : '' }}>Foto</option>
                        <option value="video" {{ old('tipe') == 'video' ? 'selected' : '' }}>Video</option>
                    </select>
                    @error('tipe')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        <option value="">Pilih Kategori</option>
                        <option value="kegiatan" {{ old('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="fasilitas" {{ old('kategori') == 'fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                        <option value="prestasi" {{ old('kategori') == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                        <option value="wisuda" {{ old('kategori') == 'wisuda' ? 'selected' : '' }}>Wisuda</option>
                    </select>
                    @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Album</label>
                    <input type="text" name="album" class="form-control" value="{{ old('album') }}" placeholder="Nama album (opsional)">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="col-md-6 mb-3" id="foto-input">
                    <label class="form-label">File Foto</label>
                    <input type="file" name="file_path" class="form-control @error('file_path') is-invalid @enderror" accept="image/*">
                    @error('file_path')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3" id="video-input" style="display: none;">
                    <label class="form-label">URL Video (YouTube)</label>
                    <input type="url" name="video_url" class="form-control @error('video_url') is-invalid @enderror" value="{{ old('video_url') }}" placeholder="https://www.youtube.com/watch?v=...">
                    @error('video_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Urutan</label>
                    <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 0) }}" min="0">
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Simpan
            </button>
        </form>
    </div>
</div>

<script>
document.getElementById('tipe-select').addEventListener('change', function() {
    if (this.value === 'video') {
        document.getElementById('foto-input').style.display = 'none';
        document.getElementById('video-input').style.display = 'block';
    } else {
        document.getElementById('foto-input').style.display = 'block';
        document.getElementById('video-input').style.display = 'none';
    }
});
</script>
@endsection
