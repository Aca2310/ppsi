                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <a class="breadcrumb-item text-info" href="<?= base_url('petugas') ?>">Dashboard</a>
                            <li class="breadcrumb-item active">Petugas</li>
                        </ol>
                    </nav>

                    <!-- CARD -->
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <a href="<?= base_url('petugas/pengaduanTag'); ?>" class="card card-link o-hidden shadow border-bottom-info">
                                <div class="card-header bg-info text-white">Pengaduan <?= $user['status_petugas']; ?></div>
                                <div class="card-body bg-white text-info h4">
                                    <i class="fas fa-paper-plane"> <?= count($pengaduan); ?> </i>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mt-2">
                            <a href="<?= base_url('petugas/selesaiTag'); ?>" class="card-link card o-hidden shadow border-bottom-success">
                                <div class="card-header bg-success text-white">Selesai</div>
                                <div class="card-body bg-white text-success h4">
                                    <i class="fas fa-check"></i>
                                    <div class="text-success float-right"> <?= count($selesai); ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mt-2">
                            <a href="<?= base_url('petugas/prosesTag'); ?>" class="card-link card o-hidden shadow border-bottom-danger">
                                <div class="card-header bg-danger text-white">Proses</div>
                                <div class="card-body bg-white text-danger h4">
                                    <div class="text-danger float-right">
                                        <?= count($proses); ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- PROSES  -->
                    <div class="row mt-3">
                        <div class="col">

                            <?= $this->session->flashdata('sukses'); ?>
                            <div class="card shadow">
                                <div class="m-3">
                                </div>
                                <div class="card-header  bg-white text-dark text-center h3">
                                    Keluhan Mahasiswa
                                </div>
                                <div class="card-body shadow">
                                    <div class="strong text-dark">
                                        <b>Berikut beberapa pengaduan kepada <span class="text-success"><?= $user['status_petugas']; ?></span> yang belum di proses : </b>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table p-4" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="row">No</th>
                                                    <th scope="row">Tanggal</th>
                                                    <th scope="row">Nim</th>
                                                    <th scope="row">Gambar</th>
                                                    <th scope="row">Judul</th>
                                                    <th scope="row">Isi</th>
                                                    <th scope="row">Status</th>
                                                    <th scope="row">Aksi</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php $no = 1; ?>
                                                    <?php foreach ($proses as $p) : ?>
                                                        <td><?= $no++; ?></td>
                                                        <td>
                                                            <?php
                                                            $waktu = strtotime($p['tgl_pengaduan']);
                                                            echo date('d M Y', $waktu);
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($p['identitas_anonim'] == 1) {
                                                                echo "anonymous";
                                                            } else {
                                                                echo $p['nim'];
                                                            } ?>
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
                                                        <td>
                                                            <a href="<?= base_url('petugas/tanggapan/'); ?><?= $p['id_pengaduan']; ?>" class="btn btn-info">Detail</i> </a>
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
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->