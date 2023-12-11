<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Pengaduan_model');
        $this->load->model('Tanggapan_model');
    }

    public function index()
    { 
        if ($this->session->userdata('role') != 'petugas') {
            $this->load->view('error');
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataPetugasRow();
            $data['proses'] = $this->Pengaduan_model->joinKategoriPengaduanProses();
            $data['selesai'] = $this->Pengaduan_model->joinKategoriPengaduanSelesai();
            $data['pengaduan'] = $this->Pengaduan_model->joinKategoriPengaduanSemua();
            
            $data['title'] = "Petugas";
            $this->load->view('_partials/head', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/topbar', $data);
            $this->load->view('petugas/index', $data);
            $this->load->view('_partials/footer');
        }
    }

    public function profile()
    {
        if ($this->session->userdata('role') != 'petugas') {
            $this->load->view('error');
        } else {
            $data['title'] = "Profile";
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataPetugasRow();

            $this->load->view('_partials/head', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/topbar', $data);
            $this->load->view('petugas/profile', $data);
            $this->load->view('_partials/footer');
        }
    }

    public function pengaduanTag() 
    {
        if ($this->session->userdata('role') != 'petugas') {
            $this->load->view('error');
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataPetugasRow();
            $data['join'] = $this->Pengaduan_model->joinKategoriPengaduan();

            $data['title'] = "Pengaduan Petugas";
            $this->load->view('_partials/head', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/topbar', $data);
            $this->load->view('petugas/pengaduan_tag', $data);
            $this->load->view('_partials/footer');
        }
    }

    public function selesaiTag() //pengaduan yang sudah selesai berdasarkan kategori
    {
        if ($this->session->userdata('role') != 'petugas') {
            $this->load->view('error');
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataPetugasRow();
            $data['selesai'] = $this->Pengaduan_model->joinKategoriPengaduanSelesai();

            $data['title'] = "Pengaduan Petugas";
            $this->load->view('_partials/head', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/topbar', $data);
            $this->load->view('petugas/selesai_tag', $data);
            $this->load->view('_partials/footer');
        }
    }

    public function prosesTag() //pengaduan yang masih diproses berdasarkan kategori
    {
        if ($this->session->userdata('role') != 'petugas') {
            $this->load->view('error');
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataPetugasRow();
            $data['proses'] = $this->Pengaduan_model->joinKategoriPengaduanProses();

            $data['title'] = "Pengaduan Petugas";
            $this->load->view('_partials/head', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/topbar', $data);
            $this->load->view('petugas/proses_tag', $data);
            $this->load->view('_partials/footer');
        }
    }


    public function tanggapan($id_pengaduan)
    {
        if ($this->session->userdata('role') != 'petugas') {
            $this->load->view('error');
        }

        $validation = $this->form_validation;

        $validation->set_rules(
            'tanggapan',
            'Tanggapan',
            'required|trim',
            [
                'required' => "Kolom ini harus diisi"
            ]
        );

        if ($validation->run()) {
            $query = $this->db->get_where('tanggapan', array('id_pengaduan' => $id_pengaduan));

            if ($query->num_rows() <= 0 )
            { //cek apakah id pengaduan tersebut udah ada?
                $this->Tanggapan_model->addTanggapan();
                $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">Terimakasih telah menanggapi keluhan mahasiswa.</div>');
                redirect('petugas');             
            } else {
                $this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">Pengaduan tersebut telah ditanggapi silahkan setujui ke menu <b>Setujui Pengaduan</b></div>');
                redirect('petugas', 'auto');
            }
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataPetugasRow();
            $data['get_pengaduan'] = $this->Pengaduan_model->get_pengaduan($id_pengaduan);
            $data['id_pengaduan'] = $data['get_pengaduan']['id_pengaduan'];
            $this->session->set_userdata($data);

            $data['title'] = "Data mahasiswa";
            $data['title'] = "Tanggapan";
            $this->load->view('_partials/head', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/topbar', $data);
            $this->load->view('petugas/tanggapan', $data);
            $this->load->view('_partials/footer');
        }
    }

    public function setujui($id_pengaduan)
    {
        if ($this->session->userdata('role') != 'petugas') {
            $this->load->view('error');
        }

        // $query = "SELECT * FROM `tanggapan` WHERE `proses` = 0 AND `id_pengaduan` = $id_pengaduan";

       $query =  $this->db->get_where('tanggapan', array('id_pengaduan' => $id_pengaduan));
       
            if ($query) { //cek apakah prosesnya = 0
                $this->Tanggapan_model->setujui($id_pengaduan);
                $this->session->set_flashdata('ok', '<div class="alert alert-success" role="alert">Selamat! Pengaduan telah disetujui, terimakasih telah melayani mahasiswa dengan baik</div>');
            
                redirect('petugas/accPengaduan');
            } else {
                $this->session->set_flashdata('ok', '<div class="alert alert-danger" role="alert">Pengaduan ini telah <b> selesai </b> disetujui </div>');
                redirect('petugas/accPengaduan');
            }
    }

    public function view($nim)
    {
        if ($this->session->userdata('role') != 'petugas') {
            $this->load->view('error');
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataPetugasRow();
            $data['get_mahasiswa'] = $this->Users_model->get_mahasiswa($nim);

            $data['title'] = "Data mahasiswa";
            $this->load->view('_partials/head', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/topbar', $data);
            $this->load->view('petugas/view_profile', $data);
            $this->load->view('_partials/footer');
        }
    }

    public function accPengaduan()
    {
        if ($this->session->userdata('role') != 'petugas') {
            $this->load->view('error');
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataPetugasRow();
            $data['setujui'] = $this->Pengaduan_model->joinPengaduanProsesSelesai(); //view yang harus disetujui

            $data['title'] = "Daftar Pengaduan";
            $this->load->view('_partials/head', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/topbar', $data);
            $this->load->view('petugas/setujui', $data);
            $this->load->view('_partials/footer');
        }
    }
}
