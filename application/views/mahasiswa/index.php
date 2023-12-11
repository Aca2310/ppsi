<!-- Begin Page Content -->

<div class="container-fluid">
    <div class="container-fluid">
        <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <a class="breadcrumb-item text-info" href="<?= base_url('mahasiswa'); ?>"><span style="color: #E09132;">Beranda</span></a>
                <li class="breadcrumb-item active">Mahasiswa</li>
            </ol>
        </nav>
    </div>

    <!-- CARD -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mt-2">
                <a href="<?= base_url('mahasiswa/selesai'); ?>" class="card-link card o-hidden shadow border-bottom-success">
                    <div class="card-header bg-success text-white">Selesai</div>
                    <div class="card-body bg-white text-success h4">
                        <i class="fas fa-check"></i>
                        <div class="text-success float-right">
                            <?php if ($selesai != 0) : ?>
                                <?= count($selesai); ?>
                            <?php else : ?>
                                0
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-2">
                <a href="<?= base_url('mahasiswa/proses'); ?>" class="card-link card o-hidden shadow border-bottom-warning">
                    <div class="card-header bg-warning text-white">Proses</div>
                    <div class="card-body bg-white text-info h4">
                        <div class="text-warning float-right">
                            <?php if ($proses != 0) : ?>
                                <?= count($proses); ?>
                            <?php else : ?>
                                0
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-2">
                <a href="<?= base_url('mahasiswa/pending'); ?>" class="card-link card o-hidden shadow border-bottom-danger">
                    <div class="card-header bg-danger text-white">Pending</div>
                    <div class="card-body bg-white text-danger h4">
                        <i class="fas fa-exclamation-circle"></i>
                        <div class="text-danger float-right">
                            <?php if ($pending != 0) : ?>
                                <?= count($pending); ?>
                            <?php else : ?>
                                0
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- WARNING -->
        <div class="row mt-3">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header h4 text-danger">
                        <i class="fa">WARNING :</i>
                    </div>
                    <div class="card-body">
                        <p>Pengaduan tidak dapat diedit atau dihapus! Pastikan Anda mematuhi peraturan yang ada.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- MY PENGADUAN -->
        <div class="card shadow mt-3">
            <div class="card-header h4 text-dark text-center">
                <i class="fa">Pengaduan</i>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table p-4" width="100%" cellspacing="0">
                        <thead class="thead strong text-dark">
                            <tr>
                                <th>Tanggal</th>
                                <th>Gambar</th>
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengaduan as $p) : ?>
                                <tr>
                                    <td>
                                        <?php
                                        $waktu = strtotime($p['tgl_pengaduan']);
                                        echo date('d M Y', $waktu);
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $foto_names = explode(',', $p['foto']);
                                        foreach ($foto_names as $foto_name) {
                                            echo '<img src="' . base_url('assets/img/pengaduan/') . $foto_name . '" alt="Gambar Pengaduan" style="max-width: 100px;">';
                                        }
                                        ?>
                                    </td>
                                    <td><?= $p['kategori']; ?></td>
                                    <td><?= $p['judul_pengaduan']; ?></td>
                                    <td><?= $p['isi_pengaduan']; ?></td>
                                    <td>
                                        <?php if ($p['status'] == "pending") : ?>
                                            <div class="badge badge-danger">
                                                <?= $p['status']; ?>
                                            </div>
                                        <?php elseif ($p['status'] == "proses") : ?>
                                            <div class="badge badge-warning">
                                                <?= $p['status']; ?>
                                            </div>
                                        <?php else : ?>
                                            <div class="badge badge-success">
                                                <?= $p['status']; ?>
                                            </div>
                                        <?php endif; ?>
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
<!-- End of Main Content -->