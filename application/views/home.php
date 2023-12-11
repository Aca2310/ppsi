<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>LaporYuk</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url() ?>/asset/vendor/aos/aos.css?<?= time(); ?>" rel="stylesheet">
    <link href="<?php echo base_url() ?>/asset/vendor/bootstrap/css/bootstrap.min.css?<?= time(); ?>" rel="stylesheet">
    <link href="<?php echo base_url() ?>/asset/vendor/bootstrap-icons/bootstrap-icons.css?<?= time(); ?>" rel="stylesheet">
    <link href="<?php echo base_url() ?>/asset/vendor/boxicons/css/boxicons.min.css?<?= time(); ?>" rel="stylesheet">
    <link href="<?php echo base_url() ?>/asset/vendor/glightbox/css/glightbox.min.css?<?= time(); ?>" rel="stylesheet">
    <link href="<?php echo base_url() ?>/asset/vendor/swiper/swiper-bundle.min.css?<?= time(); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>img/icon.png" rel="shortcut icon">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url() ?>/asset/css/style.css?<?= time(); ?>" rel="stylesheet">

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto: sekretariat@it.unand.ac.id"> sekretariat@it.unand.ac.id</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 853-5610-5388</span></i>
                <i class="bi bi-whatsapp d-flex align-items-center ms-4"><span>+62 812-6742-6133</span></i>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo"><img src="<?php echo base_url() ?>/asset/img/portfolio/fti08.png"></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Profile</a></li>
                    <li><a class="nav-link scrollto " href="#team">Departement</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                </ul>

                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>
    <!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Selamat Datang Di <span>Aplikasi Pengaduan Mahasiswa FTI UNAND</span></h1>
            <h2>Fakultas Teknologi Informasi UNAND</h2>
            <div class="d-flex">
                <a href="<?php echo base_url('Auth') ?>" class="btn-get-started scrollto login-link" style="background:#fff; color: #424530;  border: 2px solid #424530">Login</a>

            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">


        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Profile</h2>
                    <h3>Profil <span>FTI UNAND</span></h3>
                </div>
                <div class="row">
                    <iframe src="https://www.youtube.com/embed/rCOSHlNh2EI?start=4" height="500px"></iframe>
                </div>
            </div>
        </section>
        <!-- End Portfolio Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Departement</h2>
                    <h3>Departement yang ada di <span>FTI UNAND</span></h3>
                </div>

                <div class="row mb-4">
                    <div class="col-md">
                        <div class="card">
                            <img src="<?php echo base_url() ?>/asset/img/sk.jpg" width="200px" height="200px" class="card-img-top" alt="card">
                            <h3 style="text-align: center;"> Teknik Komputer </h3>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card">
                            <img src="<?php echo base_url() ?>/asset/img/si.jpg" width="200px" height="200px" class="card-img-top" alt="card">
                            <h3 style="text-align: center;"> Sistem Informasi</h3>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card">
                            <img src="<?php echo base_url() ?>/asset/img/if.png" width="200px" height="200px" class="card-img-top" alt="card">
                            <h3 style="text-align: center;">Informatika </h3>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Kontak</h2>
                    <h3><span>Kontak Kami</span></h3>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bx bx-map"></i>
                            <h3>Alamat</h3>
                            <p>Kampus Unand Limau Manis, Padang - Fakultas Teknologi Informasi Unand
                                Sumatera Barat - 25163</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Kami</h3>
                            <p>sekretariat@it.unand.ac.id</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Hubungi Kami</h3>
                            <p>+62 853-5610-5388</p>
                        </div>
                    </div>

                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17911.369761246544!2d100.45008292348001!3d-0.9201048479147952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b7963e1ea631%3A0x452d09b61f76d6ec!2sFakultas%20Teknologi%20Informasi!5e0!3m2!1sid!2sid!4v1636513787840!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        </section><!-- End Contact Section -->

    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3><img src="<?php echo base_url() ?>/asset/img/portfolio/fti08.png" width="250px" height="50px"><span></span></h3>
                        <p>
                            Kampus Unand Limau Manis, Padang
                            Fakultas Teknologi Informasi Unand
                            Sumatera Barat - 25163
                        </p>
                        <strong>Telefon:</strong> +62 812-6742-6133<br>
                        <strong>Email:</strong> sekretariat@it.unand.ac.id<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#hero">Beranda</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Profile</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#team">Departement</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#contact">Kontak</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url() ?>/asset/vendor/aos/aos.js"></script>
    <script src="<?php echo base_url() ?>/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/asset/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url() ?>/asset/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url() ?>/asset/vendor/php-email-form/validate.js"></script>
    <script src="<?php echo base_url() ?>/asset/vendor/purecounter/purecounter.js"></script>
    <script src="<?php echo base_url() ?>/asset/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/asset/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url() ?>/asset/js/main.js"></script>

</body>

</html>