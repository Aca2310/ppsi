<div class="container-fluid">
    <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a class="breadcrumb-item text-info" href="<?= base_url('administrator'); ?>">Dashboard</a>
            <li class="breadcrumb-item active">Tambah Kategori</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-lg-12 pt-0"> <!-- Mengubah kelas col-lg-6 menjadi col-lg-12 -->
            <div class="card o-hidden shadow-lg">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <div class="h5 text-gray-900 m-0">Tambah Kategori</div>
                                    <hr class="garis">
                                </div>
                                <a href="<?php echo site_url('administrator/kategori/addkategori'); ?>">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </a>
                            </div>

                                <form method="post" action="<?php echo site_url('kategori/tambah'); ?>">
                                    <label for="kategori">Nama Kategori:</label>
                                    <input type="text" name="kategori" id="kategori" required>
                                    <input class="btn btn-dark" type="submit" value="Simpan">
                                </form>
                                </body>

                                </html>