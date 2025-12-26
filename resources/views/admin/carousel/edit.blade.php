@extends('admin.layouts.app')

@section('title', 'Edit Carousel')

@section('content')
<div class="row">
    <div class="col-lg-7">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h6 class="mb-0"><i class="fas fa-edit me-2"></i>Form Edit</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.carousel.update', $carousel) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" name="judul" id="input-judul" class="form-control" value="{{ old('judul', $carousel->judul) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subjudul</label>
                        <textarea name="subjudul" id="input-subjudul" class="form-control summernote">{{ old('subjudul', $carousel->subjudul) }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Teks Tombol 1</label>
                                <input type="text" name="teks_tombol_1" id="input-tombol1" class="form-control" value="{{ old('teks_tombol_1', $carousel->teks_tombol_1) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Link Tombol 1</label>
                                <input type="text" name="link_tombol_1" class="form-control" value="{{ old('link_tombol_1', $carousel->link_tombol_1) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Teks Tombol 2</label>
                                <input type="text" name="teks_tombol_2" id="input-tombol2" class="form-control" value="{{ old('teks_tombol_2', $carousel->teks_tombol_2) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Link Tombol 2</label>
                                <input type="text" name="link_tombol_2" class="form-control" value="{{ old('link_tombol_2', $carousel->link_tombol_2) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Ganti Gambar</label>
                                <input type="file" name="gambar" id="input-gambar" class="form-control" accept="image/*">
                                <small class="text-muted">Kosongkan jika tidak ingin mengganti</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Urutan</label>
                                <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $carousel->urutan) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check mt-2">
                                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ $carousel->is_active ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Aktif</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.carousel.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Update</button>
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
            <div class="card-body p-0">
                <div class="position-relative" style="min-height: 250px; background: linear-gradient(135deg, #0C2B4B 0%, #1a4a7a 100%);">
                    <img id="preview-gambar" src="{{ asset('img/carousel/' . $carousel->gambar) }}" class="w-100" style="opacity: 0.7; min-height: 250px; object-fit: cover;">
                    <div class="position-absolute top-50 start-50 translate-middle text-center text-white w-100 px-3">
                        <h4 id="preview-judul" class="mb-2">{{ $carousel->judul }}</h4>
                        <div id="preview-subjudul" class="mb-3" style="font-size: 0.9rem;">{!! $carousel->subjudul !!}</div>
                        <div>
                            <span id="preview-btn1" class="btn btn-warning btn-sm me-1" style="{{ $carousel->teks_tombol_1 ? '' : 'display: none;' }}">{{ $carousel->teks_tombol_1 ?? 'Tombol 1' }}</span>
                            <span id="preview-btn2" class="btn btn-light btn-sm" style="{{ $carousel->teks_tombol_2 ? '' : 'display: none;' }}">{{ $carousel->teks_tombol_2 ?? 'Tombol 2' }}</span>
                        </div>
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
    $('#input-judul').on('input', function() {
        $('#preview-judul').text($(this).val() || 'Judul Carousel');
    });

    $('#input-subjudul').on('summernote.change', function(we, contents) {
        $('#preview-subjudul').html(contents || 'Subjudul akan muncul di sini');
    });

    $('#input-tombol1').on('input', function() {
        var val = $(this).val();
        if (val) {
            $('#preview-btn1').text(val).show();
        } else {
            $('#preview-btn1').hide();
        }
    });

    $('#input-tombol2').on('input', function() {
        var val = $(this).val();
        if (val) {
            $('#preview-btn2').text(val).show();
        } else {
            $('#preview-btn2').hide();
        }
    });

    $('#input-gambar').on('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-gambar').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endpush
@endsection
