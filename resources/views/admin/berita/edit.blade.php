@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Edit Berita</h4>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $berita->judul) }}" required>
                    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        <option value="">Pilih Kategori</option>
                        <option value="kegiatan" {{ old('kategori', $berita->kategori) == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="pengumuman" {{ old('kategori', $berita->kategori) == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                        <option value="akademik" {{ old('kategori', $berita->kategori) == 'akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="olahraga" {{ old('kategori', $berita->kategori) == 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                        <option value="seni" {{ old('kategori', $berita->kategori) == 'seni' ? 'selected' : '' }}>Seni</option>
                        <option value="keagamaan" {{ old('kategori', $berita->kategori) == 'keagamaan' ? 'selected' : '' }}>Keagamaan</option>
                    </select>
                    @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $berita->tanggal->format('Y-m-d')) }}" required>
                    @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author', $berita->author) }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Excerpt (Ringkasan)</label>
                    <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $berita->excerpt) }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Konten <span class="text-danger">*</span></label>
                    <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" rows="10" required>{{ old('konten', $berita->konten) }}</textarea>
                    @error('konten')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar</label>
                    @if($berita->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('img/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="img-thumbnail" style="max-width: 200px;">
                    </div>
                    @endif
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ $berita->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="is_featured" class="form-check-input" id="is_featured" {{ $berita->is_featured ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Featured</label>
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
