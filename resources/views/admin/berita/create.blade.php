@extends('admin.layouts.app')

@section('title', 'Tambah Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Tambah Berita</h4>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required>
                    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        <option value="">Pilih Kategori</option>
                        <option value="kegiatan" {{ old('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="pengumuman" {{ old('kategori') == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                        <option value="akademik" {{ old('kategori') == 'akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="olahraga" {{ old('kategori') == 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                        <option value="seni" {{ old('kategori') == 'seni' ? 'selected' : '' }}>Seni</option>
                        <option value="keagamaan" {{ old('kategori') == 'keagamaan' ? 'selected' : '' }}>Keagamaan</option>
                    </select>
                    @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                    @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author', auth()->user()->name ?? '') }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Excerpt (Ringkasan)</label>
                    <textarea name="excerpt" class="form-control" rows="2" placeholder="Ringkasan singkat untuk tampilan card...">{{ old('excerpt') }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Konten <span class="text-danger">*</span></label>
                    <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" rows="10" required>{{ old('konten') }}</textarea>
                    @error('konten')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    @error('gambar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">
                        <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
                        <label class="form-check-label" for="is_active">Aktif</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="is_featured" class="form-check-input" id="is_featured">
                        <label class="form-check-label" for="is_featured">Featured (Tampil besar di halaman kegiatan)</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Simpan
            </button>
        </form>
    </div>
</div>
@endsection
