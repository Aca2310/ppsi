<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Pengaduan_model');
        $this->load->model('Tanggapan_model');
    }
    public function index()
    {
        if ($this->session->userdata('role') != 'mahasiswa') {
            $this->load->view('error');
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataMahasiswaRow();
            $data['kategori'] = $this->Users_model->joinKategoriPetugas();
            $data['pending'] = $this->Pengaduan_model->pendingPengaduan();
            $data['proses'] = $this->Pengaduan_model->prosesPengaduan();
            $data['selesai'] = $this->Pengaduan_model->selesaiPengaduan();
            $data['pengaduan'] = $this->Pengaduan_model->viewPengaduan();
            $data['setujui'] = $this->Pengaduan_model->pengaduanSelesai();
            $data['petugas'] = $this->Users_model->dataPetugasRow();


            $data['title'] = "Pengaduan";
            $this->load->view('tampilan/head', $data);
            $this->load->view('tampilan/navbar', $data);
            $this->load->view('_partials/head', $data);
            $this->load->view('mahasiswa/index', $data);
            $this->load->view('_partials/footer');
        }
    }
    public function tanggapan()
    {
        if ($this->session->userdata('role') != 'mahasiswa') {
            $this->load->view('error');
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataMahasiswaRow();
            $data['kategori'] = $this->Users_model->joinKategoriPetugas();
            $data['pending'] = $this->Pengaduan_model->pendingPengaduan();
            $data['proses'] = $this->Pengaduan_model->prosesPengaduan();
            $data['selesai'] = $this->Pengaduan_model->selesaiPengaduan();
            $data['pengaduan'] = $this->Pengaduan_model->viewPengaduan();
            $data['setujui'] = $this->Pengaduan_model->pengaduanSelesai();
            $data['petugas'] = $this->Users_model->dataPetugasRow();


            $data['title'] = "Pengaduan";
            $this->load->view('tampilan/head', $data);
            $this->load->view('tampilan/navbar', $data);
            $this->load->view('_partials/head', $data);
            $this->load->view('mahasiswa/tanggapan', $data);
            $this->load->view('_partials/footer');
        }
    }
    public function hapus($nim)
    {
        $this->Mahasiswa_model->deleteUserMahasiswa($nim);
        redirect('administrator/mahasiswa');
    }



    public function profile()
    {
        if ($this->session->userdata('role') != 'mahasiswa') {
            $this->load->view('error');
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataMahasiswaRow();


            $data['title'] = "Pengaduan";
            $this->load->view('tampilan/head', $data);
            $this->load->view('tampilan/navbar', $data);
            $this->load->view('_partials/head', $data);
            $this->load->view('mahasiswa/profile', $data);
            $this->load->view('_partials/footer');
        }
    }

    public function updateProfile()
    {
        if ($this->session->userdata('role') != 'mahasiswa') {
            $this->load->view('error');
        }

        $validation = $this->form_validation;
        $mahasiswa = $this->Mahasiswa_model;

        //Nim
        $validation->set_rules(
            'nim',
            'Nim',
            'required|trim|numeric|min_length[10]',
            [
                'required' => 'Nim tidak boleh kosong!',
                'numeric' => 'Nim tidak valid!',
                'min_length' => 'Nim tidak terlalu pendek'

            ]
        );
        //nama
        $validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            [
                'required' => 'Nama tidak boleh kosong!'
            ]
        );

        //email
        $validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email',
            [
                'required' => "Email tidak boleh kosong!",
                'valid_email' => "Email tidak valid!"
            ]
        );

        $validation->set_rules(
            'telp',
            'Telp',
            'required|trim|numeric',
            [
                'required' => "Nomor telepon tidak boleh kosong!",
                'numeric' => 'Nomor telepon tidak valid!'
            ]
        );

        $validation->set_rules(
            'prodi',
            'Prodi',
            'required|trim',
            [
                'required' => "prodi tidak boleh kosong!",
            ]
        );

        if ($validation->run()) {
            $mahasiswa->updateProfile();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Profile anda berhasil diubah</div>');
            redirect('mahasiswa/profile');
        } else {

            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataMahasiswaRow();


            $data['title'] = "Pengaduan";
            $this->load->view('tampilan/head', $data);
            $this->load->view('tampilan/navbar', $data);
            $this->load->view('_partials/head', $data);
            // $this->load->view('_partials/topbar', $data);
            $this->load->view('mahasiswa/update_profile', $data);
            $this->load->view('_partials/footer');
        }
    }

    public function pengaduan()
    {
        if ($this->session->userdata('role') != 'mahasiswa') {
            $this->load->view('error');
        }

        $validation = $this->form_validation;

        $validation->set_rules(
            'judul',
            'Judul',
            'required|trim',
            [
                'required' => "Kolom ini harus diisi"
            ]
        );

        $validation->set_rules(
            'isi',
            'Isi',
            'required|trim',
            [
                'required' => "Kolom ini harus diisi"
            ]
        );
        $validation->set_rules(
            'nama_pengadu',
            'Nama Pengadu',
            'required',
            [
                'required' => "Anda harus memilih jenis pengadu"
            ]
        );

        if ($validation->run()) {
            $this->Pengaduan_model->addPengaduan();
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">Pengaduan anda telah terkirim, mohon tunggu tanggapan petugas!</div>');
            redirect('mahasiswa/pengaduan');
        } else {

            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataMahasiswaRow();
            $data['kategori'] = $this->Mahasiswa_model->kategori();

            $data['title'] = "Pengaduan";

            $this->load->view('tampilan/head', $data);
            $this->load->view('tampilan/navbar', $data);
            $this->load->view('_partials/head', $data);
            $this->load->view('mahasiswa/form_pengaduan', $data);
            $this->load->view('_partials/footer');
        }
    }

    public function pending()
    {
        if ($this->session->userdata('role') != 'mahasiswa') {
            $this->load->view('error');
        } else {

            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataMahasiswaRow();
            $data['pendingPengaduan'] = $this->Pengaduan_model->pendingPengaduan();
            $data['kategori'] = $this->Mahasiswa_model->kategori();

            $data['title'] = "Pengaduan";

            $this->load->view('tampilan/head', $data);
            $this->load->view('tampilan/navbar', $data);
            $this->load->view('_partials/head', $data);
            $this->load->view('mahasiswa/pending_pengaduan', $data);
            $this->load->view('_partials/footer');
        }
    }

    public function proses()
    {
        if ($this->session->userdata('role') != 'mahasiswa') {
            $this->load->view('error');
        } else {

            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataMahasiswaRow();
            $data['prosesPengaduan'] = $this->Pengaduan_model->prosesPengaduan();
            $data['kategori'] = $this->Mahasiswa_model->kategori();

            $data['title'] = "Pengaduan";

            $this->load->view('tampilan/head', $data);
            $this->load->view('tampilan/navbar', $data);
            $this->load->view('_partials/head', $data);
            $this->load->view('mahasiswa/proses_pengaduan', $data);
            $this->load->view('_partials/footer');
        }
    }

    public function selesai()
    {
        if ($this->session->userdata('role') != 'mahasiswa') {
            $this->load->view('error');
        } else {

            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataMahasiswaRow();
            $data['selesaiPengaduan'] = $this->Pengaduan_model->selesaiPengaduan();
            $data['kategori'] = $this->Mahasiswa_model->kategori();

            $data['title'] = "Pengaduan";

            $this->load->view('tampilan/head', $data);
            $this->load->view('tampilan/navbar', $data);
            $this->load->view('_partials/head', $data);
            $this->load->view('mahasiswa/selesai_pengaduan', $data);
            $this->load->view('_partials/footer');
        }
    }

    public function detail_tanggapan($id_pengaduan)
    {
        if ($this->session->userdata('role') != 'mahasiswa') {
            $this->load->view('error');
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataAdmin();
            $data['joiny'] = $this->Pengaduan_model->joinKategoriPengaduanOnly();
            $data['detail'] = $this->Pengaduan_model->getPengaduanById($id_pengaduan);
            $data['detail']['kategori'] = $this->Pengaduan_model->getKategoriById($data['detail']['id_kategori']);
            $data['tanggapan'] = $this->Tanggapan_model->getTanggapanByIdPengaduan($id_pengaduan);

            $data['title'] = "Detail Tanggapan";
            $this->load->view('tampilan/head', $data);
            $this->load->view('tampilan/navbar', $data);
            $this->load->view('_partials/head', $data);
            $this->load->view('mahasiswa/detail_tanggapan', $data);
            $this->load->view('_partials/footer');
        }
    }
}
