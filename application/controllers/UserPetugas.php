<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserPetugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Petugas_model');
        $this->load->model('Kategori_model');
        $this->load->model('Users_model');

    }

    public function index()
    {
        if ($this->session->userdata('role') != 'admin') {
            $this->load->view('error');
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataAdmin();
            $data['petugas'] = $this->Petugas_model->getAllUserPetugas();

            // Memuat daftar kategori untuk dropdown pada view
            $data['kategori'] = $this->Kategori_model->getAllKategori();

            $this->load->view('_partials/head', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/topbar', $data);
            $this->load->view('administrator/petugas/index', $data);
            $this->load->view('_partials/footer');
        }
    }

    public function tambah()
    {
        if ($this->session->userdata('role') != 'admin') {
            $this->load->view('error');
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataAdmin();

            // Memuat daftar kategori untuk dropdown pada view
            $data['kategori'] = $this->Kategori_model->getAllKategori();

            if ($this->input->post('submit')) {
                $this->form_validation->set_rules('nip', 'NIP', 'required');
                $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');

                if ($this->form_validation->run() == TRUE) {
                    // Ambil status_petugas yang dipilih oleh pengguna
                    $status_petugas_terpilih = $this->input->post('status_petugas');

                    // Dapatkan id_kategori berdasarkan status_petugas yang dipilih
                    $id_kategori = $this->Kategori_model->getIdKategoriByNama($status_petugas_terpilih);

                    $username = $this->input->post('email');
                    $user = (explode("@", $username));
                    $data_user = [
                        'nip' => $this->input->post('nip'),
                        'status_petugas' => $status_petugas_terpilih,
                        'nama_petugas' => $this->input->post('nama_petugas'),
                        'username' => $user[0],
                        'email' => $this->input->post('email'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                        'telp' => $this->input->post('telp'),
                        'id_kategori' => $id_kategori, // Isi id_kategori berdasarkan status_petugas
                    ];

                    $this->Petugas_model->tambahUserPetugas($data_user);
                    redirect('administrator/petugas');
                }
            }

            $this->load->view('_partials/head', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/topbar', $data);
            $this->load->view('administrator/petugas/tambah', $data);
        }
    }

    public function edit($nip)
    {
        if ($this->session->userdata('role') != 'admin') {
            $this->load->view('error');
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataAdmin();

            // Memuat daftar kategori untuk dropdown pada view
            $data['kategori'] = $this->Kategori_model->getAllKategori();

            // Mengambil data petugas berdasarkan ID
            $data['petugas'] = $this->Petugas_model->getUserPetugasById($nip);

            if ($this->input->post('submit')) {
                $this->form_validation->set_rules('nip', 'NIP', 'required');
                $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');

                if ($this->form_validation->run() == TRUE) {
                    // Ambil status_petugas yang dipilih oleh pengguna
                    $status_petugas_terpilih = $this->input->post('status_petugas');

                    // Dapatkan id_kategori berdasarkan status_petugas yang dipilih
                    $id_kategori = $this->Kategori_model->getIdKategoriByNama($status_petugas_terpilih);

                    $data_user = [
                        'nip' => $this->input->post('nip'),
                        'status_petugas' => $status_petugas_terpilih,
                        'nama_petugas' => $this->input->post('nama_petugas'),
                        'email' => $this->input->post('email'),
                        // 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                        'telp' => $this->input->post('telp'),
                        'id_kategori' => $id_kategori, // Isi id_kategori berdasarkan status_petugas
                    ];

                    // Update data petugas berdasarkan ID
                    $this->Petugas_model->updateUserPetugas($nip, $data_user);
                    redirect('administrator/petugas');
                }
            }

            $this->load->view('_partials/head', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/topbar', $data);
            $this->load->view('administrator/petugas/edit', $data);
            $this->load->view('_partials/footer');
        }
    }

    public function hapus($nip)
    {
        $this->Petugas_model->deleteUserPetugas($nip);
        redirect('administrator/petugas');
    }
}
