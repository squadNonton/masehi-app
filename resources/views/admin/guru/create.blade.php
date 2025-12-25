@extends('admin.layouts.app')

@section('title', 'Tambah Guru')

@section('content')
<div class="row">
    <div class="col-lg-7">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="fas fa-edit me-2"></i>Form Input</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" name="nama" id="input-nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                        @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jabatan <span class="text-danger">*</span></label>
                        <input type="text" name="jabatan" id="input-jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan') }}" required>
                        @error('jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <h6 class="mt-4">Social Media</h6>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><i class="fab fa-facebook text-primary"></i> Facebook</label>
                            <input type="text" name="facebook" id="input-facebook" class="form-control" value="{{ old('facebook') }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><i class="fab fa-twitter text-info"></i> Twitter</label>
                            <input type="text" name="twitter" id="input-twitter" class="form-control" value="{{ old('twitter') }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><i class="fab fa-instagram text-danger"></i> Instagram</label>
                            <input type="text" name="instagram" id="input-instagram" class="form-control" value="{{ old('instagram') }}">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" name="foto" id="input-foto" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Urutan</label>
                                <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 0) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check mt-2">
                                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
                                    <label class="form-check-label" for="is_active">Aktif</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Live Preview Panel -->
    <div class="col-lg-5">
        <div class="card shadow-sm sticky-top" style="top: 20px;">
            <div class="card-header bg-dark text-white">
                <h6 class="mb-0"><i class="fas fa-eye me-2"></i>Live Preview</h6>
            </div>
            <div class="card-body">
                <div class="team-item bg-light rounded overflow-hidden text-center">
                    <div class="position-relative">
                        <img id="preview-foto" src="{{ asset('img/placeholder-user.png') }}" class="w-100" style="height: 200px; object-fit: cover; background: #ddd;" onerror="this.style.background='linear-gradient(135deg, #667eea 0%, #764ba2 100%)'">
                        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-3">
                            <span id="preview-fb" class="btn btn-sm btn-outline-light m-1" style="display: none;"><i class="fab fa-facebook-f"></i></span>
                            <span id="preview-tw" class="btn btn-sm btn-outline-light m-1" style="display: none;"><i class="fab fa-twitter"></i></span>
                            <span id="preview-ig" class="btn btn-sm btn-outline-light m-1" style="display: none;"><i class="fab fa-instagram"></i></span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h5 id="preview-nama" class="mb-1">Nama Guru</h5>
                        <span id="preview-jabatan" class="text-muted">Jabatan</span>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light">
                <small class="text-muted"><i class="fas fa-info-circle me-1"></i>Preview akan update otomatis saat Anda mengetik</small>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    $('#input-nama').on('input', function() {
        $('#preview-nama').text($(this).val() || 'Nama Guru');
    });

    $('#input-jabatan').on('input', function() {
        $('#preview-jabatan').text($(this).val() || 'Jabatan');
    });

    $('#input-facebook').on('input', function() {
        $(this).val() ? $('#preview-fb').show() : $('#preview-fb').hide();
    });

    $('#input-twitter').on('input', function() {
        $(this).val() ? $('#preview-tw').show() : $('#preview-tw').hide();
    });

    $('#input-instagram').on('input', function() {
        $(this).val() ? $('#preview-ig').show() : $('#preview-ig').hide();
    });

    $('#input-foto').on('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-foto').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endpush
@endsection
