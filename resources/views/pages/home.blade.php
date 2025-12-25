@include('layouts.header')

<!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($carousels as $index => $carousel)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img class="w-100" src="{{ asset('img/carousel/' . $carousel->gambar) }}" alt="{{ $carousel->judul }}">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-2 text-light mb-5 animated slideInDown foncam">
                                        @if($carousel->subjudul)
                                            {{ $carousel->judul }}
                                            <br><span class="focol">{!! $carousel->subjudul !!}</span>
                                        @else
                                            <b class="foncam focol">LIGHT</b> Up Your Future
                                        @endif
                                    </h1>
                                    @if($carousel->teks_tombol_1)
                                        <a href="{{ $carousel->link_tombol_1 ?? '#' }}" class="btn btn-primary py-sm-3 px-sm-5">{{ $carousel->teks_tombol_1 }}</a>
                                    @endif
                                    @if($carousel->teks_tombol_2)
                                        <a href="{{ $carousel->link_tombol_2 ?? '#' }}" class="btn btn-light py-sm-3 px-sm-5 ms-3">{{ $carousel->teks_tombol_2 }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->



    <!-- Sub Container Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                
                <!-- Nilai Unggulan -->
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-asterisk text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Pendidikan Berkarakter</h5>
                                <span>
                                    Menanamkan nilai disiplin, integritas, dan tanggung jawab sebagai fondasi pembentukan karakter siswa.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Komunitas Sekolah -->
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-users text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Lingkungan Akademik Positif</h5>
                                <span>
                                    Didukung oleh tenaga pendidik profesional serta lingkungan belajar yang aman, inklusif, dan kolaboratif.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tujuan Pendidikan -->
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-bullseye text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Prestasi dan Masa Depan</h5>
                                <span>
                                    Mempersiapkan lulusan yang berprestasi, berdaya saing, dan siap melanjutkan pendidikan ke jenjang lebih tinggi.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sub Container End -->

    <!-- Vision & Mission Section Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <hr class="mb-5">

            <!-- Section Header -->
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 650px;">
                <h6 class="text-primary text-uppercase mb-2">Our School</h6>
                <h1 class="display-6 mb-3">Vision & Mission</h1>
                <p class="text-muted">
                    Membangun generasi unggul melalui pendidikan berkualitas, berkarakter, dan berdaya saing.
                </p>
            </div>

            <!-- Vision -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card border-0 shadow-lg rounded-4 text-center h-100">
                        <div class="card-body p-5">
                            <div class="mb-3">
                                <i class="text-primary me-2"><img src="img/logomasehi.png" width="50" height="50" alt="Image"></i>
                            </div>
                            <h3 class="text-primary mb-3">Vision</h3>
                            <p class="fs-5 text-secondary mb-0">
                                Terbentuknya insan pembelajar, berprestasi, berwawasan lingkungan dan berkarakter LIGHT
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mission -->
            <div class="row g-4">

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card h-100 border-0 shadow rounded-4">
                        <div class="card-body p-4 text-center">
                            <h5 class="text-primary mb-3">Mission</h5>
                            <i class="fa fa-lightbulb fa-2x text-primary mb-3"></i>
                            <h5 class="mb-2">LIGHT Pelajar Pancasila</h5>
                            <p class="text-secondary small">
                                •	Mengembangkan pembelajaran yang aktif, inovatif, kreatif, efektif, dan menyenangkan dengan memberdayakan IPTEK yang berlandaskan iman dan karakter LIGHT Profil Pelajar Pancasila.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="card h-100 border-0 shadow rounded-4">
                        <div class="card-body p-4 text-center">
                            <h5 class="text-primary mb-3">Mission</h5>
                            <i class="fa fa-laptop-code fa-2x text-primary mb-3"></i>
                            <h5 class="mb-2">Semangat Berprestasi </h5>
                            <p class="text-secondary small">
                                Mengoptimalkan pembelajaran dan kegiatan yang mampu membina dan mengembangkan potensi diri, bakat, dan minat untuk menumbuhkan semangat berprestasi di berbagai bidang.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="card h-100 border-0 shadow rounded-4">
                        <div class="card-body p-4 text-center">
                            <h5 class="text-primary mb-3">Mission</h5>
                            <i class="fa fa-handshake fa-2x text-primary mb-3"></i>
                            <h5 class="mb-2">Membangun Jejaring</h5>
                            <p class="text-secondary small">
                                Membangun jejaring yang mendukung pengembangan lembaga dan proses penyelenggaraan pendidikan dan pembelajaran untuk kemajuan sekolah.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="card h-100 border-0 shadow rounded-4">
                        <div class="card-body p-4 text-center">
                            <h5 class="text-primary mb-3">Mission</h5>
                            <i class="fa fa-leaf fa-2x text-primary mb-3"></i>
                            <h5 class="mb-2">Peduli Lingkungan </h5>
                            <p class="text-secondary small">
                               •	Menumbuhkan sikap peduli terhadap lingkungan dengan memberikan bekal tentang pencegahan pencemaran, pencegahan kerusakan dan peduli lingkungan.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Vision & Mission Section End -->




    <!-- About Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                
                <!-- Image Section -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 420px;">
                        <img class="position-absolute w-100 h-100" src="img/backwall3.png" alt="" style="object-fit: cover;">
                        <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3 rounded-circle" src="img/148670012.png" alt="" style="width: 200px; height: 200px;">
                    </div>
                </div>

                <!-- Content Section -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="text-primary text-uppercase mb-2">About Us</h6>
                        <h1 class="display-6 mb-4">
                            History Of Masehi Kudus Senior High School
                        </h1>
                        <style>
                            .tejus{
                                text-align: justify;
                            }
                        </style>
                        <p class="tejus">
                            Yayasan Badan Pendidikan Masehi (YBPM) memulai kiprahnya di bidang pendidikan
                            pada tahun <strong>1964</strong> dengan membuka <strong>SMP Masehi</strong>
                            di bawah kepemimpinan Bapak <strong>Oei Kian Ik</strong> dan
                            Bapak <strong>Kwik Hock An</strong>.
                            Kegiatan belajar mengajar pertama kali dilaksanakan pada siang hari
                            dan dipimpin oleh Bapak <strong>Ong Hway Gie</strong>.
                        </p>

                        <p class="mb-4 tejus">
                            Dalam perjalanan awalnya, sekolah ini turut berperan penting pada masa
                            transisi pendidikan nasional pasca peristiwa tahun 1965,
                            dengan menampung peserta didik dari sekolah-sekolah yang ditutup pemerintah.
                            Pada akhir tahun <strong>1967</strong>, SMP Masehi berhasil meluluskan
                            angkatan pertamanya dengan hasil yang membanggakan.
                        </p>

                        <p class="mb-4 tejus">
                            Melihat kebutuhan pendidikan lanjutan, pada tanggal
                            <strong>8 Januari 1968</strong> Yayasan secara resmi membuka
                            <strong>SMA Masehi</strong>.
                            Sekolah ini dimulai dengan satu kelas berjumlah 25 siswa
                            dan kembali dipimpin oleh Bapak <strong>Go Tjoe Lok</strong>.
                        </p>

                        <!-- Highlight Points -->
                        <div class="row g-2 mb-4 pb-2">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>
                                Berdiri sejak tahun 1964
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>
                                Berkontribusi pada pendidikan nasional
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>
                                SMP & SMA terintegrasi
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>
                                Sarana pendidikan lengkap
                            </div>
                        </div>

                        <p class="tejus">
                            Perkembangan sarana pendidikan terus berlanjut hingga terwujudnya
                            kompleks pendidikan terpadu yang mencakup
                            <strong>TK, SD, SMP, dan SMA</strong> di wilayah
                            <strong>Jl. KH. Wahid Hasyim</strong>,
                            sebagai wujud komitmen Yayasan dalam menyediakan pendidikan yang
                            berkelanjutan dan berkualitas.
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Courses Start -->
    <div class="container-xxl courses my-6 py-6 pb-0">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase mb-2">Program School</h6>
                <h1 class="display-6 mb-4">Our Courses Upskill You</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($programs as $index => $program)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                    <div class="courses-item d-flex flex-column bg-white overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <div class="d-inline-block bg-primary text-white fs-5 py-1 px-4 mb-4">{{ $program->badge }}</div>
                            <h5 class="mb-3">{{ $program->judul }}</h5>
                            <div>{!! $program->deskripsi !!}</div>
                            <ol class="breadcrumb justify-content-center mb-0 flex-wrap text-center fw-bold">
                                @foreach($program->items as $item)
                                <li class="breadcrumb-item small d-flex align-items-center">
                                    <i class="{{ $item->icon }} text-primary me-2"></i>
                                    {{ $item->judul }}
                                </li>
                                @endforeach
                            </ol>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="{{ asset('img/program/' . $program->gambar) }}" alt="{{ $program->judul }}">
                            <div class="courses-overlay">
                                <a class="btn btn-outline-primary border-2" href="{{ $program->link_detail ?? '#' }}">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-8 my-6 mb-0 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-primary text-center p-5 rounded-4">
                        <h1 class="mb-4 text-white">High School Admission Form</h1>
                        <p class="text-white mb-4">Please fill out the form below to register for the New Student Admission.</p>

                        <form>
                            <div class="row g-3">

                                <!-- Student Full Name -->
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="student_name" placeholder="Full Name">
                                        <label for="student_name">Student Full Name</label>
                                    </div>
                                </div>

                                <!-- NISN / Student ID -->
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="nisn" placeholder="Student ID">
                                        <label for="nisn">Student ID (NISN)</label>
                                    </div>
                                </div>

                                <!-- Previous School -->
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="previous_school" placeholder="Previous School">
                                        <label for="previous_school">Previous School</label>
                                    </div>
                                </div>

                                <!-- Parent Phone Number -->
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="parent_phone" placeholder="Parent Phone Number">
                                        <label for="parent_phone">Parent Phone Number</label>
                                    </div>
                                </div>

                                <!-- Parent Email -->
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" id="parent_email" placeholder="Parent Email">
                                        <label for="parent_email">Parent Email</label>
                                    </div>
                                </div>

                                <!-- Major Selection -->
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <select class="form-control border-0" id="major">
                                            <option value="">-- Select Major --</option>
                                            <option>Science (MIPA)</option>
                                            <option>Social Studies (IPS)</option>
                                            <option>Language</option>
                                        </select>
                                        <label for="major">Preferred Major</label>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" placeholder="Home Address" id="address" style="height: 100px"></textarea>
                                        <label for="address">Home Address</label>
                                    </div>
                                </div>

                                <!-- Additional Notes -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" placeholder="Additional notes (optional)" id="notes" style="height: 100px"></textarea>
                                        <label for="notes">Additional Notes</label>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Submit Registration</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->

    <!-- Team Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase mb-2">We are Team</h6>
                <h1 class="display-6 mb-4">We Have Great Experience In Teaching</h1>
            </div>
            <div class="row g-0 team-items">
                @foreach($gurus as $index => $guru)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.2) }}s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ asset('img/guru/' . $guru->foto) }}" alt="{{ $guru->nama }}">
                            <div class="team-social text-center">
                                @if($guru->facebook)
                                <a class="btn btn-square btn-outline-primary border-2 m-1" href="{{ $guru->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if($guru->twitter)
                                <a class="btn btn-square btn-outline-primary border-2 m-1" href="{{ $guru->twitter }}"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if($guru->instagram)
                                <a class="btn btn-square btn-outline-primary border-2 m-1" href="{{ $guru->instagram }}"><i class="fab fa-instagram"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="mt-2">{{ $guru->nama }}</h5>
                            <span>{{ $guru->jabatan }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->

@include('layouts.footer')