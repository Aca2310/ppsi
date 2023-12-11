<div class="container-fluid">
    <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('administrator'); ?>" class="text-info">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('administrator/petugas'); ?>" class="text-info">Data Petugas</a></li>
            <li class="breadcrumb-item active">Tambah Petugas Baru</li>
        </ol>
    </nav>

    <div class="card o-hidden shadow-lg">
        <div class="card-body">
            <div class="text-center">
                <div class="h3 text-gray-900 m-0">Daftarkan Petugas Baru</div>
                <hr class="garis">
            </div>
            <form method="post" action="">
                <div class="form-group row">
                    <label for="nip" class="col-3 col-form-label">NIP </label>
                    <div class="col-6">
                        <input type="text" name="nip" class="form-control form-control-sm" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status_petugas" class="col-3 col-form-label">Status Petugas </label>
                    <div class="col-6">
                        <select name="status_petugas" class="form-control form-control-sm" required>
                            <?php foreach ($kategori as $kat) : ?>
                                <option value="<?php echo $kat['kategori']; ?>"><?php echo $kat['kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama_petugas" class="col-3 col-form-label">Nama Petugas </label>
                    <div class="col-6">
                        <input type="text" name="nama_petugas" class="form-control form-control-sm" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-3 col-form-label">Email </label>
                    <div class="col-6">
                        <input type="email" name="email" class="form-control form-control-sm" required>
                    </div>
                </div>

                <!-- <div class="form-group row">
                    <label for="username" class="col-3 col-form-label">Username </label>
                    <div class="col-6">
                        <input type="text" name="username" class="form-control form-control-sm" required>
                    </div>
                </div> -->

                <div class="form-group row">
                    <label for="password" class="col-3 col-form-label">Password </label>
                    <div class="col-6">
                        <input type="password" name="password" class="form-control form-control-sm" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telp" class="col-3 col-form-label">Telp </label>
                    <div class="col-6">
                        <input type="text" name="telp" class="form-control form-control-sm" required>
                    </div>
                </div>

                <input type="submit" name="submit" value="Simpan">
            </form>
        </div>
    </div>
</div>