<div class="container-fluid">
    <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <a class="breadcrumb-item text-info" href="<?= base_url('administrator'); ?>">Dashboard</a>
            <li class="breadcrumb-item active">Data Users</li>
            <li class="breadcrumb-item active">Petugas</li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-lg">
            <div class="row mb-4">
                <div class="col">
                    <a href="<?= base_url('UserPetugas/tambah'); ?>" class="btn btn-info">Daftarkan Petugas Baru <i class="fa fa-plus"></i> </a>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-header h4 text-dark text-center">
                    <i class="fa">Petugas</i>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" width="100%" cellspacing="0">
                            <thead class=" thead strong text-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nip</th>
                                    <th>Nama Petugas</th>
                                    <th>Status</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($petugas as $user) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?php echo $user['nip']; ?></td>
                                        <td><?php echo $user['nama_petugas']; ?></td>
                                        <td><?php echo $user['status_petugas']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['telp']; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('UserPetugas/edit/' . $user['nip']); ?>">Edit</a>

                                            <a href="<?php echo site_url('UserPetugas/hapus/' . $user['nip']); ?>">Hapus</a>
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