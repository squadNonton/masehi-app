<?php echo $__env->make('layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Hubungi Kami</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hubungi Kami</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Google Maps -->
<div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
    <iframe class="w-100" style="height: 400px;" 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.8654!2d110.8558!3d-6.7348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d!2sSMA%20Masehi%20Kudus!5e0!3m2!1sen!2sid!4v1" 
        frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0">
    </iframe>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="card border-0 shadow rounded-4 p-4">
                    <h4 class="mb-4"><i class="fa fa-paper-plane text-primary me-2"></i>Kirim Pesan</h4>
                    
                    <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                        <i class="fa fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                    <div class="alert alert-danger rounded-3">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('contact.send')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control rounded-3" id="nama" name="nama" placeholder="Nama Lengkap" value="<?php echo e(old('nama')); ?>" required>
                                    <label for="nama">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control rounded-3" id="subjek" name="subjek" placeholder="Subjek" value="<?php echo e(old('subjek')); ?>" required>
                                    <label for="subjek">Subjek</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control rounded-3" placeholder="Pesan Anda" id="pesan" name="pesan" style="height: 150px" required><?php echo e(old('pesan')); ?></textarea>
                                    <label for="pesan">Pesan Anda</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5 w-100" type="submit">
                                    <i class="fa fa-paper-plane me-2"></i>Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h4 class="mb-4"><i class="fa fa-address-card text-primary me-2"></i>Informasi Kontak</h4>
                
                <!-- Address Card -->
                <div class="card border-0 shadow rounded-4 mb-4" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-5px)';" onmouseout="this.style.transform='translateY(0)';">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Alamat</h6>
                                <p class="mb-0 text-secondary">Jl. KH. Wahid Hasyim No. 51, Kudus 59317, Central Java, Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phone Card -->
                <div class="card border-0 shadow rounded-4 mb-4" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-5px)';" onmouseout="this.style.transform='translateY(0)';">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Telepon</h6>
                                <p class="mb-0 text-secondary">+62 291 437938</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Email Card -->
                <div class="card border-0 shadow rounded-4 mb-4" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-5px)';" onmouseout="this.style.transform='translateY(0)';">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-envelope text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Email</h6>
                                <p class="mb-0 text-secondary">info@masehikudus.sch.id</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hours Card -->
                <div class="card border-0 shadow rounded-4 mb-4" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-5px)';" onmouseout="this.style.transform='translateY(0)';">
                    <div class="card-body p-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-clock text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Jam Operasional</h6>
                                <p class="mb-0 text-secondary">Senin - Jumat: 07.00 - 15.00 WIB</p>
                                <p class="mb-0 text-secondary">Sabtu: 07.00 - 12.00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="card border-0 shadow rounded-4" style="transition: all 0.4s;" onmouseover="this.style.transform='translateY(-5px)';" onmouseout="this.style.transform='translateY(0)';">
                    <div class="card-body p-4">
                        <h6 class="mb-3">Ikuti Kami</h6>
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-primary btn-square rounded-circle"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-danger btn-square rounded-circle"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-dark btn-square rounded-circle"><i class="fab fa-tiktok"></i></a>
                            <a href="#" class="btn btn-danger btn-square rounded-circle"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php /**PATH C:\laragon\www\masehi-app\resources\views/pages/contact.blade.php ENDPATH**/ ?>