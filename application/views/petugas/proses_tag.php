<div class="container-fluid">
    <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a class="breadcrumb-item text-info" href="<?= base_url('petugas'); ?>">Dashboard</a>
            <li class="breadcrumb-item active">Proses</li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-lg">
            <div class="card shadow">
                <div class="card-header h4 text-dark text-center">
                    <i class="fa">Data Pengaduaan <?= $user['status_petugas']; ?> yang Masih dan Sedang di Proses</i>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table p-4" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nim</th>
                                    <th>Tanggal</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $no = 1; ?>
                                    <?php foreach ($proses as $s) : ?>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?php if ($s['identitas_anonim'] == 1) {
                                                echo "anonymous";
                                            } else {
                                                echo $p['nim'];
                                            } ?>
                                        </td>
                                        <td>
                                            <?php $waktu = strtotime($s['tgl_pengaduan']); ?>
                                            <?= date('d M Y', $waktu); ?>
                                        </td>

                                        <td>
                                            <?php
                                            $foto_names = explode(',', $s['foto']);
                                            foreach ($foto_names as $foto_name) {
                                                echo '<img src="' . base_url('assets/img/pengaduan/') . $foto_name . '" alt="Gambar Pengaduan" style="max-width: 100px;">';
                                            }
                                            ?>
                                        </td>
                                        <td><?= $s['judul_pengaduan']; ?></td>
                                        <td><?= $s['isi_pengaduan']; ?></td>
                                        <td>
                                            <?php if ($s['status'] == "pending") : ?>
                                                <div class="badge badge-danger">
                                                    <?= $s['status']; ?>
                                                </div>
                                            <?php elseif ($s['status'] == "proses") : ?>
                                                <div class="badge badge-warning">
                                                    <?= $s['status']; ?>
                                                </div>
                                            <?php else : ?>
                                                <div class="badge badge-success">
                                                    <?= $s['status']; ?>
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
</div>