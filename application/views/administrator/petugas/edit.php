<div class="container-fluid">
    <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('administrator'); ?>" class="text-info">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('administrator/petugas'); ?>" class="text-info">Data Petugas</a></li>
            <li class="breadcrumb-item active">Edit Petugas</li>
        </ol>
    </nav>

    <div class="card o-hidden shadow-lg">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-3">
                        <div class="text-center">
                            <div class="h2 text-gray-900 m-0">Edit User Petugas</div>
                            <hr class="garis">
                        </div>
                        <form method="post" action="">
                            <div class="form-group row">
                                <label for="nip" class="col-3 col-form-label">NIP</label>
                                <div class="col-9">
                                    <input type="text" name="nip" value="<?= $petugas['nip']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_petugas" class="col-3 col-form-label">Nama Petugas</label>
                                <div class="col-9">
                                    <input type="text" name="nama_petugas" value="<?= $petugas['nama_petugas']; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status_petugas" class="col-3 col-form-label">Status Petugas:</label>
                                <div class="col-9">
                                    <select name="status_petugas" class="form-control" required>
                                        <?php foreach ($kategori as $kat) : ?>
                                            <option value="<?php echo $kat['kategori']; ?>" <?php echo ($kat['kategori'] == $petugas['status_petugas']) ? 'selected' : ''; ?>><?php echo $kat['kategori']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-3 col-form-label">Email:</label>
                                <div class="col-9">
                                    <input type="email" name="email" value="<?= $petugas['email']; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-3 col-form-label">Username:</label>
                                <div class="col-9">
                                    <input type="text" name="username" value="<?= $petugas['username']; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telp" class="col-3 col-form-label">Telp:</label>
                                <div class="col-9">
                                    <input type="text" name="telp" value="<?= $petugas['telp']; ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 text-center">
                                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>