<div class="container-fluid">
    <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a class="breadcrumb-item text-info" href="<?= base_url('petugas'); ?>">Dashboard</a>
            <li class="breadcrumb-item active">Data Pengaduan <?= $user['status_petugas']; ?> </li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-lg">
            <div class="card shadow">
                <div class="card-header h4 text-dark text-center">
                    <i class="fa">Data Pengaduaan <?= $user['status_petugas']; ?></i>
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
                                    <?php foreach ($join as $p) : ?>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?php if ($p['identitas_anonim'] == 1) {
                                                echo "anonymous";
                                            } else {
                                                echo $p['nim'];
                                            } ?>
                                        </td>
                                        <td>
                                            <?php $waktu = strtotime($p['tgl_pengaduan']); ?>
                                            <?= date('d M Y', $waktu); ?>
                                        </td>

                                        <td>
                                            <?php
                                            $foto_names = explode(',', $p['foto']);
                                            foreach ($foto_names as $foto_name) {
                                                echo '<img src="' . base_url('assets/img/pengaduan/') . $foto_name . '" alt="Gambar Pengaduan" style="max-width: 100px;">';
                                            }
                                            ?>
                                        </td>
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
                            </tbody>
                        <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>