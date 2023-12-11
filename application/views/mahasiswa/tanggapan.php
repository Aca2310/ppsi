<div class="container-fluid">
    <div class="container-fluid">
        <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <a class="breadcrumb-item text-info" href="<?= base_url('mahasiswa'); ?>"><span style="color: #E09132;">Beranda</span></a>
                <li class="breadcrumb-item active">Tanggapan Pengaduan</li>
            </ol>


        </nav>

        <div class="card shadow mt-3">
            <div class="card-header h4 text-dark text-center">
                <i class="fa">Tanggapan Pengaduan</i>
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
                                <th>Tanggapan</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($setujui as $s) : ?>
                                <tr>
                                    <td>
                                        <?php
                                        $waktu = strtotime($s['tgl_tanggapan']);
                                        echo date('d M Y', $waktu);
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $foto_names = explode(',', $s['foto']);
                                        foreach ($foto_names as $foto_name) {
                                            echo '<img src="' . base_url('assets/img/pengaduan/') . $foto_name . '" alt="Gambar Pengaduan" style="max-width: 100px;">';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="h5"><?= $s['kategori']; ?></div>
                                    </td>
                                    <td>
                                        <h5 class="card-title"><?= $s['judul_pengaduan']; ?></h5>
                                    </td>
                                    <td>
                                        <p class="card-text"><?= $s['isi_pengaduan']; ?></p>
                                    </td>
                                    <td>
                                        <?= $s['tanggapan']; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('mahasiswa/detail_tanggapan/' . $s['id_pengaduan']); ?>" class="btn btn-primary btn-sm" style="background-color: #E09132; border-color: #E09132;">Detail</a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->