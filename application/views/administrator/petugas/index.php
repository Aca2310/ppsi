<div class="container-fluid">
    <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('administrator'); ?>" class="text-info">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('administrator/petugas'); ?>" class="text-info">Data Petugas</a></li>
            <li class="breadcrumb-item active">Tambah Petugas Baru</li>
        </ol>
    </nav>


    <h2>Daftar User Petugas</h2>
    <a href="<?php echo site_url('UserPetugas/tambah'); ?>"> Tambah Petugas</a>

    <table>
        <thead>
            <tr>
                <th>NIP</th>
                <th>Status Petugas</th>
                <th>Nama Petugas</th>
                <th>Email</th>>
                <th>Telp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($petugas as $user) : ?>
                <tr>
                    <td><?php echo $user['nip']; ?></td>
                    <td><?php echo $user['status_petugas']; ?></td>
                    <td><?php echo $user['nama_petugas']; ?></td>
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