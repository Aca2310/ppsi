<div class="container-fluid">
    <div class="container-fluid">
        <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <a class="breadcrumb-item text-info" href="<?= base_url('mahasiswa'); ?>"><span style="color: #E09132;">Beranda</span></a>
                <li class="breadcrumb-item active">Form Pengaduan</li>
            </ol>
        </nav>

        <!-- WARNING -->
        <div class="row mt-3">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header h4 text-danger">
                        <i class="fa">WARNING :</i>
                    </div>
                    <div class="card-body">
                        <h6> <b> Tolong cek ikon lonceng <i class="text-danger fas fa-fw fa-bell"></i> untuk membaca peraturan yang berlaku. </b> </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg">
                <?= $this->session->flashdata('sukses'); ?>
                <div class="card">
                    <h5 class="card-header">Tambah Pengaduan
                        <!-- Button trigger modal -->
                        <button type="button" class="btn float-right" data-toggle="modal" data-target="#disclaimer">
                            <i class="text-danger fas fa-fw fa-bell"></i>
                        </button>
                    </h5>
                    <div class="card-body">
                        <form action="<?= base_url('mahasiswa/pengaduan'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Pengadu</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nama_pengadu" id="nama_pengadu_anonim" value="anonym" checked>
                                    <label class="form-check-label" for="nama_pengadu_anonim">
                                        Samarkan (anonym)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nama_pengadu" id="nama_pengadu_nama_asli" value="nama_asli">
                                    <label class="form-check-label" for="nama_pengadu_nama_asli">
                                        Gunakan nama sendiri
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul <sup class="text-danger">*</sup> </label>
                                <input type="text" class="form-control" id="judul" name="judul">
                                <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" id="kategori" name="kategori">
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['id_kategori']; ?>"><?= $k['kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="isi">Isi <sup class="text-danger">*</sup></label>
                                <textarea class="form-control" id="summernote" name="isi">
                            </textarea>
                                <small class="form-text text-muted">Mohon untuk tidak berkata kasar!</small>
                                <?= form_error('isi', '<small class ="text-danger">', '</small>'); ?>
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar[]" multiple required>
                                    <label class="custom-file-label" for="gambar">Pilih file</label>
                                </div>
                            </div>
                            <small class="form-text text-danger">Pastikan format file adalah jpg, jpeg, png, dan ukuran maksimum adalah 2MB.</small>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    // Ketika input file berubah
                                    $('#gambar').on('change', function() {
                                        // Ambil nama file yang dipilih
                                        var fileName = $(this).val().split('\\').pop();
                                        // Ubah teks label dengan nama file
                                        $(this).next('.custom-file-label').html(fileName);
                                    });
                                });
                            </script>

                            <button type="submit" class="btn btn-dark float-right mt-4">Laporkan pengaduan!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="disclaimer" tabindex="-1" role="dialog" aria-labelledby="judul" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title text-white" id="judul">Peraturan</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Dilarang menggunakan kata kasar.</li>
                            <li class="list-group-item">Laporan harus sesuai kategori.</li>
                            <li class="list-group-item">Unit Kerja harus ditulis.</li>
                            <li class="list-group-item">Tidak mengandung SARA, BADWORD, HOAX, dan PORNOGRAFI</li>
                            <li class="list-group-item">Pengaduan yang sudah dikirim tidak dapat diurungkan</li>
                            <li class="list-group-item">Pastikan anda mematuhi aturan yang ada.</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>