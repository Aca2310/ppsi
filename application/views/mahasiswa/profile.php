<div class="container-fluid">
    <div class="container-fluid">
        <div class="text-dark m-2"><?= date('l, d M Y'); ?></div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <a class="breadcrumb-item text-info" href="<?= base_url('mahasiswa'); ?>"><span style="color: #E09132;">Beranda</span></a>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
        <div class="row" style="display: flex; justify-content: center; align-items: center;">
            <div class="card col-md-11">
                <div class="row no-gutters">
                    <div class="col-lg">
                        <div class="card-body">
                            <h2 style="text-align: center; ">Profile</h2>
                            <div class="table-responsive">
                                <table class="table p-4" width="100%" cellspacing="0">
                                    <tr>
                                        <th scope="row" style="width: 30%;">Nim</th>
                                        <td><?= $user['nim']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama</th>
                                        <td><?= $user['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Username</th>
                                        <td><?= $user['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Prodi</th>
                                        <td><?= $user['prodi']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td><?= $user['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Telepon</th>
                                        <td><?= $user['telp']; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card-footer text-center">
                                <a href="<?= base_url('mahasiswa/updateProfile'); ?>" class="btn" style="background-color: #E09132; color: white;">Ubah Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>