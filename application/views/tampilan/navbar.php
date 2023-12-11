<body>
    <header id="header" class="d-flex align-items-center">

        <div class="container d-flex align-items-center justify-content-between">
            <a href="<?= site_url('index'); ?>" class="logo"><img src="<?php echo base_url() ?>/aset/img/image 1.png"> Lapor KUY!</a>

            <nav id="navbar" class="navbar">

                <ul>
                    <li><a class="nav-link scrollto active" href="<?= site_url('mahasiswa/index'); ?>">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="<?= site_url('mahasiswa/pengaduan'); ?>">Pengaduan</a></li>
                    <li><a class="nav-link scrollto " href="<?= site_url('mahasiswa/tanggapan'); ?>">Tanggapan</a></li>
                    <li><a class="nav-link scrollto " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $users['nama']; ?>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <a class="dropdown-item" href="<?= base_url('mahasiswa/profile'); ?>">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Menggunakan jQuery untuk menangani perubahan kelas "active" pada tautan menu
            var url = window.location.pathname;
            var page = url.substr(url.lastIndexOf("/") + 1);

            // Hapus kelas "active" dari semua tautan
            $('#navbar ul li a').removeClass('active');

            // Tambahkan kelas "active" ke tautan yang sesuai dengan halaman saat ini
            $('#navbar ul li a[href$="' + page + '"]').addClass('active');
        });
        $(document).ready(function() {
            $('.mobile-nav-toggle').click(function() {
                $('#navbar ul').slideToggle();
            });
        });
    </script>
</body>