<?php echo $__env->make('layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Tentang Kami</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- About Section Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="<?php echo e(asset('img/backwall3.png')); ?>" alt="" style="object-fit: cover; border-radius: 20px;">
                    <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3 rounded-circle" src="<?php echo e(asset('img/148670012.png')); ?>" alt="" style="width: 200px; height: 200px;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="text-primary text-uppercase mb-2">Tentang Sekolah</h6>
                <h1 class="display-6 mb-4">Sejarah SMA Masehi Kudus</h1>
                <p class="mb-4" style="text-align: justify;">
                    Yayasan Badan Pendidikan Masehi (YBPM) memulai kiprahnya di bidang pendidikan 
                    pada tahun <strong>1964</strong> dengan membuka <strong>SMP Masehi</strong> 
                    di bawah kepemimpinan Bapak <strong>Oei Kian Ik</strong> dan 
                    Bapak <strong>Kwik Hock An</strong>.
                </p>
                <p class="mb-4" style="text-align: justify;">
                    Pada tanggal <strong>8 Januari 1968</strong> Yayasan secara resmi membuka 
                    <strong>SMA Masehi</strong>. Sekolah ini dimulai dengan satu kelas berjumlah 25 siswa 
                    dan dipimpin oleh Bapak <strong>Go Tjoe Lok</strong>.
                </p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <span>Berdiri sejak 1964</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <span>Pendidikan Berkualitas</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <span>Berbasis Karakter LIGHT</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <span>Fasilitas Lengkap</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->

<!-- Vision & Mission Section Start -->
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase mb-2">Visi & Misi</h6>
            <h1 class="display-6 mb-4">Membentuk Generasi Unggul</h1>
        </div>

        <!-- Vision Card -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.2s">
                <div class="card border-0 shadow-lg rounded-4 text-center h-100" style="transition: all 0.4s; transform: translateY(0);" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 25px 50px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 40px rgba(0,0,0,0.1)';">
                    <div class="card-body p-5">
                        <div class="mb-3">
                            <img src="<?php echo e(asset('img/logomasehi.png')); ?>" width="60" height="60" alt="Logo">
                        </div>
                        <h3 class="text-primary mb-3">Visi</h3>
                        <p class="fs-5 text-secondary mb-0">
                            Terbentuknya insan pembelajar, berprestasi, berwawasan lingkungan dan berkarakter <strong>LIGHT</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mission Cards -->
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card h-100 border-0 shadow rounded-4" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.1)';">
                    <div class="card-body p-4 text-center">
                        <div class="btn-square bg-primary text-white rounded-circle mx-auto mb-4" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-lightbulb fa-2x"></i>
                        </div>
                        <h5 class="mb-3">LIGHT Pelajar Pancasila</h5>
                        <p class="text-secondary small mb-0">
                            Mengembangkan pembelajaran yang aktif, inovatif, kreatif, efektif, dan menyenangkan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="card h-100 border-0 shadow rounded-4" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.1)';">
                    <div class="card-body p-4 text-center">
                        <div class="btn-square bg-primary text-white rounded-circle mx-auto mb-4" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-trophy fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Semangat Berprestasi</h5>
                        <p class="text-secondary small mb-0">
                            Mengoptimalkan pembelajaran untuk mengembangkan potensi diri dan minat berprestasi.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="card h-100 border-0 shadow rounded-4" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.1)';">
                    <div class="card-body p-4 text-center">
                        <div class="btn-square bg-primary text-white rounded-circle mx-auto mb-4" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-handshake fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Membangun Jejaring</h5>
                        <p class="text-secondary small mb-0">
                            Membangun jejaring yang mendukung pengembangan lembaga dan proses pendidikan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="card h-100 border-0 shadow rounded-4" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.1)';">
                    <div class="card-body p-4 text-center">
                        <div class="btn-square bg-primary text-white rounded-circle mx-auto mb-4" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-leaf fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Peduli Lingkungan</h5>
                        <p class="text-secondary small mb-0">
                            Menumbuhkan sikap peduli terhadap lingkungan dengan pencegahan pencemaran.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vision & Mission Section End -->

<!-- Fasilitas Section Start -->
<?php if($fasilitas->count() > 0): ?>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase mb-2">Fasilitas</h6>
            <h1 class="display-6 mb-4">Fasilitas Sekolah Kami</h1>
        </div>
        <div class="row g-4">
            <?php $__currentLoopData = $fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?php echo e(0.1 + ($index * 0.1)); ?>s">
                <div class="card border-0 shadow h-100 rounded-4 overflow-hidden" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.1)';">
                    <?php if($item->gambar): ?>
                    <img src="<?php echo e(asset('img/fasilitas/' . $item->gambar)); ?>" class="card-img-top" alt="<?php echo e($item->nama); ?>" style="height: 200px; object-fit: cover;">
                    <?php else: ?>
                    <div class="bg-primary d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="<?php echo e($item->icon ?? 'fa fa-building'); ?> text-white fa-4x"></i>
                    </div>
                    <?php endif; ?>
                    <div class="card-body p-4">
                        <h5 class="mb-3"><?php echo e($item->nama); ?></h5>
                        <p class="text-secondary mb-0"><?php echo e(Str::limit($item->deskripsi, 100)); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- Fasilitas Section End -->

<!-- Team Section Start -->
<?php if($gurus->count() > 0): ?>
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase mb-2">Tim Pengajar</h6>
            <h1 class="display-6 mb-4">Guru & Tenaga Pendidik</h1>
        </div>
        <div class="row g-4">
            <?php $__currentLoopData = $gurus->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $guru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="<?php echo e(0.1 + ($index * 0.1)); ?>s">
                <div class="team-item position-relative rounded-4 overflow-hidden" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-10px)';" onmouseout="this.style.transform='translateY(0)';">
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="<?php echo e(asset('img/guru/' . $guru->foto)); ?>" alt="<?php echo e($guru->nama); ?>" style="height: 280px; object-fit: cover;">
                        <div class="team-social text-center">
                            <?php if($guru->facebook): ?>
                            <a class="btn btn-square btn-outline-primary border-2 m-1" href="<?php echo e($guru->facebook); ?>"><i class="fab fa-facebook-f"></i></a>
                            <?php endif; ?>
                            <?php if($guru->instagram): ?>
                            <a class="btn btn-square btn-outline-primary border-2 m-1" href="<?php echo e($guru->instagram); ?>"><i class="fab fa-instagram"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="bg-white text-center p-4">
                        <h5 class="mb-1"><?php echo e($guru->nama); ?></h5>
                        <span class="text-primary"><?php echo e($guru->jabatan); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- Team Section End -->

<?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php /**PATH C:\laragon\www\masehi-app\resources\views/pages/about.blade.php ENDPATH**/ ?>