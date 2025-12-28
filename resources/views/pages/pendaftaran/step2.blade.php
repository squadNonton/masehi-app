@include('layouts.header')

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Lengkapi Data Pendaftaran</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Tahap 2</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="bg-white shadow rounded p-4 p-sm-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                        <h1 class="display-6 mb-3">Data Calon Siswa</h1>
                        <p class="text-primary mb-0">Silakan lengkapi formulir di bawah ini untuk menyelesaikan proses pendaftaran.</p>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('pendaftaran.updateStep2', $pendaftaran->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- DATA PRIBADI (Read Only / Phase 1) -->
                        <h4 class="mb-3 text-primary"><i class="fa fa-user me-2"></i>Data Awal (Tahap 1)</h4>
                        <div class="row g-3 mb-5">
                            <div class="col-md-6">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control bg-light" value="{{ $pendaftaran->nama_lengkap }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Email Akun</label>
                                <input type="text" class="form-control bg-light" value="{{ $pendaftaran->email_akun }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">No. HP Siswa</label>
                                <input type="text" class="form-control bg-light" value="{{ $pendaftaran->no_hp_siswa }}" readonly>
                            </div>
                        </div>

                        <!-- DATA PRIBADI LENGKAP -->
                        <h4 class="mb-3 text-primary border-bottom pb-2"><i class="fa fa-id-card me-2"></i>Data Pribadi Lengkap</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="agama" class="form-label">Agama</label>
                                <select class="form-select @error('agama') is-invalid @enderror" id="agama" name="agama" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    <option value="Lainnya" {{ old('agama') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @error('agama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-12">
                                <label for="alamat_siswa" class="form-label">Alamat Lengkap Siswa</label>
                                <textarea class="form-control @error('alamat_siswa') is-invalid @enderror" id="alamat_siswa" name="alamat_siswa" rows="3" required>{{ old('alamat_siswa') }}</textarea>
                                @error('alamat_siswa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-md-3">
                                <label for="desa_siswa" class="form-label">Desa/Kelurahan</label>
                                <input type="text" class="form-control @error('desa_siswa') is-invalid @enderror" id="desa_siswa" name="desa_siswa" value="{{ old('desa_siswa') }}" required>
                                @error('desa_siswa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="kec_siswa" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control @error('kec_siswa') is-invalid @enderror" id="kec_siswa" name="kec_siswa" value="{{ old('kec_siswa') }}" required>
                                @error('kec_siswa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="kab_siswa" class="form-label">Kabupaten/Kota</label>
                                <input type="text" class="form-control @error('kab_siswa') is-invalid @enderror" id="kab_siswa" name="kab_siswa" value="{{ old('kab_siswa') }}" required>
                                @error('kab_siswa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="prov_siswa" class="form-label">Provinsi</label>
                                <input type="text" class="form-control @error('prov_siswa') is-invalid @enderror" id="prov_siswa" name="prov_siswa" value="{{ old('prov_siswa') }}" required>
                                @error('prov_siswa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <!-- KONTAK & SEKOLAH -->
                        <h4 class="mb-3 text-primary border-bottom pb-2"><i class="fa fa-school me-2"></i>Kontak & Sekolah Asal</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="email_siswa" class="form-label">Email Siswa (Opsional)</label>
                                <input type="email" class="form-control @error('email_siswa') is-invalid @enderror" id="email_siswa" name="email_siswa" value="{{ old('email_siswa') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="sekolah_asal_smp" class="form-label">Asal Sekolah (SMP/MTs)</label>
                                <input type="text" class="form-control @error('sekolah_asal_smp') is-invalid @enderror" id="sekolah_asal_smp" name="sekolah_asal_smp" value="{{ old('sekolah_asal_smp') }}" required>
                                @error('sekolah_asal_smp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ old('nisn') }}" required>
                                @error('nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>


                        <!-- DATA SAUDARA -->
                        <h4 class="mb-3 text-primary border-bottom pb-2"><i class="fa fa-users me-2"></i>Saudara di Masehi</h4>
                         <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <label class="form-label">Apakah punya saudara kandung yang bersekolah di Masehi?</label>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="punya_saudara_masehi" id="saudara_ya" value="YA" {{ old('punya_saudara_masehi') == 'YA' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="saudara_ya">YA</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="punya_saudara_masehi" id="saudara_tidak" value="TIDAK" {{ old('punya_saudara_masehi') == 'TIDAK' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="saudara_tidak">TIDAK</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Conditional inputs via JS could be added here, showing all for now -->
                            <div class="col-md-4">
                                <label for="nama_saudara" class="form-label">Nama Saudara</label>
                                <input type="text" class="form-control" id="nama_saudara" name="nama_saudara" value="{{ old('nama_saudara') }}">
                            </div>
                             <div class="col-md-4">
                                <label for="kelas_saudara" class="form-label">Kelas</label>
                                <input type="text" class="form-control" id="kelas_saudara" name="kelas_saudara" value="{{ old('kelas_saudara') }}">
                            </div>
                             <div class="col-md-4">
                                <label for="unit_saudara" class="form-label">Unit (SD/SMP/SMA)</label>
                                <input type="text" class="form-control" id="unit_saudara" name="unit_saudara" value="{{ old('unit_saudara') }}">
                            </div>
                        </div>

                        <!-- DATA ORANG TUA (AYAH) -->
                        <h4 class="mb-3 text-primary border-bottom pb-2"><i class="fa fa-male me-2"></i>Data Ayah</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="nama_ayah" class="form-label">Nama Lengkap Ayah</label>
                                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah') }}" required>
                            </div>
                            <div class="col-md-3">
                                <label for="tempat_lahir_ayah" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" value="{{ old('tempat_lahir_ayah') }}">
                            </div>
                             <div class="col-md-3">
                                <label for="tgl_lahir_ayah" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir_ayah" name="tgl_lahir_ayah" value="{{ old('tgl_lahir_ayah') }}">
                            </div>
                             <div class="col-md-3">
                                <label for="no_hp_ayah" class="form-label">No. HP Ayah</label>
                                <input type="text" class="form-control" id="no_hp_ayah" name="no_hp_ayah" value="{{ old('no_hp_ayah') }}" required>
                            </div>
                             <div class="col-md-5">
                                <label for="pekerjaan_ayah" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}">
                            </div>
                             <div class="col-md-4">
                                <label for="penghasilan_ayah" class="form-label">Penghasilan (per bulan)</label>
                                <select class="form-select border-0 bg-light" id="penghasilan_ayah" name="penghasilan_ayah">
                                    <option value="">Pilih Range Penghasilan</option>
                                    <option value="< 1 Juta">Kurang dari 1 Juta</option>
                                    <option value="1-3 Juta">1 - 3 Juta</option>
                                    <option value="3-5 Juta">3 - 5 Juta</option>
                                    <option value="5-10 Juta">5 - 10 Juta</option>
                                    <option value="> 10 Juta">Lebih dari 10 Juta</option>
                                </select>
                            </div>
                        </div>

                        <!-- DATA ORANG TUA (IBU) -->
                        <h4 class="mb-3 text-primary border-bottom pb-2"><i class="fa fa-female me-2"></i>Data Ibu</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="nama_ibu" class="form-label">Nama Lengkap Ibu</label>
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}" required>
                            </div>
                             <div class="col-md-3">
                                <label for="tempat_lahir_ibu" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" value="{{ old('tempat_lahir_ibu') }}">
                            </div>
                             <div class="col-md-3">
                                <label for="tgl_lahir_ibu" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir_ibu" name="tgl_lahir_ibu" value="{{ old('tgl_lahir_ibu') }}">
                            </div>
                             <div class="col-md-3">
                                <label for="no_hp_ibu" class="form-label">No. HP Ibu</label>
                                <input type="text" class="form-control" id="no_hp_ibu" name="no_hp_ibu" value="{{ old('no_hp_ibu') }}" required>
                            </div>
                             <div class="col-md-5">
                                <label for="pekerjaan_ibu" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}">
                            </div>
                             <div class="col-md-4">
                                <label for="penghasilan_ibu" class="form-label">Penghasilan (per bulan)</label>
                                <select class="form-select border-0 bg-light" id="penghasilan_ibu" name="penghasilan_ibu">
                                    <option value="">Pilih Range Penghasilan</option>
                                    <option value="< 1 Juta">Kurang dari 1 Juta</option>
                                    <option value="1-3 Juta">1 - 3 Juta</option>
                                    <option value="3-5 Juta">3 - 5 Juta</option>
                                    <option value="5-10 Juta">5 - 10 Juta</option>
                                    <option value="> 10 Juta">Lebih dari 10 Juta</option>
                                </select>
                            </div>
                        </div>

                         <!-- DOMISILI ORTU -->
                        <h4 class="mb-3 text-primary border-bottom pb-2"><i class="fa fa-home me-2"></i>Alamat Orang Tua</h4>
                         <div class="row g-3 mb-4">
                            <div class="col-12">
                                <label for="alamat_ortu" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" id="alamat_ortu" name="alamat_ortu" rows="2">{{ old('alamat_ortu') }}</textarea>
                                <small class="text-muted">*Kosongkan jika sama dengan alamat siswa</small>
                            </div>
                             <div class="col-md-3">
                                <label for="desa_ortu" class="form-label">Desa/Kelurahan</label>
                                <input type="text" class="form-control" id="desa_ortu" name="desa_ortu" value="{{ old('desa_ortu') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="kec_ortu" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="kec_ortu" name="kec_ortu" value="{{ old('kec_ortu') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="kab_ortu" class="form-label">Kabupaten/Kota</label>
                                <input type="text" class="form-control" id="kab_ortu" name="kab_ortu" value="{{ old('kab_ortu') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="prov_ortu" class="form-label">Provinsi</label>
                                <input type="text" class="form-control" id="prov_ortu" name="prov_ortu" value="{{ old('prov_ortu') }}">
                            </div>
                        </div>

                        <!-- PEKERJAAN ORTU (MASEHI) -->
                        <h4 class="mb-3 text-primary border-bottom pb-2"><i class="fa fa-briefcase me-2"></i>Pekerjaan Orang Tua (Lingkungan Masehi)</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <label class="form-label">Apakah orang tua karyawan di lingkungan Masehi?</label>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ortu_karyawan_masehi" id="karyawan_ya" value="YA" {{ old('ortu_karyawan_masehi', $pendaftaran->ortu_karyawan_masehi) == 'YA' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="karyawan_ya">YA</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ortu_karyawan_masehi" id="karyawan_tidak" value="TIDAK" {{ old('ortu_karyawan_masehi', $pendaftaran->ortu_karyawan_masehi) == 'TIDAK' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="karyawan_tidak">TIDAK</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="bagian_karyawan_masehi" class="form-label">Bagian / Unit Kerja</label>
                                <input type="text" class="form-control" id="bagian_karyawan_masehi" name="bagian_karyawan_masehi" value="{{ old('bagian_karyawan_masehi', $pendaftaran->bagian_karyawan_masehi) }}" placeholder="Isi jika YA">
                            </div>
                        </div>

                        <!-- SEKOLAH ORTU (ALUMNI) -->
                        <h4 class="mb-3 text-primary border-bottom pb-2"><i class="fa fa-graduation-cap me-2"></i>Data Alumni Orang Tua</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <label class="form-label">Apakah orang tua alumni sekolah Masehi?</label>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ortu_alumni_masehi" id="alumni_ya" value="YA" {{ old('ortu_alumni_masehi', $pendaftaran->ortu_alumni_masehi) == 'YA' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="alumni_ya">YA</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ortu_alumni_masehi" id="alumni_tidak" value="TIDAK" {{ old('ortu_alumni_masehi', $pendaftaran->ortu_alumni_masehi) == 'TIDAK' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="alumni_tidak">TIDAK</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="unit_alumni_ortu" class="form-label">Unit Sekolah (SMP/SMA)</label>
                                <input type="text" class="form-control" id="unit_alumni_ortu" name="unit_alumni_ortu" value="{{ old('unit_alumni_ortu', $pendaftaran->unit_alumni_ortu) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="tahun_lulus_ortu" class="form-label">Tahun Lulus</label>
                                <input type="text" class="form-control" id="tahun_lulus_ortu" name="tahun_lulus_ortu" value="{{ old('tahun_lulus_ortu', $pendaftaran->tahun_lulus_ortu) }}">
                            </div>
                        </div>

                         <!-- DATA GEREJA -->
                        <h4 class="mb-3 text-primary border-bottom pb-2"><i class="fa fa-church me-2"></i>Data Gereja Orang Tua</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <label class="form-label">Apakah orang tua jemaat GKMI?</label>
                                <div class="d-flex gap-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ortu_jemaat_gkmi" id="gkmi_ya" value="YA" {{ old('ortu_jemaat_gkmi', $pendaftaran->ortu_jemaat_gkmi) == 'YA' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gkmi_ya">YA</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ortu_jemaat_gkmi" id="gkmi_tidak" value="TIDAK" {{ old('ortu_jemaat_gkmi', $pendaftaran->ortu_jemaat_gkmi) == 'TIDAK' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="gkmi_tidak">TIDAK</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="nomor_anggota_gereja" class="form-label">Nomor Anggota Gereja (Jika Ada)</label>
                                <input type="text" class="form-control" id="nomor_anggota_gereja" name="nomor_anggota_gereja" value="{{ old('nomor_anggota_gereja', $pendaftaran->nomor_anggota_gereja) }}">
                            </div>
                        </div>

                        <!-- DATA WALI -->
                         <h4 class="mb-3 text-primary border-bottom pb-2"><i class="fa fa-user-shield me-2"></i>Data Wali (Opsional)</h4>
                        <div class="row g-3 mb-4">
                             <div class="col-md-6">
                                <label for="nama_wali" class="form-label">Nama Wali</label>
                                <input type="text" class="form-control" id="nama_wali" name="nama_wali" value="{{ old('nama_wali') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="no_hp_wali" class="form-label">No. HP Wali</label>
                                <input type="text" class="form-control" id="no_hp_wali" name="no_hp_wali" value="{{ old('no_hp_wali') }}">
                            </div>
                             <div class="col-12">
                                <label for="alamat_wali" class="form-label">Alamat Wali</label>
                                <textarea class="form-control" id="alamat_wali" name="alamat_wali" rows="2">{{ old('alamat_wali') }}</textarea>
                            </div>
                        </div>

                         <!-- UPLOAD BERKAS -->
                        <h4 class="mb-3 text-primary border-bottom pb-2"><i class="fa fa-file-upload me-2"></i>Upload Berkas</h4>
                        <div class="row g-3 mb-5">
                            <div class="col-md-6">
                                <label for="file_foto_siswa" class="form-label">Foto Siswa (3x4)</label>
                                <input class="form-control @error('file_foto_siswa') is-invalid @enderror" type="file" id="file_foto_siswa" name="file_foto_siswa" accept="image/*">
                                <div class="form-text">Format: JPG/PNG, Max 2MB</div>
                                @error('file_foto_siswa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="file_ijazah" class="form-label">Scan Ijazah/SKL (PDF/JPG)</label>
                                <input class="form-control @error('file_ijazah') is-invalid @enderror" type="file" id="file_ijazah" name="file_ijazah" accept=".pdf,image/*">
                                <div class="form-text">Max 2MB</div>
                                @error('file_ijazah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="file_akte" class="form-label">Scan Akte Kelahiran (PDF/JPG)</label>
                                <input class="form-control @error('file_akte') is-invalid @enderror" type="file" id="file_akte" name="file_akte" accept=".pdf,image/*">
                                <div class="form-text">Max 2MB</div>
                                @error('file_akte') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="file_raport" class="form-label">Scan Raport Akademik (PDF)</label>
                                <input class="form-control @error('file_raport') is-invalid @enderror" type="file" id="file_raport" name="file_raport" accept=".pdf">
                                <div class="form-text">Semester 1-5 digabung dlm 1 PDF (Max 5MB)</div>
                                @error('file_raport') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <!-- 
                            <div class="col-md-6">
                                <label for="other_file" class="form-label">Dokumen Pendukung Lain (PDF/ZIP)</label>
                                <input class="form-control" type="file" id="other_file" name="other_file">
                            </div> 
                            -->
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-3 fs-5 fw-bold">SIMPAN DATA & SELESAI</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
