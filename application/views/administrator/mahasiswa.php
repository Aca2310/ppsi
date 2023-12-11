<div class="container-fluid">
    <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <a class="breadcrumb-item text-info" href="<?= base_url('administrator'); ?>">Dashboard</a>
            <li class="breadcrumb-item active">Data Users</li>
            <li class="breadcrumb-item active">Mahasiswa</li>
        </ol>
    </nav>
    <div class="row mb-4">
        <div class="col">
            <a href="<?= base_url('administrator/addMahasiswa'); ?>" class="btn btn-info">Daftarkan Mahasiswa <i class="fa fa-plus"></i> </a>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header h4 text-dark text-center">
            <i class="fa">Mahasiswa</i>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table pl-4">
                    <thead class="thead strong text-dark">
                        <tr>
                            <th>No</th>
                            <th>nim</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Email</th>
                            <th>Telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($mahasiswa as $m) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $m['nim']; ?></td>
                                <td><?= $m['nama']; ?></td>
                                <td><?= $m['prodi']; ?></td>
                                <td><?= $m['email']; ?></td>
                                <td><?= $m['telp']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('Mahasiswa/hapus/' . $m['nim']); ?>">Hapus</a>
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