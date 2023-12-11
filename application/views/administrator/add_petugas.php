<div class="container-fluid">
    <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('administrator'); ?>" class="text-info">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('administrator/petugas'); ?>" class="text-info">Data Petugas</a></li>
            <li class="breadcrumb-item active">Tambah Petugas Baru</li>
        </ol>
    </nav>

    <div class="row mt-3">
        <div class="col-lg-6 pt-0">
            <div class="card o-hidden shadow-lg">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <div class="h5 text-gray-900 m-0">Daftarkan Petugas Baru</div>
                                    <hr class="garis">
                                </div>
                                <form class="user" method="post" action="<?= base_url('administrator/addPetugas'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nip" name="nip" placeholder="NIP" value="<?= set_value('nip'); ?>">
                                        <?= form_error('nip', '<small class="pl-3 text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                                        <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="pl-3 text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="pl-3 text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="telp" name="telp" placeholder="Nomor Telepon" value="<?= set_value('telp'); ?>">
                                        <?= form_error('telp', '<small class="pl-3 text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_kategori">Kategori</label>
                                        <select class="form-control form-control-user" id="id_kategori" name="id_kategori">
                                            <?php foreach ($kategori as $row) : ?>
                                                <option value="<?= $row['id_kategori']; ?>"><?= $row['kategori']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('id_kategori', '<small class="pl-3 text-danger">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-user btn-block">
                                        Registrasi
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>