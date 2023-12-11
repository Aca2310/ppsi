<div class="container">
    <div class="row" style="display: flex; justify-content: center; align-items: center;">
        <div class="card col-md-11">
            <div class="row no-gutters">
                <div class="col-lg">
                    <div class="card-body">
                        <h2 style="text-align: center; ">Detail Pengaduan</h2>
                        <div class="table-responsive">
                            <table class="table p-4" width="100%" cellspacing="0">
                                <tr>
                                    <th scope="row">Judul Pengaduan</th>
                                    <td><?= $detail['judul_pengaduan']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Pengaduan</th>
                                    <td> <?= date('d M Y', strtotime($detail['tgl_pengaduan'])); ?></td>
                                </tr>
                                <tr>
                                <th scope="row">Nim</th>
                                <td>
                                            <?php if ($detail['identitas_anonim'] == 1) {
                                                echo "anonymous";
                                            } else {
                                                echo $detail['nim'];
                                            } ?>
                                        </td>
                                </tr>
                               
                                <tr>
                                    <th scope="row">Kategori</th>
                                    <td><?= $detail['kategori']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td> <?= $detail['status']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Isi Pengaduan</th>
                                    <td><?= $detail['isi_pengaduan']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Gambar</th>
                                    <td>
                                        <figure>
                                            <?php
                                            $foto_names = explode(',', $detail['foto']);
                                            foreach ($foto_names as $foto_name) {
                                                echo '<a href="' . base_url('assets/img/pengaduan/') . $foto_name . '" data-lightbox="pengaduan"><img src="' . base_url('assets/img/pengaduan/') . $foto_name . '" alt="Gambar Pengaduan" style="max-width: 100px;"></a>';
                                            }
                                            ?>
                                        </figure>
                                    </td>
                                </tr>
                            </table>
                            <td>
                                <?php if ($detail['status_verifikasi'] == "Belum Verifikasi") : ?>
                                    <a href="<?= base_url('administrator/verifikasi/' . $detail['id_pengaduan']); ?>" class="btn btn-primary">Verifikasi</a>
                                <?php else : ?>
                                    <a href="<?= base_url('administrator/verifikasi/' . $detail['id_pengaduan']); ?>" class="btn btn-success">Sudah Verifikasi</a>
                                <?php endif; ?>
                            </td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>