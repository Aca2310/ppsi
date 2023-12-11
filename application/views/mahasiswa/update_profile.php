<div class="container-fluid">
    <div class="container-fluid">
        <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <a class="breadcrumb-item text-info" href="<?= base_url('mahasiswa'); ?>"><span style="color: #E09132;">Beranda</span></a>
                <li class="breadcrumb-item active">Ubah Profile</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                <div class="card o-hidden shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <div class="h5 text-gray-900 m-0">Ubah Profile</div>
                                        <hr class="garis">
                                    </div>
                                    <form class="user" method="post" action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" value="<?= $user['nim']; ?>" readonly>
                                            <?= form_error('nim', '<small class="pl-3 text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= $user['nama']; ?>">
                                            <?= form_error('nama', '<small class="pl-2 text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $user['username']; ?>">
                                            <?= form_error('username', '<small class="pl-3 text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user['email']; ?>">
                                            <?= form_error('email', '<small class="pl-2 text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="prodi" name="prodi">
                                                <option value="sistem_informasi" <?= ($user['prodi'] == 'sistem_informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
                                                <option value="teknik_komputer" <?= ($user['prodi'] == 'teknik_komputer') ? 'selected' : ''; ?>>Teknik Komputer</option>
                                                <option value="informatika" <?= ($user['prodi'] == 'informatika') ? 'selected' : ''; ?>>Informatika</option>
                                            </select>
                                            <?= form_error('prodi', '<small class="pl-2 text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="telp" name="telp" placeholder="Nomor Telepon" value="<?= $user['telp']; ?>">
                                            <?= form_error('telp', '<small class="pl-3 text-danger">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-dark btn-user btn-block">
                                            Ubah Profile
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>