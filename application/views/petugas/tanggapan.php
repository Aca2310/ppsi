<div class="container-fluid">
    <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a class="breadcrumb-item text-info" href="<?= base_url('petugas'); ?>">Dashboard</a>
            <li class="breadcrumb-item active">Tanggapan</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header text-center">Review Pengaduan</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <p>Tanggal Pengaduan: <?php $waktu = strtotime($get_pengaduan['tgl_pengaduan']);
                                                    echo date('d M Y', $waktu); ?></p>
                            <p>Nama: <b><?= $get_pengaduan['nim']; ?></b></p>
                            <p>Judul: <?= $get_pengaduan['judul_pengaduan']; ?></p>
                            <?php if ($get_pengaduan['status'] == "proses") : ?>
                                <p>Status:
                                    <b class="text-warning"><?= ucfirst($get_pengaduan['status']); ?></b>
                                </p>
                            <?php elseif ($get_pengaduan['status'] == "selesai") : ?>
                                <p>Status:
                                    <b class="text-success"><?= ucfirst($get_pengaduan['status']); ?></b>
                                </p>
                            <?php else : ?>
                                <p>Status:
                                    <b class="text-danger"><?= ucfirst($get_pengaduan['status']); ?></b>
                                </p>
                            <?php endif; ?>
                            <p>Pengaduaan: <b><?= $get_pengaduan['isi_pengaduan']; ?></b></p>
                        </div>
                        <b>
                            <div class="col-lg-12">
                                <figure>
                                    <?php
                                    $foto_names = explode(',', $get_pengaduan['foto']);
                                    foreach ($foto_names as $foto_name) {
                                        echo '<a href="' . base_url('assets/img/pengaduan/') . $foto_name . '" data-lightbox="pengaduan"><img src="' . base_url('assets/img/pengaduan/') . $foto_name . '" alt="Gambar Pengaduan" style="max-width: 100px;"></a>';
                                    }
                                    ?>
                                </figure>

                            </div>
                        </b>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-6">
            <!-- <?= $this->session->flashdata('sukses'); ?> -->
            <div class="card">
                <h5 class="card-header text-center">Tanggapi Pengaduan</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="tanggapan">Tanggapan <sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="summernote" name="tanggapan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark float-right mt-4">Kirim tanggapan!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>