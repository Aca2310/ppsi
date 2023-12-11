<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Users_model');
        $this->load->model('Pengaduan_model');
    }

    public function addkategori()
    {
        if ($this->session->userdata('role') != 'admin') {
            $this->load->view('error');
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataAdmin();

            $data['kategori'] = $this->Kategori_model->get_kategori();
            // Tampilkan data kategori ke view
            $this->load->view('_partials/head', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/topbar', $data);
            $this->load->view('administrator/kategori/index', $data);
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
            // Form submission untuk menambah kategori
            $data['title'] = 'Tambah Kategori';
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('_partials/head', $data);
                $this->load->view('_partials/sidebar', $data);
                $this->load->view('_partials/topbar', $data);
                $this->load->view('administrator/kategori/tambah', $data);
                $this->load->view('_partials/footer');
            } else {
                $data = array(
                    'kategori' => $this->input->post('kategori')
                );

                $this->Kategori_model->tambah_kategori($data);
                redirect('administrator/kategori');
            }
        }
    }

    public function edit($id_kategori)
    {
        if ($this->session->userdata('role') != 'admin') {
            $this->load->view('error');
        } else {
            $data['users'] = $this->Users_model->dataUsers();
            $data['user'] = $this->Users_model->dataAdmin();
            // Form submission untuk mengedit kategori
            $data['title'] = 'Edit Kategori';
            $data['kategori'] = $this->Kategori_model->get_kategori_by_id($id_kategori);

            $this->form_validation->set_rules('kategori', 'Kategori', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('_partials/head', $data);
                $this->load->view('_partials/sidebar', $data);
                $this->load->view('_partials/topbar', $data);
                $this->load->view('administrator/kategori/edit', $data);
                $this->load->view('_partials/footer');
            } else {
                $data = array(
                    'kategori' => $this->input->post('kategori')
                );

                $this->Kategori_model->update_kategori($id_kategori, $data);
                redirect('administrator/kategori');
            }
        }
    }

    public function hapus($id_kategori)
    {
        // Hapus kategori
        $this->Kategori_model->hapus_kategori($id_kategori);
        redirect('administrator/kategori');
    }
    public function getAllKategori()
    {
        return $this->db->get('kategori')->result_array();
    }
}
