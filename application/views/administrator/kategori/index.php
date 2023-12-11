<div class="container-fluid">
    <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a class="breadcrumb-item text-info" href="<?= base_url('administrator'); ?>">Dashboard</a>
            <li class="breadcrumb-item active">Daftarkan Kategori</li>
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
                                    <div class="h5 text-gray-900 m-0">Daftarkan Kategori</div>
                                    <hr class="garis">
                                </div>
                                <a href="<?php echo site_url('kategori/tambah'); ?>">
                                    <i class="fa fa-plus"></i> Tambah Kategori
                                </a>
                                <br></br>
                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-wider p-5">
                                            <thead class="thead strong text-dark">
                                                <tr>
                                                    <th>ID Kategori</th>
                                                    <th>Nama Kategori</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($kategori as $row) : ?>
                                                    <tr>
                                                        <td><?php echo $row['id_kategori']; ?></td>
                                                        <td><?php echo $row['kategori']; ?></td>
                                                        <td>
                                                            <a href="<?php echo site_url('kategori/edit/' . $row['id_kategori']); ?>">
                                                                <i class="fa fa-edit" style="margin-right: 20px;"></i> <!-- Icon Edit -->
                                                            </a>

                                                            <a href="<?php echo site_url('kategori/hapus/' . $row['id_kategori']); ?>">
                                                                <i class="fa fa-trash text-danger"></i> <!-- Icon Hapus dengan warna merah -->
                                                            </a>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>