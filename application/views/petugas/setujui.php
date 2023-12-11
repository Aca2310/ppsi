<div class="container-fluid">
    <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a class="breadcrumb-item text-info" href="<?= base_url('petugas'); ?>">Dashboard</a>
            <li class="breadcrumb-item active">Setujui Pengaduan </li>
        </ol>
    </nav>
    <div class="container">
        <div class="row" style="display: flex; justify-content: center; align-items: center;">
            <div class="card col-md-11">
                <div class="row no-gutters">
                    <div class="col-lg">
                        <div class="card-body">
                            <h2 style="text-align: center; ">Setujui Pengaduan</h2>
                            <div class="card-group">

                                <?php foreach ($setujui as $s) : ?>
                                    <div class="card">
                                        <?= $this->session->flashdata('ok'); ?>

                                        <div class="card-body">
                                            <h5 class="card-text">Judul : <b><?= $s['judul_pengaduan']; ?></b></h5>
                                            <p class="card-text">NIM : <b><?= $s['nim']; ?></b></p>
                                                Status : <b><?= $s['status']; ?></b>
                                            </p>
                                            <p class="card-text">Isi Pengaduan :<b> <?= $s['isi_pengaduan']; ?></b></p>
                                            <p class="card-text">Tanggapan : <b><?= $s['tanggapan']; ?> </b>
                                        </p>

                                            <figure>
                                                <?php
                                                $foto_names = explode(',', $s['foto']);
                                                foreach ($foto_names as $foto_name) {
                                                    echo '<a href="' . base_url('assets/img/pengaduan/') . $foto_name . '" data-lightbox="pengaduan"><img src="' . base_url('assets/img/pengaduan/') . $foto_name . '" alt="Gambar Pengaduan" style="max-width: 100px;"></a>';
                                                }
                                                ?>
                                            </figure>
                                            <div class="col-md-6 m-auto">
                                                <a href="<?= base_url('petugas/setujui/') . $s['id_pengaduan']; ?>" onclick="return confirm('Apakah anda yakin ingin menyetujui pengaduan ini?');" class="btn btn-primary"> <i class="fas fa-check-double"></i> Setujui</a>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Pengaduan ini ditanggapi oleh <?= $user['nama_petugas']; ?>, sebagai <?= $user['status_petugas']; ?> pada : <?= $s['update_at']; ?></small>
                            </div>

                        <?php endforeach; ?>
                        </div>